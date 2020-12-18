<?php
namespace App\Http\Controllers;
use App\Http\Requests\UserEditFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Jornal;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $users = User::all()->where('id_cuadrilla', $user->id);
        return view('usuarios.index', ['user' => $users, 'jornadas' => Jornal::all()]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        
        $users = Auth::user();
        $user = new User();
        
        if($user->validar_dni( request('nif') )){
            $user->name = request('name');
            $user->apellido1 = request('apellido1');
            $user->apellido2 = request('apellido2');
            $user->email = request('email');
            $user->nif = request('nif');
            $user->telefono = request('telefono');
            $user->password = bcrypt(request('password'));
    
            $user->id_cuadrilla = $users->id;
    
            $user->save();
            $user->asignarRol('3');
    
            return redirect('/usuarios');
        }else{
            return Redirect::back()->withInput()->withErrors('El NIF es erróneo');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jornadas = Jornal::all()->where('id_user', $id);
        return view('jornadas.show', ['user' => User::findorfail($id), 'jornadas' => $jornadas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest   $request, $id)
    {
        $usuario = User::findOrFail($id);

        if($usuario->validar_dni( request('nif') )){
            $usuario->name = $request->get('name');
        $usuario->apellido1 = $request->get('apellido1');
        $usuario->apellido2 = $request->get('apellido2');
        $usuario->email = $request->get('email');
        $usuario->nif = $request->get('nif');
        $usuario->telefono = $request->get('telefono');
        $usuario->password = bcrypt($request->get('password'));

        $pass = $request->get('password');
        if ($pass != null) {
            $usuario->password = bcrypt($request->get('password'));
        } else {
            unset($usuario->password);
        }


        $usuario->update();

        return redirect('/usuarios');
        }else{
            return Redirect::back()->withInput()->withErrors('El NIF es erroneo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findorfail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
  
}
