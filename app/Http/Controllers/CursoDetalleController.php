<?php

namespace App\Http\Controllers;

use App\Http\Requests\pagosRequest;
use App\Models\Curso;
use App\Models\CursoVideoUri;
use App\Models\Moneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;


class CursoDetalleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  public function pago(Request $request)
  {

    $euro = Moneda::where('moneda', '=', 'EUR')->first();
    $metodoPagos = $request->metodoPago;
    $coast = $request->coast;
    $priceARS = $coast * $euro->cambio;
    $curso_id = $request->curso_id;
    $dataCurso = Curso::find($curso_id);
    $descriptionN = $dataCurso->name;
    $descriptionT = $dataCurso->title;

    $datos = [
      'curso_id' => $dataCurso->id,
      'user_id' => Auth::user()->id,
      'unit_price' => $coast,
      'price' => $priceARS,
      'description_name' => $descriptionN,
      'description_title' => $descriptionT,
    ];

    if ($metodoPagos == 'pa') {
      // dd($data);
      return view('/pages.pagoPayPal', ['datos' => $datos]);
    }

    if ($metodoPagos == 'mp') {

      return view('/pages.pagoMercadoPago', ['datos' => $datos]);
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(pagosRequest $request)
  {
    //
    // TODO: aca van los pagos
    // $aQuienPago = $request;
    // $user = Auth::user()->roles == 'ROLE_USER';
    // dd($request);
    return view('Hola!!! Estoy en el store de los detalles del cursos ');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $datosCurso = Curso::where('id', $id)->first();
    $temarios = CursoVideoUri::where('video_curso_id', $id)->orderBy('nro_video_id', 'ASC')->get();
    $moneda = Moneda::where('id', '=', $datosCurso->moneda_id)->first();
    return view('pages.cursoDetalle', ['temarios' => $temarios, 'curso' => $datosCurso, 'moneda' => $moneda]);
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
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
