<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    protected $table = "asset_types";
    protected $fillable = ['name'];
}
