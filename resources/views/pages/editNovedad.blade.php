@extends('layouts.app', ['page' => __('Dashboard - Novedades -Edit Novedad'), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card text-center">
  <div class="row">
    <div class="col-md-12 nt-4">
      <div>
        <h3>Edit Novedad</h3>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" action="{{ route('novedad.update', $novedad) }}" method="post" enctype="multipart/form-data"
            id="formulario">
            @csrf
            @method('put')
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="novedades" :value="__('Novedad')" />
              <x-text-input type="text" name="novedades" id="novedades" value="{{ $novedad->novedades }}" required
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('novedades')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="fecha" :value="__('Fecha')" />
              <x-text-input type="date" name="fecha" id="fecha" value="{{ $novedad->fecha }}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="uri_novedad" :value="__('URL')" />
              <x-text-input type="text" name="uri_novedad" id="uri_novedad" value="{{ $novedad->uri_novedad }}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('uri_novedad')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="tipo_novedad" :value="__('Origen')" />
              <select name="tipo_novedad" id="tipo_novedad" required class="block mt-1 col-md-4">
                <option value="{{ $novedad->tipo_novedad }}">
                  @if ($novedad->tipo_novedad == 4)
                  Youtube
                  @else
                  Facebook
                  @endif
                </option>
                <option value="4">YouTube</option>
                <option value="1">Facebook</option>
              </select>
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="foto_novedad" :value="__('Video - Foto')" />
              <select name="foto_novedad" id="foto_novedad" required class="block mt-1 col-md-4">
                <option value="{{ $novedad->foto_novedad }}">
                  @if ($novedad->foto_novedad == 1)
                  Video
                  @else
                  Foto
                  @endif
                </option>
                <option value="1">Video</option>
                <option value="2">Foto</option>
              </select>
            </div>
            <div class="my-4 text-center">
              <span>
                <a class="btn btn-outline-light btn-group-toggle mx-2" href="{{ route('novedad.index') }}">Volver</a>
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
@endsection