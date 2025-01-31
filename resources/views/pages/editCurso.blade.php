@extends('layouts.app', ['page' => __('Dashboard - Cursos - Edit Curso'), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card text-center">
  <div class="row">
    <div class="col-md-12">
      <div>
        <h3>Edit Curso</h3>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" action="{{ route('cursos.update', $curso) }}" method="post" enctype="multipart/form-data" id="formulario">
            @csrf
            @method('patch')
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="name" :value="__('Titulo')" />
              <x-text-input type="text" name="name" id="name" required class="block mt-1 col-md-4" value="{{ $curso->name }}" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="title" :value="__('SubTitulo')" />
              <x-text-input type="text" name="title" id="title" required class="block mt-1 col-md-4" value="{{ $curso->title }}" required />
              <x-input-error :messages="$errors->get('title')" class="mt-2" />

            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="videos_curso_cantidad" :value="__('Cantidad Videos')" />
              <x-text-input type=" text" name="videos_curso_cantidad" id="videos_curso_cantidad" required class="block mt-1 col-md-4" value="{{ $curso->videos_curso_cantidad }}" />
              <x-input-error :messages="$errors->get('videos_curso_cantidad')" class="mt-2" />
            </div>
            <div class="grid grid-cols-1">
              <img src="{{ asset('img/cursos/' . $curso->image_curso) }}" width="150px" id="imagenSeleccionada">
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-2" for="imagen" :value="__('Imagen')" />
              <x-text-input type="file" name="imagen" id="imagen" accept="image/*" class="block mt-1 col-md-4" accept="image/*" value="{{ $curso->image_curso }}" />
              <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="video_demo_Uri" :value=" __('Video de Muestra')" />
              <x-text-input type="text" name="video_demo_Uri" id="video_demo_Uri" class="block mt-1 col-md-4" value="{{ $curso->video_demo_Uri }}" />
              <x-input-error :messages="$errors->get('video_demo_Uri')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="moneda_id" :value="__('Moneda')" />
              <select name="moneda_id" id="moneda_id" required class="block mt-1 col-md-4">
                <option value="{{ $curso->moneda_id }}">{{ $simbolo->simbolo }}</option>
                @foreach ($monedas as $moneda)
                <option value="{{ $moneda->id }}">{{ $moneda->simbolo }}</option>
                @endforeach
              </select>
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="coast" :value="('Costo')" />
              <x-text-input type="text" name="coast" id="coast" placeholder="costo -1 sale Proximamente " required autofocus class="block mt-1 col-md-4" autocomplete="coast" value=" {{ $curso->coast }}" />
              <x-input-error :messages="$errors->get('coast')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="tipo_curso_id" :value="('Tipo de Curso')" />
              <select name="tipo_curso_id" id="tipo_curso_id" required class="block mt-1 col-md-4">
                <option value="{{ $curso->tipo_curso_id }}">
                  @if ($curso->tipo_curso_id == 1)
                  Curso con Videos
                  @else
                  Curso con Videos y Archivos
                  @endif
                </option>
                <option value="1">Curso con Videos</option>
                <option value="2">Curso con Videos y Archivos</option>
              </select>
            </div>

            <div class="my-4 text-center">
              <span>
                <a class="btn btn-outline-light btn-group-toggle mx-2" href="{{ route('cursos.index') }}">Volver</a>
              </span>
              <span>
                <button type="submit" class="btn btn-outline-light btn-group-toggle  mx-2">
                  Enviar
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function(e) {
    $('#imagen').change(function() {
      let reader = new FileReader();
      reader.onload = (e) => {
        $('#imagenSeleccionada').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    });

  });
</script>
@endsection