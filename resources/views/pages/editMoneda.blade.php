@extends('layouts.app', ['page' => __('Dashboard - - Moneda - Edit '), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card">
  <div class="row">
    <div class="col-md-12 m-3">
      <div class="text-center">
        <h3>Edit Usuario</h3>
      </div>
      <div class="row text-center">
        <div class=" col-md-12">
          <form class="" action="{{ route('monedas.update', $moneda->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
              <x-input-label class="text-left m-2 col-md-1" for="moneda" :value="__('Moneda')" />
              <x-text-input id="moneda" class="block mt-1 col-md-4" type="text" name="moneda" value="{{ $moneda->moneda }}" readonly autocomplete="moneda" />
              <x-input-error :messages="$errors->get('moneda')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-1" for="simbolo" :value="__('Simbolo')" />
              <x-text-input id="simbolo" class="block mt-1 col-md-4" type="text" name="simbolo" value="{{ $moneda->simbolo }}" readonly autocomplete="simbolo" />
              <x-input-error :messages="$errors->get('moneda')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-1" for="name" :value="__('Nombre')" />
              <x-text-input id="name" class="block mt-1 col-md-4" type="text" name="name" value="{{ $moneda->name }}" readonly autofocus autocomplete="name" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-1" for="pais" :value="__('Pais')" />
              <x-text-input id="pais" class="block mt-1 col-md-4" type="text" name="pais" value="{{ $moneda->pais }}" required autofocus autocomplete="pais" />
              <x-input-error :messages="$errors->get('pais')" class="mt-2" />

            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-1" for="cambio" :value="__('Cambio')" />
              <x-text-input id="cambio" class="block mt-1 col-md-4" type="text" name="cambio" value="{{ $moneda->cambio }}" required autofocus autocomplete="cambio" />
              <x-input-error :messages="$errors->get('cambio')" class="mt-2" />


            </div>

            <div class="my-4 text-center">
              <span>
                <a class="btn btn-outline-light btn-group-toggle mx-2" href="{{ route('monedas.index') }}">Volver</a>
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
