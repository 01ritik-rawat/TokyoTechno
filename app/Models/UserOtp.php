<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model
{
    use HasFactory;
    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
