<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Http\Requests\CursoUpdateRequest;
use App\Models\Curso;
use App\Models\CursoVideoUri;
use App\Models\Moneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCursoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $cursos = DB::table('cursos as cur')
      ->join('monedas as mon', 'mon.id', '=', 'cur.moneda_id')
      ->select('cur.id', 'cur.name', 'cur.title', 'cur.videos_curso_cantidad', 'cur.image_curso', 'cur.video_demo_Uri', 'cur.coast', 'cur.tipo_curso_id', 'mon.simbolo')
      ->orderBy('cur.id', 'asc')
      ->paginate(12);

    $temarios = CursoVideoUri::all();

    return view('pages.adminCurso', ['cursos' => $cursos, 'temarios' => $temarios]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $modedas = Moneda::all();

    return view('pages.newCurso', ['monedas' => $modedas]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CursoRequest $request)
  {
    $curso = $request->all();
    // dd($request);
    if ($imagen = $request->file('imagen')) {
      $rutaGuardarImg = 'img/cursos/';
      $imagenCurso = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
      $imagen->move($rutaGuardarImg, $imagenCurso);
      $curso['image_curso'] = "$imagenCurso";
    }
    Curso::create($curso);

    return redirect()->route('cursos.index')->with('success', 'Curso created');
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
    $datosCurso = Curso::where('id', $id)->first();
    $datoMoneda = Moneda::where('id', $datosCurso->moneda_id)->first();
    $monedas = Moneda::all();
    return view('pages.editCurso', ['curso' => $datosCurso, 'simbolo' => $datoMoneda, 'monedas' => $monedas]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Curso $curso)
  {

    // dd($request, $curso);
    $cur = $request->all();

    if ($imagen = $request->file('imagen')) {
      $rutaGuardarImg = 'img/cursos/';
      $imagenCurso = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
      $imagen->move($rutaGuardarImg, $imagenCurso);
      $cur['image_curso'] = "$imagenCurso";
    } else {
      unset($cur['image_curso']);
    }

    $curso->update($cur);

    return redirect()->route('cursos.index')->with('success', 'Curso updated');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Curso $curso)
  {
    $curso->delete();
    return redirect()->route('cursos.index')->with('danger', 'Curso deleted');
  }
}
