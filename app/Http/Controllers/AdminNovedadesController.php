<?php

namespace App\Http\Controllers;

use App\Models\Novedad;
use Illuminate\Http\Request;

class AdminNovedadesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $novedades = Novedad::orderBy('fecha', 'desc')->paginate(12);
    return view("pages.adminNovedades", ['novedades' => $novedades]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("pages.newNovedad");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $novedad = $request->all();
    Novedad::create($novedad);

    return redirect()->route('novedad.index')->with('success', 'Novedad Successfully Added');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return ("novedad nuestro" . $id);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $novedad = Novedad::find($id);
    return view('pages.editNovedad', ['novedad' => $novedad]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Novedad $novedad)
  {
    $nove = $request->all();

    $novedad->update($nove);

    // return $novedad;
    return redirect()->route('novedad.index')->with('success', 'Novedad updated');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Novedad $novedad)
  {
    $novedad->delete();
    return redirect()->route('novedad.index')->with('danger', 'Novedad deleted');
  }
}
