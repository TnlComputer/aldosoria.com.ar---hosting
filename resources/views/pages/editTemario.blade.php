@extends('layouts.app', ['page' => __('Dashboard - Usuario - Edit '), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card text-center">
  <div class="row">
    <div class="col-md-12 mt-3">
      <div>
        <h3>Edit Temario</h3>
      </div>
      <form class="" action="{{ route('temario.update', $temario) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <input type="hidden" name="video_curso_id" value="{{ $datosCurso->id}}" />
        <div>
          <x-input-label class="mt-1 col-md-2" for="nombre_curso" :value="__('Título')" />
          <x-text-input id="nombre_curso" class="block mt-1 col-md-4" type="text" name="nombre_curso" value="{{ $datosCurso->name}}"
            readonly autofocus autocomplete="nombre_curso" />
          <x-input-error :messages="$errors->get('nombre_curso')" class="mt-2" />
        </div>

        <div>
          <x-input-label class="mt-1 col-md-2" for="nombre_video" :value="__('Subtítulo')" />
          <x-text-input id="nombre_video" class="block mt-1 col-md-4" type="text" name="nombre_video" value="{{ $datosCurso->title}}"
            readonly autofocus autocomplete="nombre_video" />
          <x-input-error :messages="$errors->get('nombre_video')" class="mt-2" />
        </div>

        <div>
          <x-input-label class="mt-1 col-md-2" for="nro_video_id" :value="__('Nro Video')" />
          <x-text-input id="nro_video_id" class="block mt-1 col-md-4" type="number" name="nro_video_id"
            value="{{ $temario->nro_video_id}}" required autofocus autocomplete="nro_video_id" />
          <x-input-error :messages="$errors->get('nro_video_id')" class="mt-2" />
        </div>

        <div>
          <x-input-label class="mt-1 col-md-2" for="descripcion" :value="__('Descripción')" />
          <x-text-input id="descripcion" class="block mt-1 col-md-4" type="text" name="descripcion"
            value="{{ $temario->descripcion}}" required autofocus autocomplete="descripcion" />
          <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <div class="">
          <x-input-label class="mt-1 col-md-2" for="uri_video" :value="__('Url Video')" />
          <x-text-input id="uri_video" class="block mt-1 col-md-4" type="text" name="uri_video"
            value="{{ $temario->uri_video}}" required autocomplete="uri_video" />
          <x-input-error :messages="$errors->get('uri_video')" class="mt-2" />
        </div>

        <div class="col-md-12">
          <img id="imagenSeleccionada" style="max-height: 150px;">
        </div>

        <div class="">
          <x-input-label class="mt-1 col-md-2" for="img_video" :value="__('Imagen')" />
          <x-text-input id="img_video" class="block mt-1 col-md-4" type="file" name="img_video"
            autocomplete="img_video" />
          <x-input-error :messages="$errors->get('img_video')" class="mt-2" />
        </div>


        <div class="">
          <x-input-label class="mt-1 col-md-2" for="archivo1_curso" :value="__('Archivo')" />
          <x-text-input id="archivo1_curso" class="block mt-1 col-md-4" type="file" name="archivo1_curso"
            autocomplete="archivo1_curso" value="{{ $temario->archivo1_curso}}" />
          <x-input-error :messages=" $errors->get('archivo1_curso')" class="mt-2" />
        </div>
        <div class="">
          <x-input-label class="mt-1 col-md-2" for="archivo2_curso" :value="__('Archivo')" />
          <x-text-input id="archivo2_curso" class="block mt-1 col-md-4" type="file" name="archivo2_curso"
            autocomplete="archivo2_curso" value="{{ $temario->archivo2_curso}}" />
          <x-input-error :messages=" $errors->get('archivo2_curso')" class="mt-2" />
        </div>

        <div>
          <x-input-label class="mt-1 col-md-2" for="tipo_curso">Tipo</x-input-label>
          <select name="tipo_curso" id="tipo_curso" required class="block mt-1 col-md-4">
            <option value="{{ $temario->tipo_curso }}">
              @if ($temario->tipo_curso == 1)
              Video
              @else
              Archivo
              @endif
            </option>
            <option value="1">Video</option>
            <option value="2">Archivo</option>
          </select>
        </div>

        <div class="my-4 text-center">
          <span>
            <a class="btn btn-outline-light btn-group-toggle mx-2"
              href="{{ route('temario.show', $datosCurso->id) }}">Volver</a>
          </span>
          <span>
            <button type="submit" class="btn btn-outline-light btn-group-toggle mx-2">
              Enviar
            </button>
          </span>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function(e) {
    $('#img_video').change(function() {
      let reader = new FileReader();
      reader.onload = (e) => {
        $('#imagenSeleccionada').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    });
  });
</script>
@endsection