<?php

namespace App\Http\Controllers;

use App\Module;
use App\ModuleRibbon;
use App\Module_access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hashids\Hashids;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function hash(){
        $hashids = new Hashids();
        return $hashids;
    }

    public function access(){

        $hashids = $this->hash();

        $user = Auth::user()->person->id;;
        $modID = $hashids->encode($user);

        $modules = Module_access::select('module_accesses.*', 'modules.name as mod_name')
            ->leftJoin("modules", 'module_accesses.module_id', 'module_accesses.id')
            ->get();


        $data['modID'] = $modID;
        $data['modules'] = $modules;
        return view('Security.module_access')->with($data);
    }

    public function UserAccess(Request $request , $user){

        return $request;
        $hashids = $this->hash();
        $modID = $hashids->decode($user);
        return $modID;
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

        $user = Auth::user()->load('person');

        $modulesAccess = Module::whereHas('moduleRibbon', function ($query) {
            $query->where('active', 1);
        })->where('active', 1)
            ->whereIn('id', Module_access::where('user_id', $user->id)->select('module_id')->where(function ($query) use ($user) {
                $query->whereNotNull('access_level');
                $query->where('access_level', '>', 0);
                $query->orderBy('sort_order', 'Asc');
            })->get())
            ->with(['moduleRibbon' => function ($query) use ($user) {
                $query->whereIn('id', ModuleRibbon::select('module_ribbons.id')->join('module_accesses', function ($join) use ($user) {
                    $join->on('module_ribbons.module_id', '=', 'module_accesses.module_id');
                   // $join->on('module_ribbons.access_level', '=', 'module_accesses.access_level');
                })->get());
                $query->orderBy('sort_order', 'Asc');
            }])
            ->orderBy('name', 'desc')
            ->get();






       // return $modulesAccess;

        $data['modulesAccess'] = $modulesAccess;

        return view('Security/modules')->with($data);
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
     * @param \Illuminate\Http\Request $request
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
     * @param \App\Module $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Module $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Module $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Module $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        //
    }
}
