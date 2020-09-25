<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicicletas extends Model
{
    protected $fillable = array('id_cat','sotck','modelo','marca', 'imagen');
    protected $primaryKey = 'id_bicicleta';
    public function category(){
        return $this->belongsTo('catbicileta');
    }
    public function Detalle(){
        return $this->hasMany('detallealquiler');
    }
}
