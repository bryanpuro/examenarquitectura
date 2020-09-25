<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatBicicletas extends Model
{
    protected $fillable = array('categoria');
    protected $primaryKey = 'id_cat';
    public function cat_bicicletas(){
        return $this->hasMany('cat_bicicleta');
    }
}
