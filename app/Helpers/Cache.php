<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Artisan;

/**
 * Description of Cache
 *
 * @author Ivan.Bay
 */
class Cache {

    public static function clearView() {
        Artisan::call('view:clear');
    }

}
