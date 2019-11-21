<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model {

    protected $fillable = ['id', 'name', 'description'];
    
    public function assets() {
        return $this->hasMany(Asset::class, 'supplier_id', 'id');
    }
    
    public function licenses() {
        return $this->hasMany(License::class, 'vendor_id', 'id');
    }

}
