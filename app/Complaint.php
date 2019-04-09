<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Complaint extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $keyType = 'string';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id')->select('name');
    }

    public function subcategory()
    {
        return $this->hasOne(Subcategory::class, 'id')->select('name');
    }

    public function neighborhood()
    {
        return $this->hasOne(Neighborhood::class, 'id')->select('name');
    }
}
