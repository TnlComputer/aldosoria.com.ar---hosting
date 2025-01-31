<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonedaRequest;
use App\Models\Moneda;
use App\Models\Pais;
use Illuminate\Http\Request;

class AdminMonedaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $monedas = Moneda::All();
    return view('pages.adminMoneda', ['monedas' => $monedas]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    // return 'Crear alta moneda';
    return view('pages.newMoneda');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(MonedaRequest $request)
  {
    $money = $request->all();
    Moneda::create($money);

    return redirect()->route('monedas.index')->with('success', 'Moneda Successfully Added');
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
    $moneda = Moneda::find($id);
    return view('pages.editMoneda', ['moneda' => $moneda]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Moneda $moneda)
  {
    $money = $request->all();
    // dd($money, $moneda);
    $moneda->update($money);

    return redirect()->route('monedas.index')->with('success', 'Moneda updated');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Moneda $moneda)
  {
    $moneda->delete();
    return redirect()->route('monedas.index')->with('danger', 'Moneda deleted');
  }
}
