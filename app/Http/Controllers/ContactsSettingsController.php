<?php

namespace App\Http\Controllers;

use App\CompanyIdentity;
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

}
