<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Neighborhood extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $keyType = 'string';
    protected $guarded = [];

    public function countComplaints()
    {
        return $this->hasMany(Complaint::class, 'neighborhood_id', 'id')->select('id');
    }
}
