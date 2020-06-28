<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configuration';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'controller', 'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(UserRoles::class);
    }
}