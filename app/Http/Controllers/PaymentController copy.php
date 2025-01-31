<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// // use MercadoPago\Client\Common\RequestOptions;
// // use MercadoPago\Client\Payment\PaymentClient;
// use MercadoPago\Client\Preference\PreferenceClient;
// use MercadoPago\MercadoPagoConfig;
// // use MercadoPago\Exceptions\MPApiException;

// class PaymentController extends Controller
// {
//   public function index()
//   {

//     MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
//     return view('payment');
//   }

//   public function create(Request $request)
//   {
//     $client = new PreferenceClient();
//     $preference = $client->create([
//       "items" => array(
//         array(
//           "title" => "My product",
//           "quantity" => 1,
//           "unit_price" => 2000
//         )
//       ),
//       // Allow only logged payments. To allow guest payments you can delete omit this property
//       "purpose" => "wallet_purchase"
//     ]);
//   }
// }



// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Resources\Preference;
use MercadoPago\Payment;

class PaymentController extends Controller
{
  public function index()
  {
    return view('payment');
  }

  public function createPreference(Request $request)
  {
    MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));

    $client = new PreferenceClient();
    /** @var Preference $preference */
    $preference = $client->create([
      "items" => [
        [
          "id" => 1, //'YOUR_PRODUCT_ID',
          "title" => 'YOUR_PRODUCT_TITLE',
          "description" => 'YOUR_PRODUCT_DESCRIPTION',
          "quantity" => 1,
          "unit_price" => 10,
        ],
      ],
      "purpose" => 'wallet_purchase',
    ]);

    return response()->json(['preference_id' => $preference->id]);
  }

  // Método para procesar la notificación de Mercado Pago
  public function webhook(Request $request)
  {
    MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));

    dd($request);
    $payment = Payment::find_by_id($request->id);

    // Procesar el estado del pago
    $this->processPayment($payment);

    return response()->json(['status' => 'success']);
  }

  // Método para procesar el pago
  private function processPayment($payment)
  {
    // Aquí puedes implementar la lógica para actualizar el estado del pago en tu sistema
    // Por ejemplo:
    if ($payment->status === 'approved') {
      // Pago aprobado, actualizar estado en tu sistema
      // $payment->external_reference contiene el identificador de la transacción que enviaste
      // a MercadoPago en el momento de crear la preferencia
      $transactionId = $payment->external_reference;

      // Actualizar estado de la orden o realizar otras acciones necesarias
    } elseif ($payment->status === 'pending') {
      // Pago pendiente, puedes realizar alguna acción
    } elseif ($payment->status === 'failure') {
      // Pago fallido, puedes realizar alguna acción
    }
  }
}
