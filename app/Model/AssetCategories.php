<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssetCategories extends Model
{
    protected $table = "asset_categories";
    
    protected $fillable = ['name'];
    
    public function assets() {
        return $this->hasMany('App\Model\Asset', 'category', 'id');
    }
}
