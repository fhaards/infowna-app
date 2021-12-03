<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;
use App\Http\Helpers\Operating as OPS;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->uuid;
        $user = $this->detailQueries($id);
        $data['user'] = $user->get();
        return view('pages/user/profile_dashboard', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $user = $this->detailQueries($id);
        $data['user'] = $user->get();
        return view('pages/user/profile_dashboard', $data);
    }

    public function edit($id)
    {
        $user = $this->detailQueries($id);
        $data['user'] = $user->get();
        return view('pages/user/profile_edit_account', $data);
    }

    public function update(Request $request, $id)
    {
        $data = [];
        // $birthDate = date('Y-m-d', );
        $user = $request->user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        if ($user) {
            $data = array(
                'phone' => $request->input('phone'),
                'birth_date' => $request->input('birth_date'),
                'birth_place' => $request->input('birth_place'),
                'address' => $request->input('address'),
                'country' => $request->input('country'),
                'districts' => $request->input('districts'),
                'postcode' => $request->input('postcode')
            );
            $key = array('uuid' => $id);
            $useraccount = OPS::updateDB('users_account', $data, $key);
            if ($useraccount) {
                return redirect()->route('user.index');
            } else {
                return redirect()->route('user.index');
            }
        } else {
            return redirect()->route('user.index');
        }
    }

    public function destroy($id)
    {
        //
    }

    public function editPhoto(Request $request, $id)
    {
        $user = $this->detailQueries($id);
        $data['user'] = $user->get();
        return view('pages/user/profile_edit_photo', $data);
    }

    public function updatePhoto(Request $request, $id)
    {
        $data = [];
        $file = $request->file('file');
        $input = [
            'file'  => $file,
        ];

        $rules = [
            'file'  => 'required|mimes:jpeg,jpg,png',
        ];

        $messages = [
            'file.mimes' => 'Not Supported Format, Use JPG,JPEG,PNG',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('edit-photo', $id)->withErrors($messages);
        } else {
            $avatarName = $id . '-' . '.' . $file->getClientOriginalExtension();
            $data = array(
                'photo' => $avatarName
            );
            $key = array('uuid' => $id);
            $useraccount = OPS::updateDB('users_account', $data, $key);
            if ($useraccount) {
                $request->file('file')->storeAs('public/user/avatars', $avatarName);
                return redirect()->route('edit-photo', $id)->with('success', 'Update Successfully!');
            } else {
                return redirect()->route('edit-photo', $id)->with('error', 'Something Wrong in System');
            }
        }
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
