@extends('layouts.app', ['page' => __('Dashboard Pagos'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="card">
  <div class="m-3">
    <span class="mx-3">
      <a href="{{ route('pagos.index') }}" class="btn ">volver a Pagos</a>
    </span>
  </div>
  <div class="row mx-2 justify-content-center  text-center">
    <div class="col-md-12 mt-3">
      <table class="col-md-12">
        <tr>
          <td class="text-center bg-light" 12px">
          </td>
          <td class="text-left bg-light"><strong>usuario</strong></td>
          <td class="text-left bg-light"><strong>Curso</strong></td>
          <td class="text-left bg-light"><strong>Titulo</strong></td>
          <td class="text-left bg-light"><strong>T.Pag</strong></td>
          <td class="text-left bg-light"><strong>Comprado</strong></td>
          <td class="text-center bg-light"><strong>Vto</strong></td>
          <td class="text-center bg-light"><strong>Payment</strong></td>
          <td class="text-center bg-light"><strong>Order</strong></td>
          <td class="text-center bg-light"><strong>Moneda</strong></td>
          <td class="text-center bg-light"><strong>Importe</strong></td>
          <td class="text-center bg-light"><strong>Estado</strong></td>
          <!-- <td class="text-center bg-light"></td> -->
        </tr>
        @foreach ($cursosPagosUsuario as $cursoPagoUser)
        <tr class="text-light small">
          <td class=" text-center">
            <form action="{{ route('pagos.edit', $cursoPagoUser->user_curso_id) }}" method="get"
              enctype="multipart/form-data">
              @csrf
              <!-- <input class=" align-middle" type="image" src="{{ asset('black/img/reply.gif') }}" alt="Editar" title="Editar {{ $cursoPagoUser->user_curso_id }}" alt="{{ $cursoPagoUser->user_curso_id }}" /> -->
            </form>
          </td>
          <td class="text-left letraMayuscula">{{ $cursoPagoUser->user_last_name }} {{ $cursoPagoUser->user_name }}</td>
          </form>
          <td class="text-left letraMayuscula">{{ $cursoPagoUser->nombre_curso }}</td>
          <td class="text-left letraMayuscula">{{ $cursoPagoUser->titulo_curso }}</td>
          <td class="text-left">{{ $cursoPagoUser->forma_pago_curso }}</td>
          <td class="text-left">{{ $cursoPagoUser->fecha_inscripcion }}</td>
          <td class="text-left">{{ $cursoPagoUser->fecha_inscripcion }}</td>
          <td class="text-left">{{ $cursoPagoUser->pago_curso }}</td>
          <!-- <td class="text-center">
            <form action="{{ route('pagos.destroy', $cursoPagoUser->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <input name="" type="image" src="{{ asset('black/img/borrar.gif') }}" alt="borrar" align="absmiddle" title="Borrar {{ $cursoPagoUser->id }}" id="formEliminar" />
            </form> -->
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
  <div class="px-4 py-4">
    {{ $cursosPagosUsuario->links() }}
  </div>
</div>
<script>
  (function() {
    'use strict'
    //debemos crear la clase formEliminar dentro del form del boton borrar
    var forms = document.querySelectorAll('.formEliminar')
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          event.preventDefault()
          event.stopPropagation()
          Swal.fire({
            title: '¿Confirma la eliminación del pago?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#20c997',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Confirmar'
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
              Swal.fire('¡Eliminado!', 'El pago ha sido eliminado exitosamente.', 'success');
            }
          })
        }, false)
      })
  })()
</script>
@endsection