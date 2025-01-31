<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\CursoVideoUri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $cursos = DB::table('cursos as cur')
      ->join('monedas as mon', 'cur.moneda_id', '=', 'mon.id')
      ->select('cur.id', 'cur.name', 'cur.title', 'cur.videos_curso_cantidad', 'cur.image_curso', 'video_demo_Uri', 'cur.coast', 'cur.tipo_curso_id', 'mon.simbolo')
      ->orderBy('cur.name', 'desc')
      ->paginate(6);

    return view('pages.cursos', ['cursos' => $cursos]);
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
    $curso = CursoVideoUri::where('video_curso_id', $id)->first();
    $temarios = CursoVideoUri::where('video_curso_id', $id)->orderBy('nro_video_id', 'ASC')->get();
    // dd($temarios);
    return view('pages.cursoDetalle', ['temarios' => $temarios, 'curso' => $curso]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Curso $curso)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, curso $curso)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(curso $curso)
  {
    //
  }
}
