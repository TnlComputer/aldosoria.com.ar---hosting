<?php

namespace App\Http\Controllers;

use App\Models\Marcas_images_autos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMarcasController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $marcasLogos = Marcas_images_autos::orderBy('marca', 'ASC')->paginate(12);
    return view("pages.adminMarcas", ['marcas' => $marcasLogos]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("pages.newMarcas");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $marca = $request->all();
    if ($imagen = $request->file('imagen')) {
      $rutaGuardarImg = 'black/img/Marcas/';
      $imagenMarca = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
      $imagen->move($rutaGuardarImg, $imagenMarca);
      $marca['foto'] = "$imagenMarca";
    }
    $newMarca = ([
      'marca' => $marca['marca'],
      'foto' => $marca['foto']
    ]);

    // dd($newMarca);
    Marcas_images_autos::create($newMarca);

    // return $delFoto;
    return redirect()->route('marcas.index')->with('success', 'Marca created');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return ('marca a mostrar los modelos existentes ' . $id);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    // dd($id);
    $marca = Marcas_images_autos::where('id', $id)->first();
    return view("pages.editMarcas", ['marca' => $marca]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Marcas_images_autos $marca)
  {

    $updMarc = $request->all();

    $logo = Marcas_images_autos::find($marca->id);
    $old_image = $logo->foto;
    // dd($logo, $old_image);


    if ($imagen = $request->file('imagen')) {
      $rutaGuardarImg = 'black/img/Marcas/';
      $imagenMarca = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
      $imagen->move($rutaGuardarImg, $imagenMarca);
      $updMarc['foto'] = "$imagenMarca";
    } else {
      $updMarc['foto'] = $old_image;
    }

    $updMarca = ([
      'marca' => $updMarc['marca'],
      'foto' => $updMarc['foto'],
    ]);

    // dd($updMarca);
    $marca->update($updMarca);

    return redirect()->route('marcas.index')->with('success', 'Marca updated');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Marcas_images_autos $marca)
  {
    $marca->delete();
    return redirect()->route('marcas.index')->with('danger', 'Mrca deleted');
  }
}
