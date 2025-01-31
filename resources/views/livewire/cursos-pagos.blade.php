<div class="row m-0 col-12">
  <div class="col-md-12">
    <div class="justify-content-center ">
      <select wire:model.live="slcUsuario" class="form-select text-black letraMayuscula">
        <option value="">== Seleccione un usuario... ==</option>
        @foreach ($usuarios as $usuario)
        <option class="letraMayuscula" value="{{ $usuario->id }}">{{ $usuario->last_name }}, {{ $usuario->name }}
        </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-12 justify-content-center text-center">
    <div wire:model.live="slcCursosPagos">
      @if ($cursosPagos->count() > 0)
      <div class=" my-4 text-white ">
        <h3 class="">Cursos Pagos del Usuario</h3>
      </div>
      <div>
        <table class="col-md-12 ">
          <tr>
            <td class="text-center bg-light"> </td>
            <td class="text-center bg-light"><strong>FECHA</strong></td>
            <td class="text-center bg-light"><strong>VTO</strong></td>
            <td class="text-left bg-light"><strong>CURSO</strong></td>
            <td class="text-left bg-light"><strong>TITULO</strong></td>
            <td class="text-center bg-light"><strong>METODO</strong></td>
            <td class="text-center bg-light"><strong>PAYMENT</strong></td>
            <td class="text-center bg-light"><strong>ORDER_ID</strong></td>
            {{-- <td class="text-center bg-light"><strong></strong></td> --}}
            <td colspan="2" class="text-center bg-light"><strong>IMPORTE</strong></td>
            <td class="text-center bg-light"><strong>EST.</strong></td>
          </tr>
          @foreach ($cursosPagos as $curso)
          <tr class="text-light small">
            <td class=" text-center">
              <form action="{{ route('pagos.edit', $curso->curso_usuario_id) }}" method="get"
                enctype="multipart/form-data">
                @csrf
                <input class=" align-middle" type="image" src="{{ asset('black/img/reply.gif') }}" alt="Editar"
                  title="Editar {{ $curso->curso_usuario_id }}" alt="{{ $curso->curso_usuario_id }}" />
              </form>
            </td>
            <td class="text-center">{{ \Carbon\Carbon::parse($curso->fecha_inscripcion)->format('d-m-Y') }}</td>
            <td class="text-center">
              @if ($curso->vto_curso)
              {{ \Carbon\Carbon::parse($curso->vto_curso)->format('d-m-Y') }}
              @endif
            </td>
            <td class="text-left letraMayuscula">{{ $curso->nombre_curso }}</td>
            <td class="text-left letraMayuscula">{{ $curso->titulo_curso }}</td>
            <td class="text-center">
              @if ($curso->forma_pago_curso == 0)
              Gratis
              @elseIf ($curso->forma_pago_curso == 1)
              Efectivo
              @elseIf ($curso->forma_pago_curso == 2)
              Transferencia
              @elseIf ($curso->forma_pago_curso == 3)
              PayPal
              @elseIf ($curso->forma_pago_curso == 4)
              MercadoPago
              @endif
            </td>
            <td class="text-center">{{ $curso->payment_id }}</td>
            <td class="text-center">{{ $curso->orderId }}</td>
            <td class="text-center">{{ $curso->currency }}
            <td class="text-center">{{ $curso->amount }}</td>
            <td class="text-center">{{ $curso->pago_curso }}</td>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
  @endif
</div>
</div>
</div>