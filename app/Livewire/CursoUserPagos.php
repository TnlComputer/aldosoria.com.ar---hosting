<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CursoUserPagos extends Component
{
  public $slcUsuario = null;
  public $usuarios;
  public $cursosPagos;

  public function mount()
  {
    // Obtener usuarios distintos que tienen al menos un registro en cursos_usuarios
    $this->usuarios = User::whereIn('id', function ($query) {
      $query->select('user_curso_id')
        ->from('cursos_usuarios');
    })->orderBy('last_name')->orderBy('name')->distinct()->get();

    // Inicializar cursosPagos
    $this->cursosPagos = collect();
  }

  public function render()
  {
    return view('livewire.cursos-pagos');
  }

  public function updatedSlcUsuario($usuarioId)
  {
    // Obtener los cursos relacionados con el usuario seleccionado
    $this->cursosPagos = DB::table('cursos_usuarios as cu')
      ->leftJoin('cursos_pagos_videos as cvp', 'cu.curso_id', '=', 'cvp.video_curso_id')
      ->select(
        'cu.id as curso_usuario_id',
        'cu.user_curso_id',
        'cu.curso_id',
        'cu.nombre_curso',
        'cu.titulo_curso',
        'cu.forma_pago_curso',
        'cu.fecha_inscripcion',
        'cu.currency',
        'cu.orderId',
        'cu.amount',
        'cu.payment_id',
        'cu.pago_curso',
        'cvp.id as curso_pago_video_id',
        'cvp.vto_curso',
        'cvp.video_curso_id'
      )
      ->where('cvp.user_curso_id', '=', $usuarioId)
      ->where('cu.user_curso_id', $usuarioId)
      ->orderBy('cu.fecha_inscripcion', 'desc')
      ->get();
  }
}
