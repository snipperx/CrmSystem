<?php

namespace App\Http\Controllers;

use App\Customer;
use Datatables;
use DB;
use Illuminate\Http\Request;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {

            if (!empty($request->filter_gender)) {
                $data = DB::table('customer')
                    ->select('gender', 'address', 'city', 'postalCode', 'country')
                    ->where('gender', $request->filter_gender)
                    ->where('country', $request->filter_country)
                    ->get();
                return $data;
            } else {
                $data = DB::table('customer')
                    ->select('gender', 'address', 'city', 'postalCode', 'country')
                    ->get();

            }
            return datatables()->of($data)->make(true);
        }

        $data = DB::table('customer')
            ->select('gender', 'address', 'city', 'postalCode', 'country')
            ->get();

        $country_name = DB::table('customer')
            ->select('country')
            ->groupBy('country')
            ->orderBy('country', 'ASC')
            ->get();

       // return $country_name;


        return view('custom_search', compact('country_name'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
