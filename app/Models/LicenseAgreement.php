<?php

namespace App\Models;
use App\Models\PaymentHistory;
use App\Models\RoomTenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseAgreement extends Model
{
    use HasFactory;
    protected $fillable=[
        'start_date',
        'expire_date',
        'license_status',
    ];

    public function roomTenant(){
        return $this->belongsTo(RoomTenant::class);
    }
    public function paymentHistories(){
        return $this->hasMany(PaymentHistory::class);
    }
}
