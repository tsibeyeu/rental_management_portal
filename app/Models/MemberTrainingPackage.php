<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coache;
use App\Models\Member;
use App\Models\TrainingPackage;
use App\Models\PackageSession;

class MemberTrainingPackage extends Model
{
    use HasFactory;
    public function coache(){
        return $this->belongsTo(Coache::class);
    }
    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function trainingPackage(){
        return $this->belongsTo(TrainingPackage::class);
    }
    public function packageSession(){
        return $this->belongsTo(PackageSession::class);
    }
   
}
