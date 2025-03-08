@extends('layouts.app', ['page' => __('Mercado Pago'), 'pageSlug' => 'cursos'])

@section('content')
<script src="https://sdk.mercadopago.com/js/v2"></script>

<div class="card-body m-sm-none m-md-5">
  <div class="chart-area">
    <div class="col-12 align-content-center">
      <div class="text-center">
        <h1 class="">¡Paso final!</h1>
        <hr class="m-2">
        <p>Estás a punto de pagar con Mercado Pago la cantidad de:</p>
        <h4 class="importe">{{ $datos['description_name'] }}</h4>
        <h4 class="importe">{{ $datos['description_title'] }}</h4>
        <h4 class="importe">$ {{ $datos['price'] }}</h4>
        <div class="col-8 m-auto">
          <div id="walletBrick_container"></div>
          <p>El video podrá ser visto una vez que se procese el pago.</p>
          <h5><strong>Cualquier duda, enviar un email a: aldosoria@gmail.com</strong></h5>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const mp = new MercadoPago('{{ config('services.mercadopago.public_key') }}', {
    locale: 'es-AR'
  });

  const bricksBuilder = mp.bricks();

  const renderWalletBrick = async (bricksBuilder) => {
    const settings = {
      initialization: {
        redirectMode: 'modal',
      },
      customization: {
        texts: {
          action: 'pay',
          valueProp: 'security_safety',
        },
        visual: {
          hideValueProp: false,
          buttonBackground: 'default', // default, black, blue, white
          valuePropColor: 'grey', // grey, white
          buttonHeight: '48px', // min 48px - max free
          borderRadius: '6px',
          verticalPadding: '16px', // min 16px - max free
          horizontalPadding: '0px', // min 0px - max free
        },
        checkout: {
          theme: {
            elementsColor: '#4287F5', // color hex code
            headerColor: '#4287F5', // color hex code
          },
        },
      },
      callbacks: {
        onReady: () => {
          // Callback called when Brick is ready.
        },
        onSubmit: (formData) => {
          const requestBody = {
            curso_id: {{ $datos['curso_id'] }},
            user_id: {{ $datos['user_id'] }},
            description_name: '{{ $datos['description_name'] }}',
            description_title: '{{ $datos['description_title'] }}',
            price: {{ $datos['price'] }},
          };

          return new Promise((resolve, reject) => {
            fetch('{{ route('mercadopago.payment.createPreference') }}', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
              },
              body: JSON.stringify(requestBody),
            })
            .then((response) => response.json())
            .then((response) => {
              resolve(response.preference_id);
            })
            .catch((error) => {
              reject(error);
            });
          });
        },
      },
    };

    window.walletBrickController = async () => {
      const bricks = await bricksBuilder.create(
        'wallet',
        'walletBrick_container',
        settings,
      );

      return bricks;
    };

    window.walletBrickController();
  };
  renderWalletBrick(bricksBuilder);
</script>
@endsection
