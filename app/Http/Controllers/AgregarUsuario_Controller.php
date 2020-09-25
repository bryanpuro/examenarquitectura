<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Roles;
use Session;

class AgregarUsuario_Controller extends Controller
{
    public function index(){
        $users = User::all();

        $roles = Roles::all();

        return view('agregarusuario.index')
        ->with('users', $users)
        ->with('roles', $roles);
    }

    public function create(){
        $roles = array();

        foreach(Roles::all() as $rol){
            $roles[$rol->id_roles] = $rol->rol;
        }

        return view('agregarusuario.create')
            ->with('roles',$roles);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
           'id_roles' => 'required|integer',
           'CI' => 'required|max:10|min:10', 
           'nombres' => 'required|max:20|min:3',
           'apellidos' => 'required|max:60|min:5', 
           'direccion' => 'required|max:60|min:5',
           'telefono' => 'required|max:60|min:6',
           'email' => 'required|max:60|min:5',
           'password' => 'required|string|min:6|confirmed'


        ]);

        if($validator -> fails()) {
            return redirect('agregarusuario/create')
                ->withInput()
                ->withErrors($validator);

        }

        //Crear Bicicleta
        $users = new User;
        $users->id_roles = $request->id_roles;
        $users->CI = $request->CI;
        $users->nombres = $request->nombres;
        $users->apellidos = $request->apellidos;
        $users->direccion = $request->direccion;
        $users->telefono = $request->telefono;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
       // $users->estado = $request-> '1' ;

        $users->save();

        Session::flash('agregarusuario_creada','Nueva usuario creado');
        //direcciona a crear categoria
        $users = User::all();
        $roles = Roles::all();
        return view('agregarusuario.index')
        ->with('users', $users)
        ->with('roles', $roles);
    }



    public function edit($id_users){
        $roles = array();
        $users = User::findorfail($id_users);

        foreach(Roles::all() as $rol){
            $roles[$rol->id_roles] = $rol->rol;
        }

        

        return view('agregarusuario.edit')
        ->with('users', $users)
        ->with('roles', $roles);
    }

    public function update(Request $request, $id_users){

        $validator = Validator::make($request->all(), [
            'id_roles' => 'required|integer',
            //'CI' => 'required|max:10|min:10', 
            'nombres' => 'required|max:20|min:3',
            'apellidos' => 'required|max:60|min:5', 
            'direccion' => 'required|max:60|min:5',
            'telefono' => 'required|max:60|min:6',
            //'email' => 'required|max:60|min:5',
            //'password' => 'required|string|min:6|confirmed'
 
         ]);
         $users = User::find($id_users);
        if($validator -> fails()) {
            return redirect('agregarusuario/' . $users->id_users .	 '/edit')
                ->withInput()
                ->withErrors($validator);

        }
        //Actualizar usuario
        
        $users->id_roles = $request->id_roles;
        //$users->CI = $request->CI;
        $users->nombres = $request->nombres;
        $users->apellidos = $request->apellidos;
        $users->direccion = $request->direccion;
        $users->telefono = $request->telefono;
        //$users->email = $request->email;
        //$users->password = bcrypt($request->password);
        $users->save();

        Session::flash('agregarusuario_update','Nueva usuario creado');
        //direcciona a crear categoria
        $users = User::all();
        $roles = Roles::all();
        return view('agregarusuario.index')
        ->with('users', $users)
        ->with('roles', $roles);
    }

    public function destroy($id_users){
        $users = User::find($id_users);
        //borrar mensajes
        
        $users->delete();

        Session::flash('users_delete','Usuario Eliminado');

        $roles = Roles::all();
        $users = User::all();

        return view('agregarusuario.index')
        ->with('users', $users)
        ->with('roles', $roles);
    }
}
