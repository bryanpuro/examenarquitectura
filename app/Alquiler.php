<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    public $table = 'alquiler';
    protected $fillable = array('id_cliente','hora_alquiler','hora_devolucion','fecha_alquiler',
    'fecha_devolucion','estado','garantia');
    protected $primaryKey = 'id_alquiler';
    public function Clientes(){
        return $this->belongsTo('clientes');
    }

    public function Detalle(){
        return $this->hasMany('detallealquiler');
    }
}
