<?php

namespace App\Http\Controllers;

use App\Http\Requests\JornalFormRequest;
use App\Jornal;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JornalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $user = Auth::user();
        $users = User::all()->where('id_cuadrilla', $user->id);
        return view('jornadas.index', ['users' => $users, 'jornadas' => Jornal::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $users = User::all()->where('id_cuadrilla', $user->id);
        return view('jornadas.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jornal = new Jornal();
        $jornal->id_user = $request->get('jornalero');
        $jornal->dia = request('dia');
        $jornal->inicio_jornada = request('inicio_jornada');
        $jornal->fin_jornada = request('fin_jornada');
        $jornal->precio_hora = request('precio_hora');
        $jornal->pagado = request('pagado');

        $jornal->save();

        return redirect('/jornadas');
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
        return view('usuarios.show', ['user' => User::findorfail($id), 'jornadas' => $jornadas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jornal = Jornal::findOrFail($id);
        $users = User::all();
        return view('jornadas.edit', ['jornal' => $jornal, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jornal = Jornal::findorfail($id);
        $jornal->delete();
        return redirect('/jornadas');
    }
}
