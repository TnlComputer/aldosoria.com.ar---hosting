<?php

namespace App\Http\Controllers;

use App\Models\Novelty;
use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoveltyController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $novedades = DB::table('novedades')
      ->orderBy('fecha', 'desc')
      ->paginate(6);
    // $novedades = Novedad::paginate(10)->sortByDesc('fecha');
    $ofertas = Oferta::all();
    // $novedades = Novedad::all()->sortByDesc('fecha');

    return view('pages.novedades', ['novedades' => $novedades, 'ofertas' => $ofertas]);
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
  public function show(Novelty $novelty)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Novelty $novelty)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Novelty $novelty)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Novelty $novelty)
  {
    //
  }
}
