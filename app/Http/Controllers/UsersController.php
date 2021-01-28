<?php

namespace App\Http\Controllers;

use App\HRPerson;
use App\Module;
use App\User;
use App\HRPositions;
use Hashids\Hashids;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    private $users;

    /* @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $userName = $request['name'];
        $userID = $request['employee_id'];
        $userPosition = $request['designation'];
        // $userPosition = $request['designation);

        return $userName;


    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index()
    {


    }

    public function getUsers()
    {
        $positions = HRPositions::where('status', 1)->get();
        return datatables()->of($positions)->make(true);
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
     * // * @param \App\User $usere
     * //   * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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
