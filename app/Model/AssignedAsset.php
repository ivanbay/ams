<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Datetime;

class AssignedAsset extends Model
{
    protected $table = 'assigned_assets';
    
    protected $primaryKey = 'assetTag';
    protected $appends = ['assignedAgo'];
    protected $casts = ['assetTag' => 'string'];
    protected $dates = ['created_at', 'updated_at'];
    
    public function asset() {
        return $this->hasOne('App\Model\Asset', 'tag', 'assetTag');
    }
    
    public function personnel() {
        return $this->belongsTo('App\Model\Personnel');
    }
    
    public function location() {
        return $this->hasOne('App\Model\AssetLocation', 'id', 'location_id');
    }
    
    public function getAssignedAgoAttribute() {
        return Datetime::get_timeago($this->attributes['created_at']);
    }
    
}
