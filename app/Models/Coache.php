<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MemberTrainingPackage;
use App\Models\CoacheAttendance;

class Coache extends Model
{
    use HasFactory;

    public function memberTrainingPackages(){
        return $this->hasMany(MemberTrainingPackage::class);
    }
    public function coacheAttendance(){
        return $this->belongsTo(CoacheAttendance::class);
    }
}
