<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CatBicicletas;
use Session;

class CatBicicletas_Controller extends Controller
{
    public function index(){
        $categories = CatBicicletas::all();

        return view('catbicicletas.index')
        ->with('categories', $categories);
    }

    public function create(){
        return view('catbicicletas.create');
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
           'categoria' => 'required|max:50|min:3' 
        ]);

        if($validator -> fails()) {
            return redirect('catbicicletas/create')
                ->withInput()
                ->withErrors($validator);

        }
        //Crear Categoria
        $category = new CatBicicletas;
        $category->categoria = $request->categoria;
        $category->save();

        Session::flash('categoria_creada','Nueva Categoria Creada');
        //direcciona a crear categoria
        $categories = CatBicicletas::all();

        return view('catbicicletas.index')
        ->with('categories', $categories);
    }

    public function edit($id_cat){
        $categories = CatBicicletas::findorfail($id_cat);

        return view('catbicicletas.edit')
        ->with('categories', $categories);
    }

    public function update(Request $request, $id_cat){

        $validator = Validator::make($request->all(), [
           'categoria' => 'required|max:50|min:3' 
        ]);

        if($validator -> fails()) {
            return redirect('catbicicletas/' . $category->id_cat .	 '/edit')
                ->withInput()
                ->withErrors($validator);

        }
        //Crear Categoria
        $category = CatBicicletas::find($id_cat);
        $category->categoria = $request->Input('categoria');
        $category->save();

        Session::flash('categoria_update','Categoria Actualizada');
        //direcciona a crear categoria
        $categories = CatBicicletas::all();

        return view('catbicicletas.index')
        ->with('categories', $categories);
    }

    public function destroy($id_cat){
        $category = CatBicicletas::find($id_cat);
        $category->delete();

        Session::flash('categoria_delete','Categoria Eliminada');

        $categories = CatBicicletas::all();

        return view('catbicicletas.index')
        ->with('categories', $categories);
    }


}
