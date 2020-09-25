<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CatBicicletas;
use App\Bicicletas;
use Session;


class Bicicletas_Controller extends Controller
{
    public function index(){
        $categories = CatBicicletas::all();

        $bicicletas = Bicicletas::all();

        return view('bicicletas.index')
        ->with('bicicletas', $bicicletas)
        ->with('categories', $categories);
    }

    
    public function create(){
        $categories = array();

        foreach(CatBicicletas::all() as $category){
            $categories[$category->id_cat] = $category->categoria;
        }

        return view('bicicletas.create')
            ->with('categories',$categories);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
           'id_cat' => 'required|integer',
           'stock' => 'required|integer', 
           'modelo' => 'required|max:20|min:3',
           'marca' => 'required|max:60|min:5', 
           'imagen' => 'required|mimes:JPG,jpeg,png,gif',
        ]);

        if($validator -> fails()) {
            return redirect('bicicletas/create')
                ->withInput()
                ->withErrors($validator);

        }
        $imagen = $request->file('imagen');
        $upload = "imagenesbicis/";
        $filename = time().$imagen->getClientOriginalName();
        $path = move_uploaded_file($imagen->getPathName(), $upload.$filename);

        //Crear Bicicleta
        $bicicleta = new Bicicletas;
        $bicicleta->id_cat = $request->id_cat;
        $bicicleta->stock = $request->stock;
        $bicicleta->modelo = $request->modelo;
        $bicicleta->marca = $request->marca;
        $bicicleta->imagen = $filename;
        $bicicleta->save();

        Session::flash('bicicleta_creada','Nueva Bicicleta creada');
        //direcciona a crear categoria
        $categories = CatBicicletas::all();
        $bicicletas = Bicicletas::all();

        return view('bicicletas.index')
        ->with('bicicletas', $bicicletas)
        ->with('categories', $categories);
    }


    public function edit($id_bicicleta){
        $categories = array();
        $bicicletas = Bicicletas::findorfail($id_bicicleta);

        foreach(CatBicicletas::all() as $category){
            $categories[$category->id_cat] = $category->categoria;
        }

        

        return view('bicicletas.edit')
        ->with('bicicletas', $bicicletas)
        ->with('categories', $categories);
    }

    public function update(Request $request, $id_bicicleta){

        $validator = Validator::make($request->all(), [
            'id_cat' => 'required|integer',
            'stock' => 'required|integer', 
            'modelo' => 'required|max:20|min:3',
            'marca' => 'required|max:60|min:5',
            'imagen' => 'mimes:jpg,jpeg,png,gif', 
         ]);

         $bicicletas = Bicicletas::find($id_bicicleta);
        if($validator -> fails()) {
            return redirect('bicicletas/' . $bicicletas->id_bicicleta .	 '/edit')
                ->withInput()
                ->withErrors($validator);

        }

        if($request->file('imagen') != ""){
            $imagen = $request->file('imagen');
            $upload = "imagenesbicis/";
            $filename = time().$imagen->getClientOriginalName();
            $path = move_uploaded_file($imagen->getPathName(), $upload.$filename);
        }
        //Crear Categoria
        
        $bicicletas->id_cat = $request->Input('id_cat');
        $bicicletas->stock = $request->Input('stock');
        $bicicletas->modelo = $request->Input('modelo');
        $bicicletas->marca = $request->Input('marca');
        if(isset($filename)){
            $bicicletas->imagen = $filename;
            }  
        $bicicletas->save();

        Session::flash('bicicleta_update','Bicicleta Actualizada');
        //direcciona a crear categoria
        $categories = CatBicicletas::all();
        $bicicletas = Bicicletas::all();

        return view('bicicletas.index')
        ->with('bicicletas', $bicicletas)
        ->with('categories', $categories);
    }

    public function destroy($id_bicicleta){
        $bicicletas = Bicicletas::find($id_bicicleta);
        $image_path = 'imagenesbicis'.$bicicletas->imagen;
        File::delete($image_path);
        
        $bicicletas->delete();

        Session::flash('bicicleta_delete','Bicicleta Eliminado');

        $categories = CatBicicletas::all();
        $bicicletas = Bicicletas::all();

        return view('bicicletas.index')
        ->with('bicicletas', $bicicletas)
        ->with('categories', $categories);
    }


}
