<?php

namespace App\Http\Controllers;

use App\HRPerson;
use Illuminate\Http\Request;

class HRPersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
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
     * @param  \App\HRPerson  $hRPerson
     * @return \Illuminate\Http\Response
     */
    public function show(HRPerson $hRPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HRPerson  $hRPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(HRPerson $hRPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HRPerson  $hRPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HRPerson $hRPerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HRPerson  $hRPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(HRPerson $hRPerson)
    {
        //
    }
}
