<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class MembershipType extends Model
{
    use HasFactory;
    public function member(){
        return $this->hasOne(Member::class);
    }
}
