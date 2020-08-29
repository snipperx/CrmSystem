<?php

namespace App\Http\Controllers;

use App\Module;
use App\ModuleRibbon;
use App\Module_access;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ModuleRibbonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Module $rib
     * @return Module
     */
    public function index($mod)
    {
        $ribbons = Module::where('id', $mod)->first();

        $aRarrayRights = array(0 => 'None', 1 => 'Read', 2 => 'Write', 3 => 'Modify', 4 => 'Admin', 5 => 'SuperUser');

        if ($ribbons->active == 1) {
            $ribbons->load('moduleRibbon');
            $data['ribbons'] = $ribbons;
            $data['mod'] = $mod;
            $data['arrayRights'] = $aRarrayRights;

            return view('Security.ribbon')->with($data);
        } else return back();
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
            'ribbon_name' => 'required',
            'ribbon_path' => 'required',
            'description' => 'required',
            'access_level' => 'required',
            'sort_order' => 'bail|required|integer|min:0'
        ]);
        $moduleData = $request->all();
        unset($moduleData['_token']);

        $module = ModuleRibbon::create([
            'active' => 1,
            'module_id' => $moduleData['module_id'],
            'ribbon_name' => $moduleData['ribbon_name'],
            'ribbon_path' => $moduleData['ribbon_path'],
            'description' => $moduleData['description'],
            'access_level' => $moduleData['access_level'],
            'sort_order' => $moduleData['sort_order'],
        ]);

        if($moduleData['access_level'] >= 3){
            $module = Module_access::create([
                'active' => 1,
                'module_id' => $moduleData['module_id'],
                'user_id' => $user = Auth::id(),
                'access_level' => $moduleData['access_level'],
            ]);

        }

        return response()->json(['new_name' => $moduleData['ribbon_name'], 'new_path' => $moduleData['ribbon_path']], 200);
    }

    /**
     * Activate ribbone modulw.
     *
     * @param \App\ModuleRibbon $moduleRibbon
     * @return \Illuminate\Http\Response
     */
    public function ribbonAct(ModuleRibbon  $mod){
        if ($mod->active == 1) $status = 0;
        else $status = 1;

        $mod->active = $status;
        $mod->update();
        return response()->json(['success'=>'Status  successfully Changed'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ModuleRibbon $moduleRibbon
     * @return \Illuminate\Http\Response
     */
    public function edit(ModuleRibbon $moduleRibbon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ModuleRibbon $moduleRibbon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModuleRibbon $moduleRibbon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ModuleRibbon $moduleRibbon
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModuleRibbon $moduleRibbon)
    {
        //
    }
}
