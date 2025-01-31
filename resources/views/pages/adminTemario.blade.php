@extends('layouts.app', ['page' => __('Dashboard - Curso - Temario'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="card col-md-12">
  <div class="row col-md-12 my-3">
    <span class="mx-3">
      <a href="{{ route('cursos.index') }}" class="btn ">volver a Cursos</a>
    </span>
    <span class="mx-3">
      <form action="{{ route('temario.create') }}" method="get" enctype="multipart/form-data">
        @csrf
        <button class="btn align-middle" type="submit">NUEVO TEMA CURSO </button>
      </form>
    </span>
  </div>
  <div class="mx-4">
    <h1>{{ $datosCurso->name}} {{ $datosCurso->title}} </h1>
  </div>
  @if (count($temarios) > 0)
  <div class="row mx-2 justify-content-center  text-center">
    <div class="col-md-12 mt-3">
      <table>
        <tr>
          <td class="text-center bg-light"></td>
          <td class="text-center bg-light"><strong>Descripción</strong></td>
          <td class="text-center bg-light"><strong>Url</strong></td>
          <td class="text-left bg-light"><strong>Imagen</strong></td>
          <td class="text-center bg-light"><strong>Tipo</strong></td>
          <td class="text-center bg-light"><strong>Archivo</strong></td>
          <td class="text-center bg-light"><strong>Archivo</strong></td>
          <td class="text-center bg-light"></td>
        </tr>
        @foreach ($temarios as $temario)
        <tr class=" text-light ">
          <td class=" text-center">
            <form action="{{ route('temario.edit', $temario->id) }}" method="get" enctype="multipart/form-data">
              @csrf
              <input class=" align-middle" type="image" src="{{ asset('black/img/reply.gif') }}" alt="Editar" title="Editar {{ $temario->id }}" alt="{{ $temario->id }}" />
            </form>
          </td>
          <td class="text-left">{{ $temario->descripcion }}</td>
          <td class="text-left">{{ $temario->uri_video }}</td>
          <td class="col-1"><img src="{{ asset('img/cursos/' . $temario->image_video) }}" alt="">
          </td>
          <td class="text-left">{{ $temario->tipo_curso}}</td>
          <td class="text-center">{{ $temario->archivo1_curso }}</td>
          <td class="text-center">{{ $curso->archivo2_curso }}</td>
          <td class="text-center">
            <form action="{{ route('temario.destroy', $temario->id) }}" method="post" class="formEliminar">
              @csrf
              @method('DELETE')
              <input class=" align-middle" type="image" src="{{ asset('black/img/borrar.gif') }}" alt="borrar" title="Borrar {{ $curso->id }}" />
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
  @else
  <div>
    <p class="m-5 text-white">El curso no dispone de temario</p>
  </div>
  @endif
  <div class="px-4 py-4">
    {{-- {{ $cursos->links() }} --}}
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
            title: '¿Confirma la eliminación del punto ?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#20c997',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Confirmar'
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
              Swal.fire('¡Eliminado!', 'El punto ha sido eliminado exitosamente.', 'success');
            }
          })
        }, false)
      })
  })()
</script>
@endsection