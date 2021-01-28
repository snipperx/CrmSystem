<?php

namespace App\Http\Controllers;

use App\HRPerson;
use App\HRPositions;
use App\user;
use Hashids\Hashids;
use DB;
use App\CompanyIdentity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
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

        $users = HRPerson::select('hr_people.*', 'hr_positions.name as positions')
            ->leftJoin("users", 'hr_people.user_id', 'users.id')
            ->leftJoin("hr_positions", 'hr_people.position', 'hr_positions.id')
            ->get();

        $positions = HRPositions::where('status', 1)->get();

        $data['users'] = $users;
        $data['positions'] = $positions;
        return view('Hr.users')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Save usr
        $compDetails = CompanyIdentity::first();
        $iduration = !empty($compDetails->password_expiring_month) ? $compDetails->password_expiring_month : 0;
        $expiredDate = !empty($iduration) ? mktime(0, 0, 0, date('m') + $iduration, date('d'), date('Y')) : 0;
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->password_changed_at = $expiredDate;
        $user->save();

        //exclude empty fields from query
        $personData = $request->all();
        foreach ($personData as $key => $value) {
            if (empty($personData[$key])) {
                unset($personData[$key]);
            }
        }

        //Save HR record
        $person = new HRPerson($personData);
        $person->status = 1;
        $user->addPerson($person);

        //TODO SEND  EMAILS USING MAILTRAP

        //Redirect to all usr view
        return redirect('/users')->with('success_add', "The user has been added successfully. \nYou can use the search menu to view the user details.");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hashids = new Hashids();
        $userID = $hashids->decode($id);

        $users = HRPerson::select('hr_people.*', 'hr_positions.name as positions')
            ->where('hr_people.user_id', implode($userID))
            ->leftJoin("users", 'hr_people.user_id', 'users.id')
            ->leftJoin("hr_positions", 'hr_people.position', 'hr_positions.id')
            ->first();

        $data['users'] = $users;
        return view('Hr.view_user')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $person = $request->all();
        unset($person['_token'], $person['_method'], $person['command']);

        //Cell number formatting
        $person['cell_number'] = str_replace(' ', '', $person['cell_number']);
        $person['cell_number'] = str_replace('-', '', $person['cell_number']);
        $person['cell_number'] = str_replace('(', '', $person['cell_number']);
        $person['cell_number'] = str_replace(')', '', $person['cell_number']);

        //exclude empty fields from query
        foreach ($person as $key => $value) {
            if (empty($person[$key])) {
                unset($person[$key]);
            }
        }

        //convert numeric values to numbers
        if (isset($person['res_postal_code'])) {
            $person['res_postal_code'] = (int)$person['res_postal_code'];
        }
        if (isset($person['res_province_id'])) {
            $person['res_province_id'] = (int)$person['res_province_id'];
        }
        if (isset($person['gender'])) {
            $person['gender'] = (int)$person['gender'];
        }
        if (isset($person['id_number'])) {
            $person['id_number'] = (int)$person['id_number'];
        }
        if (isset($person['marital_status'])) {
            $person['marital_status'] = (int)$person['marital_status'];
        }
        if (isset($person['ethnicity'])) {
            $person['ethnicity'] = (int)$person['ethnicity'];
        }
        if (isset($person['leave_profile'])) {
            $person['leave_profile'] = (int)$person['leave_profile'];
        }
        //convert date of birth to unix time stamp
        if (isset($person['date_of_birth'])) {
            $person['date_of_birth'] = str_replace('/', '-', $person['date_of_birth']);
            $person['date_of_birth'] = strtotime($person['date_of_birth']);
        }
        //convert date joined company to unix time stamp
        if (isset($person['date_joined'])) {
            $person['date_joined'] = str_replace('/', '-', $person['date_joined']);
            $person['date_joined'] = strtotime($person['date_joined']);
        }
        //convert date left company to unix time stamp
        if (isset($person['date_left'])) {
            $person['date_left'] = str_replace('/', '-', $person['date_left']);
            $person['date_left'] = strtotime($person['date_left']);
        }
        if (empty($person['position'])) $person['position'] = 0;

        //Update users and hr table
        $user->update($person);
        $user->person()->update($person);

        //Upload profile picture
        if ($request->hasFile('profile_pic')) {
            $fileExt = $request->file('profile_pic')->extension();
            if (in_array($fileExt, ['jpg', 'jpeg', 'png']) && $request->file('profile_pic')->isValid()) {
                $fileName = time() . "_avatar_" . time() . '.' . $fileExt;
                $request->file('profile_pic')->storeAs('avatars', $fileName);
                //Update file name in hr table
                $user->person->profile_pic = $fileName;
                $user->person->update();
            }
        }
        AuditReportsController::store('Security', 'User Details Updated', "By User", 0);
        //return to the edit page
        //return redirect("/users/$user->id/edit")->with('success_edit', "The user's details have been successfully updated.");
        return back()->with('success_edit', "The user's details have been successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->load('person');
        $name = $user->person->first_name . ' ' . $user->person->surname;
        AuditReportsController::store('Security', 'User Deleted', "Del: $name ", 0);
        DB::table('users')->where('id', '=', $user->id)->delete();
        DB::table('hr_people')->where('user_id', '=', $user->id)->delete();
        return redirect('/users')->with('success_delete', "User Successfully Deleted.");
    }

    public function getSearch(Request $request)
    {
        $personName = trim($request->person_name);
        $personIDNum = trim($request->id_number);
        $personPassport = trim($request->passport_number);
        $aPositions = [];
        $cPositions = DB::table('hr_positions')->get();
        foreach ($cPositions as $position) {
            $aPositions[$position->id] = $position->name;
        }

        $persons = HRPerson::whereHas('user', function ($query) {
            $query->whereIn('type', [1, 3]);
        })
            ->where(function ($query) use ($personName) {
                if (!empty($personName)) {
                    $query->where('first_name', 'ILIKE', "%$personName%");
                }
            })
            ->where(function ($query) use ($personIDNum) {
                if (!empty($personIDNum)) {
                    $query->where('id_number', 'ILIKE', "%$personIDNum%");
                }
            })
            ->where(function ($query) use ($personPassport) {
                if (!empty($personPassport)) {
                    $query->where('passport_number', 'ILIKE', "%$personPassport%");
                }
            })
            ->orderBy('first_name')
            ->limit(100)
            ->get();


        $data['page_title'] = "Users";
        $data['page_description'] = "List of users found";
        $data['persons'] = $persons;
        $data['m_silhouette'] = Storage::disk('local')->url('avatars/m-silhouette.jpg');
        $data['f_silhouette'] = Storage::disk('local')->url('avatars/f-silhouette.jpg');
        $data['status_values'] = [0 => 'Inactive', 1 => 'Active'];
        $data['breadcrumb'] = [
            ['title' => 'Security', 'path' => '/users', 'icon' => 'fa fa-lock', 'active' => 0, 'is_module' => 1],
            ['title' => 'User search result', 'active' => 1, 'is_module' => 0]
        ];
        $data['positions'] = $aPositions;
        $data['active_mod'] = 'Security';
        $data['active_rib'] = 'Search Users';
        AuditReportsController::store('Security', 'User Search Results Accessed', "By User", 0);
        return view('security.users')->with($data);
    }


}
