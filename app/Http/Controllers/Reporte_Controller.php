<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Clientes;
use App\Alquiler;
use App\Bicicletas;
use App\DetalleAlquiler;
use Validator;
class Reporte_Controller extends Controller
{
    public function index($id_alquiler){

        $alquiler = Alquiler::find($id_alquiler);
        //dd($alquiler);
        $clientes = Clientes::find($alquiler->id_cliente);
      
        $bicicletaslist = Bicicletas::all();

        $sql = "SELECT * FROM detallealquiler WHERE id_alquiler=?";
        $detalquiler = DB::select($sql,array($alquiler->id_alquiler));
        $valor_iva = 0;
        $subtotal = 0;
        $total=0;
        foreach($detalquiler as $detalle){
            $valor_iva = $detalle->iva;
            $subtotal += $detalle->precio_final;

        }
        $iva = $valor_iva/100;
        $total= ($subtotal*$iva)+ $subtotal;

        return view('detallealquiler/reporte')
        ->with('alquiler', $alquiler)
        ->with('clientes', $clientes)
        ->with('detalquiler', $detalquiler)
        ->with('bicicletaslist', $bicicletaslist)
        ->with('subtotal', $subtotal)
        ->with('total', $total);
    }

    public function destroy($id_alquiler){
        $alquiler = Alquiler::find($id_alquiler);
        $alquilerlist = Alquiler::all();
        //dd($alquiler);
        $alquiler->delete();
        $clientes = array();
        foreach(Clientes::all() as $cliente){
            $clientes[$cliente->id_cliente] = $cliente->nombre . " " .$cliente->apellido;
            
        }
        $sql = "SELECT * FROM alquiler WHERE estado='Alquilado'";
        $alquilerlist = DB::select($sql);
        // $alquilerlist = Alquiler::all();

        $listaclientes = Clientes::all();
        return view('vistaalquiler/index')
        ->with('clientes', $clientes)
        ->with('listaclientes', $listaclientes)
        ->with('alquilerlist', $alquilerlist);
    }

   

}
