<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\CursoPago;
use App\Models\CursoUsuario;
use App\Models\Moneda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Resources\Preference;
use MercadoPago\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\alert;

class MercadoPagoController extends Controller
{
  public function index()
  {
    return view('payment');
  }

  public function createPreference(Request $request)
  {
    try {
      MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));

      $client = new PreferenceClient();
      /** @var Preference $preference */

      $preference = $client->create([
        "external_reference" => $request->curso_id,
        "items" => [
          [
            "curso_id" => $request->curso_id,
            "title" => $request->description_name,
            "description" => $request->description_title,
            "quantity" => 1,
            "unit_price" => $request->price,
          ],
        ],
        "purpose" => 'wallet_purchase',
        "back_urls" => [
          "success" => route('mercadopago.success'),
          "failure" => route('mercadopago.failure'),
          "pending" => route('mercadopago.pending'),
        ],
      ]);
      return response()->json(['preference_id' => $preference->id], 200);
    } catch (\Exception $e) {
      // Loguear el error
      Log::error('Error al crear la preferencia de Mercado Pago: ' . $e->getMessage());

      // Devolver una respuesta de error
      return response()->json(['error' => 'Error al crear la preferencia de Mercado Pago'], 500);
    }
  }

  public function makePutRequest(Request $request)
  {
    $csrfToken = csrf_token();
    $apiKey = config('services.mercadopago.api_key');
    $idempotencyKey = uniqid();
    $paymentId = $request->input('payment_id');

    $url = 'https://www.mercadopago.com.ar/checkout/v1/payment/api/flow/' . $paymentId;

    $response = Http::withHeaders([
      'Content-Type' => 'application/json',
      'X-CSRF-TOKEN' => $csrfToken,
      'X-Idempotency-Key' => $idempotencyKey,
      'Authorization' => 'Bearer ' . $apiKey,
      'Referer' => 'https://www.mercadopago.com.ar',
      'Origin' => 'https://www.mercadopago.com.ar',
    ])->put($url);

    return $response->json();
  }

  public function webhook(Request $request)
  {
    try {
      $data = $request->all();

      // $response = await fetch('https://api.mercadopago.com/v1/payments/'.{{$data->paymentId}}, {
      //   method: 'GET'
      //   headers: {
      //     'Authorization' => 'Bearer ' . ${}
      //   }
      // })

      Log::info('Webhook recibido: ', $data);
      // $payload = $request->all();
      // $this->verifyWebhookSignature($request);


      // Procesar la notificación recibida
      // $paymentId = $data['data']['id'];
      // $paymentStatus = $data['type'];
      // dd('webhook ', $request, $paymentId, $paymentStatus);

      // Obtener los datos externos
      // $externalReference = $payload['data']['external_reference'];
      // $customData = $payload['data']['metadata']['custom_data'];

      return response()->json(['message' => 'Webhook recibido'], 200);
    } catch (\Exception $e) {
      // Log::error('Error en el webhook de Mercado Pago: ' . $e->getMessage());
      return response()->json(['error' => 'Error en el webhook de Mercado Pago'], 500);
    }
  }

  public function success(Request $request)
  {

    // dd($request->all());

    // Obtener y procesar los datos del pago aprobado
    $paymentId = $request->input('payment_id');
    // $paymentStatus = $request->input('status');
    $orderId = $request->input('merchant_order_id');
    $cursoId = $request->input('external_reference');
    $userId = Auth::user()->id;

    // $datosCurso = Curso::where('id', $cursoId)->first();
    $datosCurso = Curso::find($cursoId);
    // $euro = Moneda::where('moneda', '=', 'EUR')->first();
    $euro = Moneda::where('moneda', 'EUR')->first();
    $descriptionN = $datosCurso->name;
    $descriptionT = $datosCurso->title;
    // $priceARS = $datosCurso->coast * $euro->cambio;
    $priceARS = is_numeric($datosCurso->coast) ? ($datosCurso->coast * $euro->cambio) : 0;

    // $date = Carbon::now();
    // $date->toDateString();
    // $fecha_vto = $date->addDay(15);

    $date = Carbon::now()->toDateString();
    $fecha_vto = Carbon::now()->addDays(15); // Corregido `addDays(15)`

    // Guardar los datos 
    $cursoUsuario = new CursoUsuario();
    $cursoUsuario->curso_id = $cursoId;
    $cursoUsuario->user_curso_id = $userId;
    $cursoUsuario->nombre_curso = $descriptionN;
    $cursoUsuario->titulo_curso = $descriptionT;
    $cursoUsuario->forma_pago_curso = 4; // Ejemplo de forma de pago
    $cursoUsuario->payment_id = $paymentId;
    $cursoUsuario->orderId = $orderId;
    $cursoUsuario->pago_curso = 'P'; // 
    $cursoUsuario->amount = $priceARS;
    $cursoUsuario->currency = 'AR$'; // Pesos
    $cursoUsuario->fecha_inscripcion = $date; // fecha del dia del alta
    $cursoUsuario->save();

    // Guardar la inscripción del usuario en el curso
    // CursoUsuario::create([
    //   'curso_id' => $cursoId,
    //   'user_curso_id' => $userId,
    //   'nombre_curso' => $datosCurso->name,
    //   'titulo_curso' => $datosCurso->title,
    //   'forma_pago_curso' => 4, // Ejemplo de forma de pago 4 es MercadoPago
    //   'payment_id' => $paymentId,
    //   'orderId' => $orderId,
    //   'pago_curso' => 'P',
    //   'amount' => $priceARS,
    //   'currency' => 'ARG',
    //   'fecha_inscripcion' => $date,
    // ]);


    // $cursoPago = new CursoPago();
    // $cursoPago->user_curso_id  = $userId;
    // $cursoPago->video_curso_id = $cursoId;
    // $cursoPago->vto_curso = $fecha_vto;
    // $cursoPago->save();

    // Guardar el pago del curso
    CursoPago::create([
      'user_curso_id'  => $userId,
      'video_curso_id' => $cursoId,
      'vto_curso' => $fecha_vto
    ]);
    return view('pages.thanks');
  }

  public function failure(Request $request)
  {
    return view('pages.failure');
  }

  public function pending(Request $request)
  {
    return view('pages.pending');
  }
}