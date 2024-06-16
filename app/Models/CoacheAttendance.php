<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coache;

class CoacheAttendance extends Model
{
    use HasFactory;
    public function coache(){
        return $this->hasOne(Coache::class);
    }
}
