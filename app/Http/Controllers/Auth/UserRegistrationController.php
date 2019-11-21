<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class UserRegistrationController extends Controller {

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:50'],
                    'username' => ['required', 'string', 'max:25'],
                    'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->to("login#signup")
                            ->withErrors($validator)
                            ->withInput();
        }

        $user = User::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'username' => $request->get('username'),
                    'password' => Hash::make($request->get('password'))
        ]);

        if ($user) {
            $role = Role::where("name", "Viewer")->first();
            $user->roles()->attach($role);
            
            Auth::guard()->login($user);

            if (Auth::check()) {
                return redirect()->to('login');
            }
        }
    }

}
