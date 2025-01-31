<?php

namespace App\Http\Controllers;

use App\Livewire\MarcaModelo;
use App\Models\Marcas_autos;
use App\Models\Marcas_images_autos;
use App\Models\Modelos_autos;
use Illuminate\Http\Request;

class AdminChiptuningController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $chips = Marcas_autos::orderBy('marca', 'asc')->paginate(20);
    return view("pages.adminChiptuning", ['chips' => $chips]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $marcas = Marcas_images_autos::all();
    return view("pages.newChip", ['marcas' => $marcas]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $chip = $request->all();
    if ($img_st1 = $request->file('img_st1')) {
      $rutaGuardarImg = 'black/img/Graficos_Banco_Pruebas/';
      $imagenChip1 = date('YmdHis') . $request->marca . "-" . $request->modelo . "-" . $request->motor . "." . $img_st1->getClientOriginalExtension();
      $img_st1->move($rutaGuardarImg, $imagenChip1);
      $chip['img_st1'] = "$imagenChip1";
    }

    if ($img_st2 = $request->file('img_st2')) {
      $rutaGuardarImg = 'black/img/Graficos_Banco_Pruebas/';
      $imagenChip2 = date('YmdHis') . $request->marca . "-" . $request->modelo . "-" . $request->motor . "." . $img_st2->getClientOriginalExtension();
      $img_st2->move($rutaGuardarImg, $imagenChip2);
      $chip['img_st2'] = "$imagenChip2";
    }

    if ($img_st3 = $request->file('img_st3')) {
      $rutaGuardarImg = 'black/img/Graficos_Banco_Pruebas/';
      $imagenChip3 = date('YmdHis') . $request->marca . "-" . $request->modelo . "-" . $request->motor . "." . $img_st3->getClientOriginalExtension();
      $img_st3->move($rutaGuardarImg, $imagenChip3);
      $chip['img_st3'] = "$imagenChip3";
    }

    $chip['modelo_motor'] = $request->modelo . " " . $request->motor;
    // return $chip;

    Marcas_autos::create($chip);
    return redirect()->route('chiptuning.index')->with('success', 'Chiptuning created');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return ('muestro tuning ' . $id);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $chip = Marcas_autos::where('id', $id)->first();
    $marcaSlc = Marcas_images_autos::where('marca', $chip->marca)->first();
    $marcas = Marcas_images_autos::all();
    // echo $chip->marca;
    // echo $marcaSlc->id; 
    // echo $marcaSlc->marca;
    // dd($id, $chip, $marcaSlc, $marcas);

    return view("pages.editChip", ['marcas' => $marcas, 'chip' => $chip, 'marcaSlc' => $marcaSlc]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Marcas_autos $chiptuning)
  {
    $chip = $request->all();
    if ($img_st1 = $request->file('img_st1')) {
      $rutaGuardarImg = 'black/img/Graficos_Banco_Pruebas/';
      $imagenChip1 = date('YmdHis') . $request->marca . "-" . $request->modelo . "-" . $request->motor . "." . $img_st1->getClientOriginalExtension();
      $img_st1->move($rutaGuardarImg, $imagenChip1);
      $chip['img_st1'] = "$imagenChip1";
    }

    if ($img_st2 = $request->file('img_st2')) {
      $rutaGuardarImg = 'black/img/Graficos_Banco_Pruebas/';
      $imagenChip2 = date('YmdHis') . $request->marca . "-" . $request->modelo . "-" . $request->motor . "." . $img_st2->getClientOriginalExtension();
      $img_st2->move($rutaGuardarImg, $imagenChip2);
      $chip['img_st2'] = "$imagenChip2";
    }

    if ($img_st3 = $request->file('img_st3')) {
      $rutaGuardarImg = 'black/img/Graficos_Banco_Pruebas/';
      $imagenChip3 = date('YmdHis') . $request->marca . "-" . $request->modelo . "-" . $request->motor . "." . $img_st3->getClientOriginalExtension();
      $img_st3->move($rutaGuardarImg, $imagenChip3);
      $chip['img_st3'] = "$imagenChip3";
    }

    $chip['modelo_motor'] = $request->modelo . " " . $request->motor;
    // return $chip;

    $chiptuning->update($chip);
    return redirect()->route('chiptuning.index')->with('success', 'Chiptuning created');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Marcas_autos $chiptuning)
  {
    $chiptuning->delete();
    return redirect()->route('chiptuning.index')->with('danger', 'chiptuning deleted');
  }
}
