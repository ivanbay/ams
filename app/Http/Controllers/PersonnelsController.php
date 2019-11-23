<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Personnel;
use App\Helpers\Notification;
use App\Helpers\Logging;

class PersonnelsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        Notification::showNotification();

        $personnels = Personnel::get();
        return view('pages/settings/personnels')->with('personnels', $personnels);
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
     * Store personnel in the database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $empId = $request->get('employeeID');
        $lastname = $request->get('lastName');
        $firstname = $request->get('firstName');
        $contact = $request->get('contactNumber');
        $email = $request->get('email');

        try {
            $personnel = Personnel::firstOrNew(array('id' => $empId));
            $personnel->id = $empId;
            $personnel->firstname = ucwords($firstname);
            $personnel->lastname = ucwords($lastname);
            $personnel->contact = $contact;
            $personnel->email = $email;

            if ($personnel->exists) {
                Logging::logActivity("Personnel " . $empId . " information was updated.");
            } else {
                Logging::logActivity("Added new personnel. Employee ID: " . $empId);
            }
            
            if ($personnel->save()) {
                return redirect()->to('personnels')->with('successMessage', 'New personnel has been added/updated!');
            } else {
                return redirect()->to('personnels')->with('errorMessage', 'Something went wrong! Please try again.');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->to('personnels')->with('errorMessage', 'Something went wrong! Maybe Personnel already exist.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $personnel = Personnel::find($id);
        
        if($personnel != "") {
            return Response()->json($personnel, 200);
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
