<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssignedAssetsHistory extends Model {

    protected $table = "assigned_assets_history";

    public function personnel() {
        return $this->belongsTo(Personnel::class, 'assigned_to_id', 'id')
                        ->select([
                            'id',
                            'firstname',
                            'lastname'
        ]);
    }

    public function location() {
        return $this->belongsTo(AssetLocation::class, 'assigned_to_id', 'id');
    }

    public function asset() {
        return $this->belongsTo(Asset::class, 'assetTag', 'tag');
    }

}
