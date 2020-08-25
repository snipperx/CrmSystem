<?php

namespace App\Http\Controllers;

use App\ModuleRibbon;
use Illuminate\Http\Request;

class ModuleRibbonController extends Controller
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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModuleRibbon  $moduleRibbon
     * @return \Illuminate\Http\Response
     */
    public function show(ModuleRibbon $moduleRibbon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModuleRibbon  $moduleRibbon
     * @return \Illuminate\Http\Response
     */
    public function edit(ModuleRibbon $moduleRibbon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModuleRibbon  $moduleRibbon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModuleRibbon $moduleRibbon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModuleRibbon  $moduleRibbon
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModuleRibbon $moduleRibbon)
    {
        //
    }
}
