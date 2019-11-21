<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Helmesvs\Notify\Facades\Notify;

/**
 * Description of Notification
 *
 * @author Ivan.Bay
 */
class Notification {

    public static function showNotification() {
        if (Session::has('successMessage')) {
            Notify::success(Session::get('successMessage'), $title = "Success", $options = []);
        } else if (Session::has('errorMessage')) {
            Notify::error(Session::get('errorMessage'), $title = "Error", $options = []);
        }
    }

}
