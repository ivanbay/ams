<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model {

    protected $fillable = ['id', 'firstname', 'lastname', 'contact', 'email', 'address', 'position'];

    public function assignedAssets() {
        return $this->hasMany(AssignedAsset::class)->with('asset')->orderBy("created_at", "desc");
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
