<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Request as REQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function index()
    {
        $getGroup = Auth::user()->user_group;
        $getUuid  = Auth::user()->uuid;
        if ($getGroup == 'user') :
            return redirect()->route('requests.create');
        elseif ($getGroup == 'admin') :
            $requests = REQ::latest()->paginate(5);
            return view('pages.request.request_table', compact('requests'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
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
            'created_at' => $getDate,
            'updated_at' => $getDate
        ]);

        return back()->with('success', 'Success! Your form has been submitted, wait for approved by administrator');
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
        //
    }

    public function destroy($id)
    {
        //
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
