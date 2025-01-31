<?php

namespace App\Http\Controllers;

use App\Models\CursoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTestController extends Controller
{
  public function index()
  {

    $id = 179;

    $cursosPagosUsuario = DB::table('cursos_pagos_videos as cvp')
      ->join('cursos_usuarios as cu', 'cu.curso_id', '=', 'cvp.video_curso_id')
      ->select(
        'cvp.id',
        'cvp.user_curso_id',
        'cvp.video_curso_id',
        'cvp.vto_curso',
        'cu.nombre_curso',
        'cu.titulo_curso',
        'cu.forma_pago_curso',
        'cu.fecha_inscripcion',
        'cu.pago_curso'
      )
      ->where('cvp.user_curso_id', '=', $id)
      ->where('cu.user_curso_id', '=', $id)
      ->orderBy('cu.curso_id', 'asc')
      ->get();

    dd($cursosPagosUsuario);
  }
}
