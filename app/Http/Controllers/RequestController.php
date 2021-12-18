<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Request as REQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PDF;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        $getGroup = Auth::user()->user_group;
        $getUuid  = Auth::user()->uuid;
        if ($getGroup == 'user') :
            return redirect()->route('requests.create');
        elseif ($getGroup == 'admin') :
            $urlquery = [];
            $status = $request->get('req_status');
            $ordate = $request->get('order_date');
            $requests = REQ::query();

            if (!is_null($status)) {
                $requests =  $requests->where('req_status', $status);
            }

            if (!is_null($ordate)) {
                if ($ordate == 'desc') {
                    $requests =  $requests->orderBy('created_at', 'desc');
                }
                if ($ordate == 'asc') {
                    $requests = $requests->orderBy('created_at', 'asc');
                }
            }

            $data['requests'] = $requests->latest()->paginate(3);
            $data['urlquery'] = ['req_status' => $status, 'ordate' => $ordate];
            return view('pages.request.request_table', $data);

        // return view('pages.request.request_table', compact('requests'))
        //     ->with('i', (request()->input('page', 1) - 1) * 3);
        else :
            return redirect(404);
        endif;
    }

    public function create()
    {
        $getGroup = Auth::user()->user_group;
        $getUuid  = Auth::user()->uuid;
        $user = $this->detailQueries($getUuid);
        $data['user'] = $user->get();
        $reqs     = REQ::where('uuid', $getUuid)->get();
        $reqCount = $reqs->count();
        if ($reqCount == 0) {
            return view('pages.request.request_form_input', $data);
        } else {
            foreach ($reqs as $req) {
                $getId = $req->req_id;
            }
            return redirect()->route('requests.show', $getId);
        }
    }

    public function store(Request $request)
    {
        $getDate     = date('d-m-Y H:i:s');
        $uuid        = $request->input('uuid');
        $name        = $request->input('name');
        $email       = $request->input('email');
        $phone       = $request->input('phone');
        $gender      = $request->input('gender');
        $nationality = $request->input('nationality');
        $passport_id = $request->input('passport_id');
        $address     = $request->input('address');
        $reqId       = date('dmyhis') . strtoupper(substr($uuid, 0, 8));
        $status      = 'Waiting';
        $file        = $request->file('file');

        $validated = $request->validate([
            'phone' => 'required',
            'passport_id' => 'required',
            'address' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png'
        ]);

        if ($validated) {
            $getNameFile = $uuid . '-passport.' . $file->getClientOriginalExtension();
            $request->file('file')->storeAs('public/requests/passport', $getNameFile);
            REQ::create([
                'req_id' => $reqId,
                'uuid' => $uuid,
                'name' => $name,
                'email' => $email,
                'gender' => $gender,
                'phone' => $phone,
                'nationality' => $nationality,
                'passport_id' => $passport_id,
                'address_indonesia' => $address,
                'req_status' => $status,
                'passport_img' => $getNameFile,
                'created_at' => $getDate,
                'updated_at' => $getDate
            ]);
            return redirect()->route('requests.index')->with('success', 'Success! Your form has been submitted, wait for approved by administrator');
        } else {
            return back()->with('error', 'Ops! Something Wrong');
        }
    }

    public function show($id)
    {
        $reqSets  = REQ::where('req_id', $id)->get();
        $reqCount = $reqSets->count();
        if ($reqCount != 0) {
            $data['requests'] = $reqSets;
            return view('pages.request.request_form_waiting', $data);
        } else {
            return redirect(404);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $reqstatus = $request->input('req_status');
        $requests = REQ::find($id);
        if ($reqstatus == 'Waiting') {
            $requests->req_status = 'Approved';
        } else {
            $requests->req_status = 'Waiting';
        }
        $requests->updated_at = now();
        $requests->save();
        return back()->with('success', 'Success! Requests has been updated');
    }

    public function destroy($id)
    {
        $req = REQ::find($id);
        $req->delete();
        return back()->with('success', 'Success! Successfully Deleted Request');
    }

    public function printRequests(Request $request, $id)
    {
        // $detail = $this->detailQueries($id);
        $data['data'] = REQ::find($id);
        $pdf = PDF::loadview('pages/request/request_print', $data);
        return $pdf->stream('Print-' . $id . '.pdf');
    }

    public function apiDetailRequests($id)
    {
        if (Auth::user()->user_group == "admin") :
            $requests = REQ::find($id);
            return response()->json($requests, 200);
        else :
            return redirect(404);
        endif;
    }

    public function detailQueries($id)
    {
        $detailUser = DB::table('users_account as usa')
            ->leftJoin('users as us', 'usa.uuid', 'us.uuid')
            ->select(
                'us.uuid',
                'us.name',
                'us.email',
                'usa.*'
            )
            ->where('us.uuid', $id);
        return $detailUser;
    }
}
