<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MemberTrainingPackage;

class PackageSession extends Model
{
    use HasFactory;
    public function memberTrainingPackage(){
        return $this->hasOne(MemberTrainingPackage::class);
    }
}
