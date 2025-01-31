<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOfertaController extends Controller
{
  public function index()
  {
    $oferta = Oferta::first();
    return view('pages.adminOferta', ['oferta' => $oferta]);
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
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Oferta $oferta)
  {
    //  dd($oferta);
    // File::delete(oferta.jpg);
    $ofer = $request->all();

    if ($imagen = $request->file('imagen')) {
      // dd($foto);
      $delFoto = '/public/img/Ofertas/oferta.jpg';
      Storage::delete($delFoto);
      $rutaGuardarImg = 'img/Ofertas/';
      // $imagenOferta = 'oferta' . "." . $imagen->getClientOriginalExtension();
      $imagenOferta = 'oferta.jpg';
      $imagen->move($rutaGuardarImg, $imagenOferta);
      $ofer['oferta'] = "$imagenOferta";
      // $ofer['oferta'] = "oferta.jpg";
    } else {
      unset($ofer['oferta']);
    }

    $oferta->update($ofer);

    // return $delFoto;
    return redirect()->route('dashboard')->with('success', 'Oferta updated');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
