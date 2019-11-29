<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function userGuide() {
        return view('pages.help.userguide');
    }
    
    public function installationInstruction() {
        return view('pages.help.install');
    }
}
