<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebName extends Model
{
    protected $fillable = ['name','email','telp','address','seo','logo'] ;
    public function take(){
        return \App\WebName::first();
    }
}
