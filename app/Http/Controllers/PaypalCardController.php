<?php

namespace App\Http\Controllers;

use App\Models\CursoPago;
use App\Models\CursoUsuario;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PaypalCardController extends Controller
{
  public function process(Request $request)
  {
    // Obtener los datos del formulario
    $orderID = $request->input('orderID');
    $payerID = $request->input('payerID');
    $datos = $request->input('datos');

    // Verificar si $datos es una cadena JSON
    if (is_string($datos)) {
      // Decodificar los datos JSON
      $datos = json_decode($datos, true);
    }
    // Crear registro de pago

    $date = Carbon::now();
    $date->toDateString();
    $fecha_vto = $date->addDay(15);


    $cursoUser = new CursoUsuario();
    $cursoUser->curso_id = $datos['curso_id'];
    $cursoUser->user_curso_id = $datos['user_id'];
    $cursoUser->nombre_curso = $datos['description_name'];
    $cursoUser->titulo_curso = $datos['description_title'];
    $cursoUser->forma_pago_curso = 3; // 3= PayPal
    $cursoUser->payment_id = $payerID;
    $cursoUser->orderId = $orderID;
    $cursoUser->amount = $datos['unit_price'];
    $cursoUser->currency = 'EUR'; // EUR
    $cursoUser->fecha_inscripcion = $date; // fecha del dia del alta
    $cursoUser->pago_curso = 'P'; // 

    $cursoUser->save();

    $cursoPago = new CursoPago();
    $cursoPago->user_curso_id  = $datos['user_id'];
    $cursoPago->video_curso_id = $datos['curso_id'];
    $cursoPago->vto_curso = $fecha_vto;

    $cursoPago->save();

    // Retornar respuesta JSON
    return response()->json(['mensaje' => 'Pago procesado correctamente']);
  }
}
