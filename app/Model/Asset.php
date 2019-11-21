<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Asset extends Model {

    protected $primaryKey = 'tag';
    protected $casts = ['tag' => 'string'];
    protected $appends = ['historical', 'warranty_expiry', 'days_remaining'];

    public function categoryDetails() {
        return $this->hasOne('App\Model\AssetCategories', 'id', 'category')->select('id', 'name');
    }

    public function statusDetails() {
        return $this->hasOne('App\Model\AssetStatus', 'id', 'status')->select('id', 'name');
    }

    public function locationDetails() {
        return $this->hasOne('App\Model\AssetLocation', 'id', 'location')->select('id', 'name');
    }

    public function supplier() {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id')->select('id', 'name');
    }

    public function maintenance() {
        return $this->hasMany(Maintenance::class, 'asset_id', 'tag')->with('status');
    }

    public function getWarrantyExpiryAttribute() {
        if ($this->warranty != '') {
            $expiry = date('Y-m-d', strtotime("+" . $this->warranty . " months", strtotime($this->purchasedDate)));
            return $expiry;
        }
        return null;
    }

    public function getDaysRemainingAttribute() {

        if ($this->warranty == null) {
            return null;
        }
        $toDate = date('Y-m-d', strtotime($this->warranty_expiry));
        $fromDate = date('Y-m-d');

        $to = Carbon::createFromFormat('Y-m-d', $toDate);
        $from = Carbon::createFromFormat('Y-m-d', $fromDate);
        $diff_in_months = $to->diffInDays($from);

        return $diff_in_months;
    }

    public function getRecords($where = null) {
        $sql = "SELECT 
                    a.tag,
                    cat.name category,
                    e.name supplier,
                    a.brand,
                    a.model,
                    stat.name status,
                    a.purchasedDate,
                    a.purchasedCost,
                    CASE 
                        WHEN c.lastname IS NOT NULL AND d.name IS NULL THEN CONCAT(c.lastname, ', ', c.firstname)
                        WHEN d.name IS NOT NULL AND c.lastname IS NULL THEN d.name
                        ELSE null
                    END assignedTo,
                    CASE 
                        WHEN b.personnel_id IS NOT NULL THEN b.personnel_id
                        WHEN b.location_id IS NOT NULL THEN b.location_id
                        ELSE null
                    END assignedToId,                  
                    d.name location,
                    CASE 
                        WHEN c.lastname IS NOT NULL AND d.name IS NULL THEN 'personnel'
                        WHEN d.name IS NOT NULL AND c.lastname IS NULL THEN 'location'
                        ELSE 'not assigned'
                    END assignedType,
                    a.created_at
                    FROM assets a
                    LEFT JOIN asset_categories cat ON a.category = cat.id
                    LEFT JOIN asset_status stat ON a.`status` = stat.id
                    LEFT JOIN assigned_assets b ON a.tag = b.assetTag
                    LEFT JOIN personnels c ON b.personnel_id = c.id
                    LEFT JOIN asset_locations d ON b.location_id = d.id
                    LEFT JOIN suppliers e on a.supplier_id = e.id ";

        if ($where != null && is_array($where)) {
            if (isset($where['status'])) {
                $sql .= "WHERE stat.name LIKE '%" . $where['status'] . "%' ";
            }
        }

        $sql .= 'ORDER BY a.created_at DESC';

        return DB::select($sql);
    }

//    public function assignedTo() {
//        return $this->hasOne(AssignedAsset::class, 'assetTag', 'tag')->with(['location', 'personnel']);
//    }

    public function getAssignedToAttribute() {
//        return $this->hasOne(AssignedAsset::class, 'assetTag', 'tag')->with(['location', 'personnel']);
        $sql = "SELECT * 
                FROM 
                (
                    SELECT 
                        a.assetTag,
                        CONCAT(b.lastname, ', ', b.firstname) as assignedTo,
                        a.created_at
                    FROM assigned_assets a
                    JOIN personnels b 
                    ON a.personnel_id = b.id

                    UNION 

                    SELECT 
                        a.assetTag,
                        b.name assignedTo,
                        a.created_at
                    FROM assigned_assets a
                    JOIN asset_locations b 
                    ON a.location_id = b.id
                ) x
                WHERE assetTag = '" . $this->tag . "'
                ORDER BY x.created_at DESC
                LIMIT 1";

        return collect(DB::select($sql))->first();
    }

    public function getHistoricalAttribute() {
        $sql = "SELECT *
                FROM (
                SELECT 
                    a.assetTag,
                    CONCAT(b.lastname, ', ', b.firstname) as assignedTo,
                    a.status,
                    a.created_at
                FROM assigned_assets_history a
                JOIN personnels b 
                ON a.assigned_to_id = b.id
                WHERE a.assigned_to = 'p'

                UNION 

                SELECT 
                    a.assetTag,
                    b.name assignedTo,
                    a.status,
                    a.created_at
                FROM assigned_assets_history a
                JOIN asset_locations b 
                ON a.assigned_to_id = b.id
                WHERE a.assigned_to = 'l'
                ) x
                WHERE x.assetTag = '" . $this->tag . "'
                ORDER BY x.created_at DESC";

        return DB::select($sql);
    }

    public function assignedLicense() {
        return $this->hasOne(AssignedLicense::class, 'asset_id', 'tag')->with('license');
    }

}
