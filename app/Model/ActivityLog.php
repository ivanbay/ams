<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Datetime;

class ActivityLog extends Model {

    protected $table = 'activity_logs';
    protected $appends = ['time_ago'];
    protected $dates = ['created_at', 'updated_at'];

    public function setActivityByAttribute() {
        $this->attributes['activity_by'] = Auth::user()->id;
    }
    
    public function user() {
        return $this->belongsTo(\App\User::class, 'activity_by', 'id');
    }
    
    public function getTimeAgoAttribute() {
        return Datetime::get_timeago($this->attributes['created_at']);
    }

}
