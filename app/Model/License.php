<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class License extends Model
{
    
    protected $fillable = ['license_type_id', 'manufacturer', 'license_key', 'number_of_usage', 'cost', 'vendor_id', 'description', 'acquisition_date', 'expiry_date'];
    protected $appends = ['days_remaining', 'license_type', 'vendor'];
    
    public function license_type() {
        return $this->belongsTo(LicenseType::class);
    }
    
    public function assignedTo() {
        return $this->hasMany(AssignedLicense::class, 'license_id', 'id');
    }
    
    public function vendor() {
        return $this->belongsTo(Supplier::class);
    }
    
    public function getLicenseTypeAttribute() {
        return $this->license_type()->first()->name;
    }
    
    public function getDaysRemainingAttribute() {

        $toDate = date('Y-m-d', strtotime($this->expiry_date));
        $fromDate = date('Y-m-d');

        $to = Carbon::createFromFormat('Y-m-d', $toDate);
        $from = Carbon::createFromFormat('Y-m-d', $fromDate);
        $diff_in_months = $to->diffInDays($from);

        return $diff_in_months;
    }
    
    public function getVendorAttribute() {
        return $this->vendor()->first() != null ? $this->vendor()->first()->name : '';
    }
}
