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
        $getGroup = Auth::user()->user_group;
        $getUuid  = Auth::user()->uuid;
        if ($getGroup == 'user') :
            $user = $this->detailQueries($getUuid);
            $data['user'] = $user->get();
            return view('pages/user/profile_dashboard', $data);
        elseif ($getGroup == 'admin') :
            $user = User::where('user_group', '!=', 'admin')->latest()->paginate(5);
            return view('pages/user/user_table', compact('user'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        else :
            return redirect(404);
        endif;

        // $data['user'] = User::where('user_group', '!=' , 'admin')->get();
        // return view('pages/user/user_table', $data);
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
        $inName      = $request->input('name');
        $inEmail     = $request->input('email');
        $inGender    = $request->input('gender');
        $inPhone     = $request->input('phone');
        $inBirthD    = $request->input('birth_date');
        $inBirthP    = $request->input('birth_place');
        $inAddress   = $request->input('address');
        $inCountry   = $request->input('country');
        $inDistricts = $request->input('districts');
        $inPostcode  = $request->input('postcode');

        $validated = $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'gender'        => 'required',
            'phone'         => 'required',
            'birth_date'    => 'required',
            'birth_place'   => 'required',
            'address'       => 'required',
            'country'       => 'required',
            'districts'     => 'required',
            'postcode'      => 'required'
        ]);

        if ($validated) {
            $user = $request->user()->update([
                'name' => $inName,
                'email' => $inEmail,
                'user_status' => 1
            ]);
            if ($user) {
                $data = array(
                    'gender'      => $inGender,
                    'phone'       => $inPhone,
                    'birth_date'  => $inBirthD,
                    'birth_place' => $inBirthP,
                    'address'     => $inAddress,
                    'country'     => $inCountry,
                    'districts'   => $inDistricts,
                    'postcode'    => $inPostcode
                );
                $key = array('uuid' => $id);
                $useraccount = OPS::updateDB('users_account', $data, $key);
                if ($useraccount) {
                    return redirect()->route('user.index')->with('success', 'Success! Update');
                } else {
                    return redirect()->route('user.index');
                }
            } else {
                return redirect()->route('user.index');
            }
        } else {
            return back()->with('error', 'Ops! Something Wrong');
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

    //API
    public function apiDetailUser($id)
    {
        if (Auth::user()->user_group == "admin") :
            $user = $this->detailQueries($id);
            $data = $user->get();
            return response()->json($data, 200);
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
