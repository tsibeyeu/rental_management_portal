<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MemberTrainingPackage;
use App\Models\MembershipType;
use App\Models\MemberAttendance;

class Member extends Model
{
    use HasFactory;
    public function memberTrainingPackages(){
        return $this->hasMany(MemberTrainingPackage::class);
    }

    public function membershipType(){
        return $this->belongsTo(MembershipType::class);
    }

    public function memberAttendance(){
        return $this->hasOne(MemberAttendance::class);
    }
}
