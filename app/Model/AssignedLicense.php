<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssignedLicense extends Model
{
    protected $table = 'assigned_licenses';
    
    public function license() {
        return $this->belongsTo(License::class);
    }
}
