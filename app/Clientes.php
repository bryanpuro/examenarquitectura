<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{

    protected $fillable = array('id_cliente', 'CI', 'nombre','apellido', 'direccion', 'telefono');
    protected $primaryKey = 'id_cliente';

    public function Alquiler(){
        return $this->hasMany('alquiler');
    }
}

