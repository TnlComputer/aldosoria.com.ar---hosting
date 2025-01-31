@extends('layouts.app', ['page' => __('Dashboard Marcas'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="card col-md-12">
  <div class="m-3">
    <span class="m-3">
      <a href="{{ route('marcas.create') }}" class="btn">NUEVA MARCA</a>
    </span>
  </div>
  {{--
</div> --}}
<div class="row mx-2 justify-content-center  text-center">
  <div class="col-md-12 mt-3">
    <table>
      <tr>
        <td class="text-center bg-light"> </td>
        <td class="text-center bg-light"> </td>
        <td class="text-left bg-light"><strong>Marca</strong></td>
        <td class="text-center bg-light"><strong>Imagen</strong></td>
        <td class="text-center bg-light"></td>
      </tr>
      @foreach ($marcas as $marca)
      <tr class=" text-light small">
        <td class=" text-center">
          <form action="{{ route('marcas.edit', $marca->id) }}" method="get" enctype="multipart/form-data">
            @csrf
            <input class=" align-middle" type="image" src="{{ asset('black/img/reply.gif') }}"
              alt="Editar {{ $marca->id }}" title="Editar {{ $marca->id }}" />
          </form>
        </td>
        <td>
          <form action="{{ route('marcas.show', $marca->id) }}" method="get" enctype="multipart/form-data">
            @csrf
            <input class=" align-middle" type="image" src="{{ asset('black/img/magnifyingglass.gif') }}" alt="Editar"
              alt="{{ $marca->id }}" title="marca {{ $marca->id }}" />
          </form>
        </td>
        <td class="text-left">{{ $marca->marca }}</td>
        <td class="text-left"><img src="{{ asset('black/img/Marcas/' . $marca->foto ) }}"
            alt="imagen {{ $marca->marca}}">
        </td>
        <td class="text-center">
          <form action="{{ route('marcas.destroy', $marca->id) }}" method="post" class="formEliminar">
            @csrf
            @method('DELETE')
            <input class=" align-middle" type="image" src="{{ asset('black/img/borrar.gif') }}" alt="borrar"
              title="Borrar {{ $marca->id }}" />
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<div class="px-4 py-4">
  {{ $marcas->links() }}
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
            title: '¿Confirma la eliminación de esta marca?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#20c997',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Confirmar'
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
              Swal.fire('¡Eliminado!', 'La marca ha sido eliminado exitosamente.', 'success');
            }
          })
        }, false)
      })
  })()
</script>
@endsection