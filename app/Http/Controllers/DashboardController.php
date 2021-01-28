<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
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
        Module::hashids();

        $user = Auth::user()->load('person');
        $defaultAvatar = (empty($user->person->gender === 0)) ? 'avatars/f-silhouette.jpg' : 'avatars/m-silhouette.jpg';
        $avatar = $user->person->profile_pic;
        //return $user;
        $data['avatar'] = (!empty($avatar)) ? Storage::disk('local')->url("avatars/$avatar") : Storage::disk('local')->url($defaultAvatar);
        $data['user'] = $user;
        return view('Dashboard.index')->with($data);
    }
}
