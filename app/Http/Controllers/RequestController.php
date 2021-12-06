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
            $user = REQ::latest()->paginate(5);
            return view('pages.request.request_table', compact('request'))
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
        return view('pages.request.request_form', $data);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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

    public function detailQueries($id)
    {
        $detailUser = DB::table('requests as req')
            ->leftJoin('users as us', 'req.uuid', 'us.uuid')
            ->select(
                'us.uuid',
                'us.name',
                'us.email',
                'req.*'
            )
            ->where('us.uuid', $id);
        return $detailUser;
    }
}
