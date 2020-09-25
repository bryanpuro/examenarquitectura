<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleAlquiler extends Model
{
    public $table = 'detallealquiler';
    protected $fillable = array('id_bicicleta','id_alquiler','precio','cantidad',
    'iva','precio_final');
    protected $primaryKey = 'id_detalle';
    public function Alquiler(){
        return $this->belongsTo('alquiler');
    }
    public function Bicicleta(){
        return $this->belongsTo('bicicletas');
    }
}
