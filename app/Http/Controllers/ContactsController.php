<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyIdentity;
use App\Http\Requests;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ContactsController extends Controller
{

    use StoreImageTrait;

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

        $this->validate($request, [
            'mailing_address' => 'email',
            'support_email' => 'email',
            'company_logo' => 'image|mimes:jpeg,png,jpg|max:3000',
            'login_background_image' => 'image|mimes:jpeg,png,jpg|max:3000',
        ]);

        $compDetails = CompanyIdentity::first();
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
            'file' => 'image|mimes:jpeg,png,jpg|max:3000',
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
     * call the uploadimage Trait function to upload logo files.
     *
     * @param \App\Http\Requests
     * @param \App\CompanyIdentity
     */
    private function uploadLogo(Request $request, CompanyIdentity $compDetails)
    {
        $formInput = $request->all();
        $formInput['company_logo'] = $this->verifyAndStoreImage($request, 'company_logo', 'logo', $compDetails);
    }


    private function uploadLoginImage(Request $request, CompanyIdentity $compDetails)
    {
        $formInput = $request->all();
        $formInput['login_background_image'] = $this->verifyAndStoreImage($request, 'login_background_image', 'logos', $compDetails);
    }


}
