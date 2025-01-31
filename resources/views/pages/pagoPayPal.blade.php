@extends('layouts.app', ['page' => __('PayPal'), 'pageSlug' => 'cursos'])

@section('content')

<div class="card-body m-sm-none m-md-5">
  <div class="chart-area">
    <div class="col-12 align-content-center">
      <div class="text-center">
        <h1 class="">¡ Paso final !</h1>
        <hr class="m-2">
        <p class=""> Estás a punto de pagar con Paypal la cantidad de:

        <h4 class="importe">€ {{ $datos['unit_price'] }}</h4>
        </p>
        <div class="col-6 m-auto">
          <div id="paypal-button-container" class="align-center w-100"></div>
          <p>Los productos podrán ser vistos una vez que se procese el pago<br>
            <strong>(Para aclaraciones: aldosoria@gmail.com)</strong>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=EUR">
</script>
<script>
  var datos = @json($datos);

    // Configurar botón de PayPal con los datos
    paypal.Buttons({
        fundingSource: paypal.FUNDING.PAYPAL,
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{ $datos['unit_price'] }}'
                    }
                }],
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Procesar el pago en el servidor
                return $.ajax({
                    url: '{{ route("paypal.process") }}',
                    method: 'POST',
                    data: {
                        orderID: data.orderID,
                        payerID: data.payerID,
                        datos: datos,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // alert('Pago procesado correctamente');
                        window.location.href = '{{ route("thanks") }}';
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // alert('Error al procesar el pago');
                        window.location.href = '{{ route("failure") }}';
                    }
                });
            });
        }
    }).render('#paypal-button-container');
</script>

@endsection