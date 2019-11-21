<?php

namespace App\Helpers;

use App\Model\ActivityLog;
/**
 * Description of Logging
 *
 * @author Ivan.Bay
 */
class Logging {
    
    public static function logActivity($activity) {
        $log = new ActivityLog();
        $log->activity = $activity;
        $log->activity_by = ""; // set by mutators from model
        $log->save();
    }
    
}
