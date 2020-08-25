<?php

namespace App\Http\Controllers;

use App\HRPositions;
use Illuminate\Http\Request;

class HRPositionsController extends Controller
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
     * @param  \App\HRPositions  $hRPositions
     * @return \Illuminate\Http\Response
     */
    public function show(HRPositions $hRPositions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HRPositions  $hRPositions
     * @return \Illuminate\Http\Response
     */
    public function edit(HRPositions $hRPositions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HRPositions  $hRPositions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HRPositions $hRPositions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HRPositions  $hRPositions
     * @return \Illuminate\Http\Response
     */
    public function destroy(HRPositions $hRPositions)
    {
        //
    }
}
