<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Helpers\Logging;

class RolesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $roles = Role::withCount('users')->get();
        return view('pages/settings/roles')->with('roles', $roles);
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

        try {
            $user = Role::firstOrNew(array('id' => $request->get('id')));
            $user->name = $request->get('name');
            $user->description = $request->get('description');

            if ($user->exists) {
                Logging::logActivity("User " . $request->get('id') . " records was updated.");
            } else {
                Logging::logActivity("Added new user. User ID: " . $request->get('id'));
            }

            if ($user->save()) {
                return redirect()->back()->with('successMessage', 'Role successfully added/updated!');
            } else {
                return redirect()->back()->with('errorMessage', 'Something went wrong! Please try again.');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('errorMessage', 'Something went wrong! Maybe role already exist.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $roles = Role::find($id);

        if ($roles != "") {
            return Response()->json($roles, 200);
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
