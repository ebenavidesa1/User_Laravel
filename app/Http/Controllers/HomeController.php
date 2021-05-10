<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Pantalla principal. Listado de usuarios con opciones para cada uno, aplicando paginación.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datos['users']=User::sortable()->paginate(5);
        return view('home', $datos);

    }

    /**
     * Búsqueda de usuario por id e información según su id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user=User::findOrFail($id);
        return view('edit', compact('user'));
    }

    /**
     * Actualizar los cambios realizados del usuario seleccionado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $datos=request()->except(['_token','_method']);
        User::where('id','=',$id)->update($datos);

        //Validación de los campos según los requerimientos.

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'celular' => ['max:10'],
            'cedula' => ['required', 'string', 'max:11'],
            'fechanacimiento' => ['required', 'before:-18 years'],
            'email' => ['required', 'string', 'email'],
        ]);

        return redirect('/home')->with('Mensaje','El usuario se actualizó correctamente');
        
    }

    /**
     * Eliminar el usuario según su id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        User::destroy($id);
        return redirect('/home')->with('Mensaje','Se ha eliminado el registro');
    }



    
}
