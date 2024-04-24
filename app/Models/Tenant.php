<?php

namespace App\Models;
use App\Models\RoomTenant;
use App\Models\RoomRecord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'phone_number',
        'address',
    ];

    public function roomTenants(){
        return $this->hasMany(RoomTenant::class);
    }
    public function roomRecords(){
        return $this->hasMany(RoomRecord::class);
    }
}
