@extends('layouts.app', ['page' => __('Dashboard Novedades'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="card col-md-12">
  <div class="m-3">
    <span class="m-3">
      <a href="{{ route('novedad.create') }}" class="btn">NUEVA NOVEDAD</a>
    </span>
  </div>
  {{--
</div> --}}
<div class="row mx-2 justify-content-center  text-center">
  <div class="col-md-12 mt-3">
    <table class="w-100">
      <tr w-100>
        <td class="text-center bg-light w-1"></td>
        <td class="text-left bg-light w-12"><strong>Novedad</strong></td>
        <td class="text-left bg-light w-8"><strong>Fecha</strong></td>
        <td class="text-left bg-light w-16"><strong>URL</strong></td>
        <td class="text-center bg-light w-2"><strong>Origen</strong></td>
        <td class="text-center bg-light w-2"><strong>Tipo</strong></td>
        <td class="text-center bg-light"></td>
      </tr>
      @foreach ($novedades as $novedad)
      <tr class=" text-light small w-100">
        <td class=" text-center">
          <form action="{{ route('novedad.edit', $novedad->id) }}" method="get" enctype="multipart/form-data">
            @csrf
            <input class=" align-middle" type="image" src="{{ asset('black/img/reply.gif') }}"
              alt="Editar {{ $novedad->id }}" title="Editar {{ $novedad->id }}" />
          </form>
        </td>
        <td class="text-left w-12">{{ $novedad->novedades }}</td>
        <td class="text-left w-2">{{ $novedad->fecha }}</td>
        <td>
          <iframe class="" src="{{ $novedad->uri_novedad }}" width="150px" height="30px" frameborder="0"
            allowfullscreen></iframe>
        </td>
        <td class="text-center w-2">
          @if ($novedad->tipo_novedad == 1)
          Facebook
          @else
          Youtube
          @endif
        </td>
        <td class="text-center w-2">
          @if ($novedad->foto_novedad == 2)
          Foto
          @else
          Video
          @endif
        </td>
        <td class="text-center w-1">
          <form action="{{ route('novedad.destroy', $novedad->id) }}" method="post" class="formEliminar">
            @csrf
            @method('DELETE')
            <input class=" align-middle" type="image" src="{{ asset('black/img/borrar.gif') }}" alt="borrar"
              title="Borrar" />
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<div class="px-4 py-4">
  {{ $novedades->links() }}
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
            title: '¿Confirma la eliminación de la novedad?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#20c997',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Confirmar'
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
              Swal.fire('¡Eliminado!', 'La Novedad ha sido eliminado exitosamente.', 'success');
            }
          })
        }, false)
      })
  })()
</script>
@endsection