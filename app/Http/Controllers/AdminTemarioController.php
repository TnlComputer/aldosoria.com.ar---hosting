<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoVideoUriRequest;
use App\Models\Curso;
use App\Models\CursoVideoUri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTemarioController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $cursos = DB::table('cursos as cur')
      ->join('monedas as mon', 'cur.moneda_id', '=', 'mon.id')
      ->select('cur.id', 'cur.name', 'cur.title', 'cur.videos_curso_cantidad', 'cur.image_curso', 'video_demo_Uri', 'cur.coast', 'cur.tipo_curso_id', 'mon.simbolo')
      ->orderBy('cur.name', 'desc');

    return view('pages.adminTemario', ['cursos' => $cursos]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $cursos = Curso::orderBy('name', 'asc')->get();
    return view('pages.newTemario', ['cursos' => $cursos]);
  }

  /**
   * Store a newly created resource in storage.
   */
  // public function store(CursoVideoUriRequest $request, CursoVideoUri $cursoVideoUri)
  public function store(Request $request)
  {

    $id = $request->nombre_curso;
    $curso = Curso::find($request->nombre_curso)->first();
    $request['nombre_curso'] = $curso->name;
    $request['nombre_video'] = $curso->title;
    $request['video_curso_id'] = $id;

    $newTemario = $request->all();

    if ($imagen = $request->file('img_video')) {
      $rutaGuardarImg = 'img/cursos/';
      $imagenCurso = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
      $imagen->move($rutaGuardarImg, $imagenCurso);
      $request['img_video'] = "$imagenCurso";
    } else {
      unset($newTemario['img_video']);
    }
    if ($archivo1Curso = $request->file('archivo1_curso')) {
      $rutaGuardarArc1 = 'archivos/';
      $archivo1Curso->move($rutaGuardarArc1, $archivo1Curso);
      $request['archivo1_curso'] = "$archivo1Curso";
    } else {
      unset($newTemario['archivo1_curso']);
    }
    if ($archivo2Curso = $request->file('archivo2_curso')) {
      $rutaGuardarArc2 = 'archivos/';
      $archivo2Curso->move($rutaGuardarArc2, $archivo2Curso);
      $request['archivo2_curso'] = "$archivo2Curso";
    } else {
      unset($newTemario['archivo2_curso']);
    }

    CursoVideoUri::create($newTemario);

    return redirect()->route('temario.show', $id)->with('success', 'Temario created');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $datosCurso = Curso::where('id', $id)->first();
    $curso = CursoVideoUri::where('video_curso_id', $id)->first();
    $temarios = CursoVideoUri::where('video_curso_id', $id)->orderBy('nro_video_id', 'ASC')->get();
    return view('pages.adminTemario', ['temarios' => $temarios, 'curso' => $curso, 'datosCurso' => $datosCurso]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(CursoVideoUri $temario)
  {
    $datosCurso = Curso::where('id', $temario->video_curso_id)->first();
    $tema = CursoVideoUri::where('id', $temario->id)->first();

    // dd($datosCurso, $tema);
    return view('pages.editTemario', ['temario' => $temario, 'datosCurso' => $datosCurso]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, CursoVideoUri $temario)
  {


    $id = $request->video_curso_id;

    $updTemario = $request->all();

    if ($imagen = $request->file('img_video')) {
      $rutaGuardarImg = 'img/cursos/';
      $imagenCurso = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
      $imagen->move($rutaGuardarImg, $imagenCurso);
      $request['img_video'] = "$imagenCurso";
    } else {
      unset($updTemario['img_video']);
    }
    if ($archivo1Curso = $request->file('archivo1_curso')) {
      $rutaGuardarArc1 = 'archivos/';
      $archivo1Curso->move($rutaGuardarArc1, $archivo1Curso);
      $request['archivo1_curso'] = "$archivo1Curso";
    } else {
      unset($updTemario['archivo1_curso']);
    }
    if ($archivo2Curso = $request->file('archivo2_curso')) {
      $rutaGuardarArc2 = 'archivos/';
      $archivo2Curso->move($rutaGuardarArc2, $archivo2Curso);
      $request['archivo2_curso'] = "$archivo2Curso";
    } else {
      unset($updTemario['archivo2_curso']);
    }

    // dd($updTemario);
    $temario->update($updTemario);
    return redirect()->route('temario.show', $id)->with('success', 'Temario created');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(CursoVideoUri $temario)
  {
    // return $temario->id;
    $temario->delete();
    return redirect()->route('temario.show', $temario->video_curso_id)->with('danger', 'Curso deleted');
  }
}
