<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $usuarios = Usuarios::all();
    // $usuarios->validate([
    //   'name' => ['required', 'string', 'max:255'],
    //   'phone' => ['required', 'string', 'max:255', 'unique:' . User::class],
    //   'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
    //   'password' => ['required'],
    // ]);


    foreach ($usuarios as $usuario) {

      $user = User::create([
        'id' => $usuario->id,
        'name' => $usuario->name,
        'last_name' => $usuario->last_name,
        'phone' => $usuario->phone,
        'email' => $usuario->email,
        'password' => Hash::make($usuario->password),
        'whatsapp' => $usuario->whatsapp,
        'tlgram' => $usuario->tlgram,
        'roles' => $usuario->roles,
        'pais_id' => $usuario->pais_id
      ]);
      // return $user;
    }
    return ('Proceso Terminado');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Usuarios $usuarios)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Usuarios $usuarios)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Usuarios $usuarios)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Usuarios $usuarios)
  {
    //
  }
}
