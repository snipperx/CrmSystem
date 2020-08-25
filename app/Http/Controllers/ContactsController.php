<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyIdentity;
use App\Http\Requests;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyDetails = CompanyIdentity::first();

        $data['companyDetails'] = $companyDetails;
        return view('Security.companyIdentity')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//
        $this->validate($request, [
            'mailing_address' => 'email',
            'support_email' => 'email',
        ]);

        $compDetails = CompanyIdentity::first();

        //$compDetails = (Schema::hasTable('company_identities')) ? CompanyIdentity::first() : null;
        if ($compDetails) { //update
            $compDetails->update($request->all());

            //Upload company logo if any
            $this->uploadLogo($request, $compDetails);
            $this->uploadLoginImage($request, $compDetails);
//            $this->uploadSystemImage($request, $compDetails);
        } else { //insert
            $compDetails = new CompanyIdentity($request->all());
            $compDetails->save();

            //Upload company logo if any
            $this->uploadLogo($request, $compDetails);
            $this->uploadLoginImage($request, $compDetails);
        }

        return back()->with('changes_saved', 'Your changes have been saved successfully.');
    }


    public function post_upload(Request $request)
    {

        $input = Input::all();
        $rules = array(
            'file' => 'image|max:3000',
        );

        $validation = Validator::make($input, $rules);

        $compDetails = CompanyIdentity::first();

        if ($validation->fails()) {
            return Response::make($validation->errors->first(), 400);
        }

        $this->uploadLogo($request, $compDetails);

        if ($this->uploadLogo()) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }

    /**
     * Helper function to upload logo files.
     *
     * @param \App\Http\Requests
     * @param \App\CompanyIdentity
     */
    private function uploadLogo(Request $request, CompanyIdentity $compDetails)
    {
        if ($request->hasFile('company_logo')) {
            $image_name = $request->file('company_logo')->getClientOriginalName();
            $filename = pathinfo($image_name, PATHINFO_FILENAME);

            $image_ext = $request->file('company_logo')->getClientOriginalExtension();
            $fileNameToStore = $filename . '-' . time() . '.' . $image_ext;
            $path = $request->file('company_logo')->storeAs('public/logo', $fileNameToStore);
            //Update file name in the database
            $compDetails->company_logo = $fileNameToStore;
            $compDetails->update();
        }
    }


    private function uploadLoginImage(Request $request, CompanyIdentity $compDetails)
    {
        if ($request->hasFile('login_background_image')) {
            $image_name = $request->file('login_background_image')->getClientOriginalName();
            $filename = pathinfo($image_name, PATHINFO_FILENAME);
            $image_ext = $request->file('login_background_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '-' . time() . '.' . $image_ext;
            $path = $request->file('login_background_image')->storeAs('public/logos', $fileNameToStore);
            $compDetails->login_background_image = $fileNameToStore;
            $compDetails->update();
        }
    }


}
