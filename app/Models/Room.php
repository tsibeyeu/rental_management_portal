<?php

namespace App\Models;
use App\Models\RoomTenant;
use App\Models\User;
use App\Models\TenantRecord;
use App\Models\RoomType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=[
        'floor',
        'room_number',
        'square_area',
        'price_per_area',
        'total_price',
        'status',
    ];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function roomType(){
        return $this->belongsTo(RoomType::class);
    }

    public function roomTenants(){
        return $this->hasMany(RoomTenant::class);
    }
    public function tenantRecords(){
        return $this->hasMany(TenantRecord::class);
    }
}
