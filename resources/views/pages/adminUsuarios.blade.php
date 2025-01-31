@extends('layouts.app', ['page' => __('Dashboard Usuarios'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="card">
  <div class="m-3">
    <span class="m-3">
      <a href="{{ route('usuarios.create') }}" class="btn">NUEVO USUARIO</a>
    </span>
  </div>
  <div class="row mx-2 justify-content-center  text-center">
    <div class="col-md-12 mt-3">
      <table class="col-md-12">
        <tr>
          <td class="text-center bg-light" 12px">
          </td>
          <td class="text-center bg-light"></td>
          <td class="text-left bg-light"><strong>Nombre</strong></td>
          <td class="text-left bg-light"><strong>Apellido</strong></td>
          <td class="text-left bg-light"><strong>Teléfono</strong></td>
          <td class="text-left bg-light"><strong>Whatsapp</strong></td>
          <td class="text-left bg-light"><strong>Telegram</strong></td>
          <td class="text-left bg-light"><strong>País</strong></td>
          {{-- <td class="text-left bg-light"><strong>Role</strong></td> --}}
          <td class="text-left bg-light"><strong>Email</strong></td>
          <td class="text-center bg-light"></td>
        </tr>
        @foreach ($usuarios as $usuario)
        <tr class="text-light small">
          <td class=" text-center">
            <form action="{{ route('usuarios.edit', $usuario->id) }}" method="get" enctype="multipart/form-data">
              @csrf
              <input class=" align-middle" type="image" src="{{ asset('black/img/reply.gif') }}" alt="Editar"
                title="Editar {{ $usuario->id }}" alt="{{ $usuario->id }}" />
            </form>
          </td>
          <td class="text-center"></td>
          <td class="text-left">{{ $usuario->name }}</td>
          <td class="text-left">{{ $usuario->last_name }}</td>
          <td class="text-left">{{ $usuario->phone }}</td>
          <td class="text-center">{{ $usuario->whatsapp }}</td>
          <td class="text-center">{{ $usuario->tlgram }}</td>
          <td class="text-center">{{ $usuario->pais_id }}</td>
          {{-- <td class="text-left">{{ $usuario->roles }}</td> --}}
          <td class="text-left">{{ $usuario->email }}</td>
          <td class="text-center">
            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post" enctype="multipart/form-data"
              class="formEliminar">
              @csrf
              @method('DELETE')
              <input class=" align-middle" type="image" src="{{ asset('black/img/borrar.gif') }}" alt="borrar"
                title="Borrar  {{ $usuario->id }}" />
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
  <div class="px-4 py-4">
    {{ $usuarios->links() }}
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
            title: '¿Confirma la eliminación del usuario?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#20c997',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Confirmar'
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
              Swal.fire('¡Eliminado!', 'El usuario ha sido eliminado exitosamente.', 'success');
            }
          })
        }, false)
      })
  })()
</script>
@endsection