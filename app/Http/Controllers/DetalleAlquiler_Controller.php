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
use Session;


class DetalleAlquiler_Controller extends Controller
{
    
    //lista de clientes
    public function index(){
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


    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            
            'hora_alquiler' => 'required',
            'hora_devolucion' => 'required',

            'fecha_alquiler' => 'required|date| after_or_equal:today',
            'fecha_devolucion' => 'required|after_or_equal:fecha_alquiler',
            'garantia' => 'required',
            //'garantia' => 'required',
        ]);

        if($validator -> fails()) {
            return redirect('vistaalquiler')
                ->withInput()
                ->withErrors($validator);

        }
        //Crear alquiler
        $alquiler = new Alquiler;
        $alquiler->id_cliente= $request->id_cliente;
        $alquiler->hora_alquiler = $request->hora_alquiler;
        $alquiler->hora_devolucion = $request->hora_devolucion;
        $alquiler->fecha_alquiler = $request->fecha_alquiler;
        $alquiler->fecha_devolucion = $request->fecha_devolucion;
        $alquiler->estado = 'Alquilado';
        $alquiler->garantia = $request->garantia;
        $alquiler->save();
        $iva_vista = $request->iva;
             //Session::flash('alquiler_creada','Nueva Bicicleta creada');
        //direcciona a crear categoria
        //$last = DB::table('alquiler')->latest()-;
        $alquiler = Alquiler::all()->last();
        $bicicletas = array();
         foreach(Bicicletas::all() as $bicicleta){
            if($bicicleta->stock > 0){
                $bicicletas[$bicicleta->id_bicicleta] = $bicicleta->modelo . " / " .$bicicleta->marca ." : ".$bicicleta->stock;
            }
         }

         

        $clientes = Clientes::find($alquiler->id_cliente);
        $detalquiler = NULL;
        
        return view('detallealquiler/index')
        ->with('alquiler', $alquiler)
        ->with('bicicletas', $bicicletas)
        ->with('clientes', $clientes)
        ->with('detalquiler', $detalquiler)
        ->with('iva_vista', $iva_vista);
    }

    public function store2(Request $request){       

        $validator = Validator::make($request->all(), [
           
        ]);

        if($validator -> fails()) {
            return redirect('detallealquiler/index')
                ->withInput()
                ->withErrors($validator);

        }

        $bicicletas_update = Bicicletas::find($request->id_bicicleta);
        if($request->cantidad > $bicicletas_update->stock){
            Session::flash('cantidad_mayor','La cantidad es mayor a nuestro Stock');
            $alquiler = Alquiler::find($request->id_alquiler);

        $bicicletas = array();
        $bicicletas_update->stock = ($request->cantidad) - ($bicicletas_update->stock);
        $bicicletas_update->save();
        foreach(Bicicletas::all() as $bicicleta){
            if($bicicleta->stock > 0){
                $bicicletas[$bicicleta->id_bicicleta] = $bicicleta->modelo . " / " .$bicicleta->marca ." : ".$bicicleta->stock;
            }
        }
        $bicicletaslist = Bicicletas::all();
        
        $clientes = Clientes::find($alquiler->id_cliente);

        $sql = "SELECT * FROM detallealquiler WHERE id_alquiler=?";
        $detalquiler = DB::select($sql,array($alquiler->id_alquiler));
        $iva = ($request->iva)/100;
        $subtotal = 0;
        $total=0;
        foreach($detalquiler as $detalle){
            $subtotal += $detalle->precio_final;
        }

        $total= ($subtotal *$iva) + $subtotal ;
       

        return view('detallealquiler/index')
        ->with('alquiler', $alquiler)
        ->with('clientes', $clientes)
        ->with('bicicletas', $bicicletas)
        ->with('detalquiler', $detalquiler)
        ->with('bicicletaslist', $bicicletaslist)
        ->with('iva_vista', $request->iva)
        ->with('subtotal', $subtotal)
        ->with('total', $total);

        } else {

        //Crear alquiler
        $dtalquiler = new DetalleAlquiler;
        $dtalquiler->id_alquiler= $request->id_alquiler;
        $dtalquiler->id_bicicleta = $request->id_bicicleta;
        $dtalquiler->precio = $request->precio;
        $dtalquiler->cantidad = $request->cantidad;
        $dtalquiler->iva = $request->iva;
        $dtalquiler->precio_final= ($request->precio*$request->cantidad);
        $dtalquiler->save();
       
        //Session::flash('alquiler_creada','Nueva Bicicleta creada');
        //direcciona a crear categoria
        //$last = DB::table('alquiler')->latest()-;
        $alquiler = Alquiler::find($dtalquiler->id_alquiler);
        //$bicicletas_update = Bicicletas::find($request->id_bicicleta);

        $bicicletas_update->stock = ($request->cantidad) - ($bicicletas_update->stock);
        $bicicletas_update->save();
        
        $bicicletas = array();
        foreach(Bicicletas::all() as $bicicleta){
            if($bicicleta->stock > 0){
                $bicicletas[$bicicleta->id_bicicleta] = $bicicleta->modelo . " / " .$bicicleta->marca ." : ".$bicicleta->stock;
            }
        }
        $bicicletaslist = Bicicletas::all();
        
        $clientes = Clientes::find($alquiler->id_cliente);

        $sql = "SELECT * FROM detallealquiler WHERE id_alquiler=?";
        $detalquiler = DB::select($sql,array($alquiler->id_alquiler));
        $iva = ($request->iva)/100;
        $subtotal = 0;
        $total=0;
        foreach($detalquiler as $detalle){
            $subtotal += $detalle->precio_final;
        }

        $total= ($subtotal *$iva) + $subtotal ;
       

        return view('detallealquiler/index')
        ->with('alquiler', $alquiler)
        ->with('clientes', $clientes)
        ->with('bicicletas', $bicicletas)
        ->with('detalquiler', $detalquiler)
        ->with('bicicletaslist', $bicicletaslist)
        ->with('iva_vista', $request->iva)
        ->with('subtotal', $subtotal)
        ->with('total', $total);
    }

    }

    public function destroy($id_detalle){

        $detalle = DetalleAlquiler::find($id_detalle);
        $alquiler = Alquiler::find($detalle->id_alquiler);    

        $bicicletas_update = Bicicletas::find($detalle->id_bicicleta);
        $bicicletas_update->stock = ($detalle->cantidad);
        $bicicletas_update->save();
        $iva = $detalle->iva;
        $detalle->delete();

        $bicicletas = array();
        foreach(Bicicletas::all() as $bicicleta){
            if($bicicleta->stock > 0){
                $bicicletas[$bicicleta->id_bicicleta] = $bicicleta->modelo . " / " .$bicicleta->marca ." : ".$bicicleta->stock;
            }
        }
       
        $bicicletaslist = Bicicletas::all();
        $clientes = Clientes::find($alquiler->id_cliente);

        $sql = "SELECT * FROM detallealquiler WHERE id_alquiler=?";
        $detalquiler = DB::select($sql,array($alquiler->id_alquiler));

        $subtotal = 0;
        $total=0;
        foreach($detalquiler as $detalle){
            $subtotal += $detalle->precio_final;

        }
        $total= ($subtotal*$iva)+ $subtotal;
       //dd($total);

        return view('detallealquiler/index')
        ->with('alquiler', $alquiler)
        ->with('clientes', $clientes)
        ->with('bicicletas', $bicicletas)
        ->with('detalquiler', $detalquiler)
        ->with('bicicletaslist', $bicicletaslist)
        ->with('iva_vista', $iva)
        ->with('subtotal', $subtotal)
        ->with('total', $total);
        
    }


    public function edit($id_alquiler){

        $alquiler = Alquiler::find($id_alquiler);

        $sql_det = "SELECT * FROM detallealquiler WHERE id_alquiler=?";
        $detalquiler = DB::select($sql_det,array($alquiler->id_alquiler));
        
        //dd($detalquiler); 
        foreach($detalquiler as $det){
            $bicicletas_update = Bicicletas::find($det->id_bicicleta);
            $bicicletas_update->stock = ($det->cantidad) + ($bicicletas_update->stock);
            $bicicletas_update->save();
        }
        
        $alquiler->estado = 'Entregado';
        $alquiler->save();

        $clientes = array();
        foreach(Clientes::all() as $cliente){
            $clientes[$cliente->id_cliente] = $cliente->nombre . " " .$cliente->apellido;    
        }
        
        $sql = "SELECT * FROM alquiler WHERE estado='Alquilado'";
        $alquilerlist = DB::select($sql);

        $listaclientes = Clientes::all();
        return view('vistaalquiler/index')
        ->with('clientes', $clientes)
        ->with('listaclientes', $listaclientes)
        ->with('alquilerlist', $alquilerlist);
    }
   
    

}
