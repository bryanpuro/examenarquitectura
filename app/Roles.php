<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = array('rol');

    public function User(){
        return $this->hasMany('users');
    }
}
