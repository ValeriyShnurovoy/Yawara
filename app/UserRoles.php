<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $table = 'user_role';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(Users::class);
    }

    public function configuration()
    {
        return $this->hasMany(Configuration::class);
    }
}