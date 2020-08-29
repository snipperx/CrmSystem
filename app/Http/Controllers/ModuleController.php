<?php

namespace App\Http\Controllers;

use App\CompanyIdentity;
use App\HRPerson;
use App\Module;
use App\Module_access;
use App\ModuleRibbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     *
     *
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
        $companyDetails = CompanyIdentity::systemSettings();

        view()->composer('includes.sidebar', function ($view) use ($companyDetails) {

        $user = Auth::user()->load('person');


        $defaultAvatar = ($user->person->gender === 0) ? 'avatars/f-silhouette.jpg' : 'avatars/m-silhouette.jpg';
        $avatar = $user->person->profile_pic;
        $position = ($user->person->position) ? DB::table('hr_positions')->find($user->person->position)->name : '';

        $modulesAccess = Module::whereHas('moduleRibbon', function ($query) {
        $query->where('active', 1);
        })->where('active', 1)
        ->whereIn('id', Module_access::select('module_id')->where(function ($query) use ($user) {
        $query->where('user_id', $user->id);
        $query->whereNotNull('access_level');
        $query->where('access_level', '>', 0);
        })->get())
        ->with(['moduleRibbon' => function ($query) use ($user) {
        $query->whereIn('id', ModuleRibbon::select('module_ribbons.id')->join('module_accesses', function ($join) use ($user) {
        $join->on('module_ribbons.module_id', '=', 'module_accesses.module_id');
        $join->on('module_accesses.user_id', '=', DB::raw($user->id));
        $join->on('module_ribbons.access_level', '<=', 'module_accesses.access_level');
        })->get());
        $query->orderBy('sort_order', 'Asc');
        }])
        ->orderBy('name', 'DESC')->get();

        $headerNameBold = $companyDetails['header_name_bold'];
        $headerNameRegular = $companyDetails['header_name_regular'];
        $headerAcronymBold = $companyDetails['header_acronym_bold'];
        $headerAcronymRegular = $companyDetails['header_acronym_regular'];

        $data['headerNameBold'] = $headerNameBold;
        $data['headerNameRegular'] = $headerNameRegular;
        $data['headerAcronymBold'] = $headerAcronymBold;
        $data['headerAcronymRegular'] = $headerAcronymRegular;
        $data['user'] = $user;
        $data['full_name'] = $user->person->first_name . " " . $user->person->surname;
        $data['avatar'] = (!empty($avatar)) ? Storage::disk('local')->url("avatars/$avatar") : Storage::disk('local')->url($defaultAvatar);
        $data['position'] = $position;

        $data['company_logo'] = $companyDetails['company_logo_url'];
        $data['modulesAccess'] = $modulesAccess;
        $view->with($data);
        });
         */

        return view('Security/modules');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'module_name' => 'required',
            'module_path' => 'required',
            'font_awesome' => 'required',
        ]);
        $moduleData = $request->all();
        unset($moduleData['_token']);

        $module = Module::create([
            'active' => 1,
            'name' => $moduleData['module_name'],
            'path' => $moduleData['module_path'],
            'font_awesome' => $moduleData['font_awesome'],
        ]);

        return response()->json(['new_name' => $moduleData['module_name'], 'new_path' => $moduleData['module_path']], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        //
    }
}
