<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function website()
    {
        return \App\WebName::first();
    }

    public function message()
    {
        return \App\Message::where('status', 1)->count();
    }

    public function client()
    {
        return \App\Client::count();
    }

    public function produk()
    {
        return \App\Product::count();
    }

    public function team()
    {
        return \App\Team::count();
    }


}
