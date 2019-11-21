<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Helpers\Logging;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Cache;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::where("id", $id)->first();
        
        return view('pages.profiles.user')->with('user', $user);
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

        try {
            $user = User::firstOrNew(array('id' => $request->get('userid')));
            $user->username = $request->get('username');
            $user->name = $request->get('name');
            $user->email = $request->get('email');

            if ($request->get('password') != '') {
                $user->password = Hash::make($request->get('password'));
            }

            if ($user->save()) {
                if ($request->hasFile('image')) {

                    $validator = validator($request->all(), [
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);

                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator);
                    }

                    $request->image->move(public_path('images/users'), $id . ".jpg");
                    Cache::clearView();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
