<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\CursoPago;
use App\Models\CursoVideoUri;
// use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {

    $cursosPagos = DB::table('cursos_pagos_videos as curp')
      ->join('cursos as cur', 'cur.id', '=', 'curp.video_curso_id')
      ->where('curp.user_curso_id', '=', Auth::user()->id)
      ->select('curp.id', 'curp.video_curso_id', 'curp.user_curso_id', 'curp.vto_curso', 'cur.name', 'cur.title', 'cur.image_curso', 'cur.video_demo_Uri')
      ->orderBy('cur.id', 'asc')
      ->paginate(6);

    $temarios = CursoVideoUri::all();

    // return view('pages.cursosPagos', ['cursosPagos' => $cursosPagos, 'date' => $date]);
    return view('pages.dashboard', ['cursosPagos' => $cursosPagos, 'temarios' => $temarios]);
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
  public function show(string $id)
  {
    $cursosPagos = DB::table('cursos_pagos_videos as curp')
      ->join('cursos as cur', 'cur.id', '=', 'curp.video_curso_id')
      ->where('curp.user_curso_id', '=', Auth::user()->id)
      ->select('curp.id', 'curp.video_curso_id', 'curp.user_curso_id', 'curp.vto_curso', 'cur.name', 'cur.title', 'cur.image_curso', 'cur.video_demo_Uri')
      ->orderBy('cur.id', 'asc')
      ->paginate(6);

    $temarios = CursoVideoUri::all();

    return view('pages.cursosPagos', ['cursoPago' => $cursosPagos, 'temario' => $temarios]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(CursoPago $cursoPago)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, CursoPago $cursoPago)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(CursoPago $cursoPago)
  {
    //
  }
}
