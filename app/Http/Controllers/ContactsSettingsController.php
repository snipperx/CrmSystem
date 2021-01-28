<?php

namespace App\Http\Controllers;

use App\CompanyIdentity;
use App\Module;
use Illuminate\Http\Request;

class ContactsSettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     */
    public function index()
    {
        $modules = Module::get();

        $data['modules'] = $modules;
       // return view('Security.setup')->with($data);
        return view('add_modules')->with($data);
    }

    public function settings()
    {

    }

    public function contacts()
    {
        $companyDetails = CompanyIdentity::first();

        $data['companyDetails'] = $companyDetails;
        return view('Security.companyIdentity')->with($data);
    }


    public function moduleAct(Module  $mod){
        if ($mod->active == 1) $status = 0;
        else $status = 1;

        $mod->active = $status;
        $mod->update();
       return response()->json(['success'=>'Status  successfully Changed'], 200);
    }

}
