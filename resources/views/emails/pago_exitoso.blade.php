<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Confirmación de Pago</title>
</head>

<body>
  <h2>¡Gracias por tu compra!</h2>

  <p>Has realizado un pago de <strong>€ {{ $datos['unit_price'] }}</strong>.</p>

  @if(isset($datos['curso']))
  <p>Curso adquirido: <strong>{{ $datos['curso'] }}</strong></p>
  @endif

  <p>Email del comprador: <strong>{{ $datos['cliente_email'] ?? 'No disponible' }}</strong></p>

  <p>Si tenés alguna duda, escribinos a <strong>aldosoria@gmail.com</strong></p>

  <br>
  <p>Saludos,<br>El equipo de la Academia</p>
</body>

</html>