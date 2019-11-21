<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

    protected $fillable = ["key", "value", "default"];
    protected $primaryKey = 'key';
    public $incrementing = false;
    public $timestamps = false;

}
