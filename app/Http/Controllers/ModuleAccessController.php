<?php

namespace App\Http\Controllers;

use App\Module_access;
use Illuminate\Http\Request;

class ModuleAccessController extends Controller
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
     * @param  \App\Module_access  $module_access
     * @return \Illuminate\Http\Response
     */
    public function show(Module_access $module_access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module_access  $module_access
     * @return \Illuminate\Http\Response
     */
    public function edit(Module_access $module_access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module_access  $module_access
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module_access $module_access)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module_access  $module_access
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module_access $module_access)
    {
        //
    }
}
