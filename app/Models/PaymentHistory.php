<?php

namespace App\Models;
use App\Models\LicenseAgreement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;
    protected $fillable=[
        'from',
        'to',
        'price'
    ];
    public function licenseAgreement(){
        return $this->belongsTo(PaymentHistory::class);
    }

}
