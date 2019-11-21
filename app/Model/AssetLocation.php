<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssetLocation extends Model {

    protected $table = "asset_locations";
    protected $fillable = ['name'];

    public function assigned_assets() {
        return $this->hasMany(AssignedAsset::class, 'location_id', 'id');
    }
    
    public function assignedAssetsHistorical() {
        return $this->hasMany(AssignedAssetsHistory::class, 'assigned_to_id', 'id')
                        ->join('assets', 'assigned_assets_history.assetTag', '=', 'assets.tag')
                        ->select([
                            'assigned_assets_history.assigned_to_id',
                            'assigned_assets_history.assetTag',
                            'assigned_assets_history.created_at',
                            'assigned_assets_history.status',
                            'assets.tag',
                            'assets.name',
                            'assets.description'
                        ])->orderBy('assigned_assets_history.created_at', 'desc');
    }
}
