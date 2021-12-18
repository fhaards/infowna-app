<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Request as REQ;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ustatus = Auth::user()->user_status;
        $uuid    = Auth::user()->uuid;
        $usgroup = Auth::user()->user_group;
        if ($ustatus == 0) {
            return redirect()->route('user.edit', $uuid);
        } else {
            if ($usgroup == 'admin') {
                $data['countUser']  = User::where('user_group', '!=', 'admin')->get()->count();
                $data['countReqW']  = REQ::all()->count();
                $data['countReqA']  = REQ::where('req_status', 'Approved')->get()->count();
                $data['user']       = User::where('user_group', '!=', 'admin')->latest()->paginate(5);
                $data['requests']   = REQ::query()->latest()->paginate(5);
                return view('home', $data);
            } else {
                return view('home');
            }
        }
    }
}
