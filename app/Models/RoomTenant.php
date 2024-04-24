<?php

namespace App\Models;
use App\Models\Tenant;
use App\Models\Room;
use App\Models\LicenseAgreement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTenant extends Model
{
    use HasFactory;
    protected $fillable=[
        'floor',
        'room_number',
        'square_area',
        'price_per_area',
        'total_price',
        'status',
    ];
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function licenseAgreements(){
        return $this->hasMany(LicenseAgreement::class);
    }
}
