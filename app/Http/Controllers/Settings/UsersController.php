<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Notification;
use App\Helpers\Logging;
use App\User;
use App\Role;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        Notification::showNotification();

        $data = array();
        $data['users'] = User::get();
        $data['roles'] = Role::get();

        return view('pages/settings/users')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $isExist = false;

        try {
            $user = User::firstOrNew(array('id' => $request->get('id')));
            $user->username = $request->get('username');
            $user->name = $request->get('name');
            $user->email = $request->get('email');

            if ($request->get('password') != '') {
                $user->password = Hash::make($request->get('password'));
            }

            if ($user->exists) {
                $isExist = true;
                $user->roles()->update(['role_id' => $request->get('role')]);
                Logging::logActivity("User " . $request->get('id') . " records was updated.");
            } else {
                $isExist = false;
            }

            if ($user->save()) {
                if (!$isExist) {
                    $user->roles()->attach($request->get('role'));
                    Logging::logActivity("Added new user. User ID: " . $request->get('name'));
                }

                return redirect()->back()->with('successMessage', 'User successfully added/updated!');
            } else {
                return redirect()->back()->with('errorMessage', 'Something went wrong! Please try again.');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $users = User::find($id);

        if ($users != "") {
            return Response()->json($users, 200);
        } else {
            return Response()->json(array('message' => 'failed'), 204);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
