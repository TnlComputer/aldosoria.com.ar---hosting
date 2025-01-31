@extends('layouts.app', ['page' => __('Dashboard Cursos'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="card col-md-12">
  <div class="m-3">
    <span class="m-3">
      <a href="{{ route('cursos.create') }}" class="btn">NUEVO CURSO</a>
    </span>
  </div>
  {{-- </div> --}}
  <div class="row mx-2 justify-content-center  text-center">
    <div class="col-md-12 mt-3">
      <table>
        <tr>
          <td class="text-center bg-light">
          </td>
          <td class="text-center bg-light"></td>
          <td class="text-left bg-light"><strong>T&iacute;tulo</strong></td>
          <td class="text-left bg-light"><strong>SubT&iacute;tulo</strong></td>
          <td class="text-center bg-light"><strong>Videos</strong></td>
          <td class="text-center bg-light"><strong>Imagen</strong></td>
          <td class="text-left bg-light"><strong>Video de Muestra</strong></td>
          <td class="text-center bg-light"><strong>$</strong></td>
          <td class="text-center bg-light"><strong>Costo</strong></td>
          <td class="text-center bg-light"></td>
        </tr>
        @foreach ($cursos as $curso)
        <tr class=" text-light small">
          <td class=" text-center">
            <form action="{{ route('cursos.edit', $curso->id) }}" method="get" enctype="multipart/form-data">
              @csrf
              <input class=" align-middle" type="image" src="{{ asset('black/img/reply.gif') }}" alt="Editar {{ $curso->id }}" title="Editar {{ $curso->id }}" />
            </form>
          </td>
          <td>
            <form action="{{ route('temario.show', $curso->id) }}" method="get" enctype="multipart/form-data">
              @csrf
              <input class=" align-middle" type="image" src="{{ asset('black/img/magnifyingglass.gif') }}" alt="Editar" alt="{{ $curso->id }}" title="Temario Curso {{ $curso->id }}" />
            </form>
          </td>
          <td class="text-left">{{ $curso->name }}</td>
          <td class="text-left">{{ $curso->title }}</td>
          <td class="text-center">{{ $curso->videos_curso_cantidad }}</td>
          <td class="col-1"><img src="{{ asset('img/cursos/' . $curso->image_curso) }}" alt="{{ $curso->image_curso }}">
          </td>
          <td class="text-left">{{ $curso->video_demo_Uri }}</td>
          <td class="text-center">{{ $curso->simbolo }}</td>
          <td class="text-center"> {{ $curso->coast }}</td>
          <td class="text-center">
            <form action="{{ route('cursos.destroy', $curso->id) }}" method="post" class="formEliminar">
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
  <div class="px-4 py-4">
    {{ $cursos->links() }}
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
            title: '¿Confirma la eliminación del curso?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#20c997',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Confirmar'
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
              Swal.fire('¡Eliminado!', 'El curso ha sido eliminado exitosamente.', 'success');
            }
          })
        }, false)
      })
  })()
</script>
@endsection