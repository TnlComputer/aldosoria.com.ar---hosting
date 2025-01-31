@extends('layouts.app', ['page' => __('Dashboard Chiptuning'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="card col-md-12">
  <div class="m-3">
    <span class="m-3">
      <a href="{{ route('chiptuning.create') }}" class="btn">NUEVO TUNING</a>
    </span>
  </div>
  {{--
</div> --}}
<div class="row mx-2 justify-content-center  text-center">
  <div class="col-md-12 mt-3">
    <table class="w-100">
      <tr>
        {{-- <td class="text-center bg-light"> </td> --}}
        <td class="text-center bg-light"></td>
        <td class="text-left bg-light"><strong>Marca</strong></td>
        <td class="text-left bg-light"><strong>Modelo</strong></td>
        <td class="text-center bg-light"><strong>Año</strong></td>
        <td class="text-center bg-light"><strong>motor</strong></td>
        <td class="text-left bg-light"><strong>ecu</strong></td>
        <td class="text-center bg-light"><strong>combustible</strong></td>
        <td class="text-center bg-light"><strong>transmisión</strong></td>
        <td class="text-center bg-light"><strong>pot.Ori</strong></td>
        <td class="text-center bg-light"><strong>tor.Ori</strong></td>
        <td class="text-center bg-light"></td>
      </tr>
      @foreach ($chips as $chip)
      <tr class=" text-light small">
        <td class=" text-center">
          <form action="{{ route('chiptuning.edit', $chip->id) }}" method="get" enctype="multipart/form-data">
            @csrf
            <input class=" align-middle" type="image" src="{{ asset('black/img/reply.gif') }}"
              alt="Editar {{ $chip->id }}" title="Editar {{ $chip->id }}" />
          </form>
        </td>
        {{-- <td>
          <form action="{{ route('chiptuning.show', $chip->id) }}" method="get" enctype="multipart/form-data">
            @csrf
            <input class=" align-middle" type="image" src="{{ asset('black/img/magnifyingglass.gif') }}" alt="Editar"
              alt="{{ $chip->id }}" title="chip {{ $chip->id }}" />
          </form>
        </td> --}}
        <td class="text-left">{{ $chip->marca }}</td>
        <td class="text-left">{{ $chip->modelo }}</td>
        <td class="text-center">{{ $chip->anio }}</td>
        <td class="text-center">{{ $chip->motor }}</td>
        <td class="text-center"> {{ $chip->ecu }}</td>
        <td class="text-center"> {{ $chip->combustible }}</td>
        <td class="text-center"> {{ $chip->transmicion }}</td>
        <td class="text-center"> {{ $chip->potencia_original }}</td>
        <td class="text-center"> {{ $chip->torque_original }}</td>
        <td class="text-center">
          <form action="{{ route('chiptuning.destroy', $chip->id) }}" method="post" class="formEliminar">
            @csrf
            @method('DELETE')
            <input class=" align-middle" type="image" src="{{ asset('black/img/borrar.gif') }}" alt="borrar"
              title="Borrar {{ $chip->id }}" />
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<div class="px-4 py-4">
  {{ $chips->links() }}
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
            title: '¿Confirma la eliminación del Tuning?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#20c997',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Confirmar'
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
              Swal.fire('¡Eliminado!', 'El tuning ha sido eliminado exitosamente.', 'success');
            }
          })
        }, false)
      })
  })()
</script>
@endsection