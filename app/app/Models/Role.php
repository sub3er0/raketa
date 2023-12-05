<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const MANAGER_ROLE_ID = 1;
    const CUSTOMER_ROLE_ID = 2;

    use HasFactory;

    public function records()
    {
        return $this->hasMany('App\Models\User');
    }
}
