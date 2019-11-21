<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Maintenance extends Model {

    protected $table = "maintenance";
    public $timestamps = false;
    protected $appends = ['days_cycle_time'];

    public function asset() {
        return $this->belongsTo(Asset::class, 'asset_id', 'tag');
    }

    public function status() {
        return $this->belongsTo(MaintenanceStatus::class, 'maintenance_status_id', 'id');
    }

    public function getDaysCycleTimeAttribute() {

        if ($this->date_endorsed == null) {
            return null;
        }

        $toDate = date('Y-m-d', strtotime($this->date_endorsed));
        $fromDate = date('Y-m-d');

        $to = Carbon::createFromFormat('Y-m-d', $toDate);
        $from = Carbon::createFromFormat('Y-m-d', $fromDate);
        $diff_in_months = $to->diffInDays($from);

        return $diff_in_months;
    }

}
