<?php

namespace App\Http\Controllers;

use App\Http\Requests\userUpdateRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\Pais;
use App\Models\User;

class AdminUsuarioController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $usuarios = User::where('roles', '=', 'ROLE_USER')->orderBy('name', 'ASC')->paginate(22);
    return view('pages.adminUsuarios', ['usuarios' => $usuarios]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $paises = Pais::all();
    return view('pages.newUsuario', ['paises' => $paises]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(UsuarioRequest $request)
  {

    if ($request->password === $request->password_confirmation) {
      $usuario = $request->all();
    }

    User::create($usuario);
    return $request;
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $usuario = User::find($id);
    $paises = Pais::all();
    $paisUser = Pais::find($usuario->pais_id);

    // dd($usuario, $paises, $paisUser);

    return view('pages.editUsuario', ['usuario' => $usuario, 'paises' => $paises, 'paisUser' => $paisUser]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(userUpdateRequest $request, User $usuario)
  {

    // dd($usuario);
    $user = $request->all();
    $usuario->update($user);

    return redirect()->route('usuarios.index')->with('success', 'Usuario updated');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $usuario)
  {
    $usuario->delete();
    return redirect()->route('usuarios.index')->with('danger', 'Usuario deleted');
  }
}
