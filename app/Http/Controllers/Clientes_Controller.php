<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clientes;
use App\CatBicicletas;
use App\Bicicletas;
use Session;

class Clientes_Controller extends Controller
{
    public function index(){
        $clientes = Clientes::all();
        return view('clientes.index')
        ->with('clientes', $clientes);
        
    }

    public function create(){
        return view('clientes.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
           'CI' => 'required|max:10|min:10', 
           'nombre' => 'required|max:20|min:3',
           'apellido' => 'required|max:60|min:5', 
           'direccion' => 'required|max:60|min:5',
           'telefono' => 'required|max:60|min:6',
        ]);

        if($validator -> fails()) {
            return redirect('clientes/create')
                ->withInput()
                ->withErrors($validator);

        }
        //Crear Categoria
        $clientes = new Clientes;
        $clientes->CI = $request->CI;
        $clientes->nombre = $request->nombre;
        $clientes->apellido = $request->apellido;
        $clientes->direccion = $request->direccion;
        $clientes->telefono = $request->telefono;
        $clientes->save();

        Session::flash('cliente_creada','Nueva Cliente Creada');
        //direcciona a crear categoria
        $clientes = Clientes::all();
        return view('clientes.index')
        ->with('clientes', $clientes);
    }


    public function edit($id_cliente){
        $clientes = Clientes::findorfail($id_cliente);

        return view('clientes.edit')
        ->with('clientes', $clientes);
    }

    public function update(Request $request, $id_cliente){

        $validator = Validator::make($request->all(), [
            //'CI' => 'required|max:10|min:10', 
            'nombre' => 'required|max:20|min:3',
            'apellido' => 'required|max:60|min:5', 
            'direccion' => 'required|max:60|min:5',
            'telefono' => 'required|max:60|min:6',
         ]);
         $clientes = Clientes::find($id_cliente);
        if($validator -> fails()) {
            return redirect('clientes/' . $clientes->id_cliente .	 '/edit')
                ->withInput()
                ->withErrors($validator);

        }
        //Crear Categoria
        $clientes = Clientes::find($id_cliente);
        //$clientes->CI = $request->Input('CI');
        $clientes->nombre = $request->Input('nombre');
        $clientes->apellido = $request->Input('apellido');
        $clientes->direccion = $request->Input('direccion');
        $clientes->telefono = $request->Input('telefono');
        $clientes->save();

        Session::flash('clientes_update','Cliente Actualizada');
        //direcciona a crear categoria
        $clientes = Clientes::all();
        return view('clientes.index')
        ->with('clientes', $clientes);
    }

    public function destroy($id_cliente){
        $clientes = Clientes::find($id_cliente);
        $clientes->delete();

        Session::flash('cliente_delete','Cliente Eliminada');

        $clientes = Clientes::all();
        return view('clientes.index')
        ->with('clientes', $clientes);
    }

    //lista bicicletas
    public function index2(){
        $categories = CatBicicletas::all();

        $bicicletas = Bicicletas::Paginate(2);

        return view('empleado.Empleado')
        ->with('bicicletas', $bicicletas)
        ->with('categories', $categories);
    }



}
