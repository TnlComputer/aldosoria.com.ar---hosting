<?php

namespace App\Http\Controllers;

use App\Livewire\CursoUserPagos;
use App\Models\Curso;
use App\Models\CursoPago;
use App\Models\CursoUsuario;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPagoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $usuarios = User::distinct()->orderBy('last_name', 'asc')->get(['last_name', 'name']);

    return view('pages.adminPagos', ['usuarios' => $usuarios]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $usuarios = User::orderBy('last_name')->orderBy('name')->distinct()->get();
    $cursos = Curso::all();
    return view('pages.newPago', ['usuarios' => $usuarios, 'cursos' => $cursos]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    $date = Carbon::now();
    $date->toDateString();
    $fecha_vto = $date->addDay($request->vto_curso);

    $curso = Curso::find($request->video_curso_id)->first();

    CursoPago::create([
      'user_curso_id' => $request->user_curso_id,
      'video_curso_id' => $request->video_curso_id,
      'vto_curso' => $fecha_vto
    ]);

    $date = Carbon::now();
    $date->toDateString();

    CursoUsuario::create([
      'user_curso_id' => $request->user_curso_id,
      'curso_id' => $request->video_curso_id,
      'nombre_curso' => $curso->name,
      'titulo_curso' => $curso->title,
      'forma_pago_curso' => 0,
      'fecha_inscripcion' => $date,
      'pago_curso' => 'p'
    ]);

    // return redirect()->route('pagos.index')->with('success', 'PagoCurso created');
    return redirect()->route('pagos.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {

    $cursosPagosUsuario =  DB::table('cursos_pagos_videos as cvp')
      ->join(
        'cursos_usuarios as cu',
        'cu.curso_id',
        '=',
        'cvp.video_curso_id'
      )
      ->select(
        'cvp.id',
        'cvp.user_curso_id',
        'cvp.video_curso_id',
        'cvp.vto_curso',
        'cu.nombre_curso',
        'cu.titulo_curso',
        'cu.forma_pago_curso',
        'cu.fecha_inscripcion',
        'cu.currency',
        'cu.orderId',
        'cu.amount',
        'cu.paypal_payment_id',
        'cu.pago_curso'
      )
      ->where('cvp.user_curso_id', '=', $id)
      ->where('cu.user_curso_id', '=', $id)
      ->orderBy('cu.curso_id', 'asc')
      ->get();

    // dd($cursosPagosUsuario);
    return view('pages.adminPagosUser', ['cursosPagosUsuario' => $cursosPagosUsuario]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $cursos = Curso::all();
    $usuarios = User::where('roles', '=', 'ROLE_USER')
      ->orderBy('last_name', 'ASC')
      ->get();

    $userCurso = DB::table('cursos_usuarios as curser')
      ->where('curser.id', $id)
      ->join('users as usr', 'curser.user_curso_id', '=', 'usr.id')
      ->select(
        'curser.id',
        'curser.user_curso_id',
        'curser.curso_id',
        'curser.nombre_curso',
        'curser.titulo_curso',
        'curser.forma_pago_curso',
        'curser.fecha_inscripcion',
        'curser.pago_curso',
        'usr.name as user_name',
        'usr.last_name as user_last_name',
      )
      ->first();

    return view('pages.editPago', ['userCurso' => $userCurso, 'usuarios' => $usuarios, 'cursos' => $cursos]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {

    // $user = CursoUsuario::where('id', $id)->select('user_curso_id')->first();

    $cursoUsuario = CursoUsuario::find($id)
      ->update([
        'pago_curso' => $request->pago_curso,
      ]);

    if ($request->vto_curso > 0) {
      $date = Carbon::now();
      $date->toDateString();
      $fecha_vto = $date->addDay($request->vto_curso);

      // dd($request, $id);
      CursoPago::where('user_curso_id', $request->user_curso_id)
        ->where('video_curso_id', $request->curso_id)
        ->update(['vto_curso' => $fecha_vto]);
    }

    return redirect()->route('pagos.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(CursoPago $pago)
  {
    $pago->delete();
    return redirect()->route('pagos.index')->with('success', 'PagoCurso deleted');
  }
}
