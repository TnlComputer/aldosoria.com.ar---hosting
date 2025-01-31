@extends('layouts.app', ['page' => __('Dashboard - Moneda - Alta '), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card text-center">
  <div class="row">
    <div class="col-md-12">
      <div>
        <h3>Edit Usuario</h3>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" action="{{ route('monedas.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
              <x-input-label class="text-left m-2 col-md-1" for="moneda" :value="__('Moneda')" />
              <x-text-input id="moneda" class="block mt-1 col-md-4" type="text" name="moneda" max="3" required autofocus autocomplete="moneda" />
              <x-input-error :messages="$errors->get('moneda')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-1" for="simbolo" :value="__('Simbolo')" />
              <x-text-input id="simbolo" class="block mt-1 col-md-4" type="text" name="simbolo" required autofocus autocomplete="simbolo" />
              <x-input-error :messages="$errors->get('moneda')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-1" for="name" :value="__('Nombre')" />
              <x-text-input id="name" class="block mt-1 col-md-4" type="text" name="name" required autofocus autocomplete="name" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-1" for="pais" :value="__('Pais')" />
              <x-text-input id="pais" class="block mt-1 col-md-4" type="text" name="pais" required autofocus autocomplete="pais" />
              <x-input-error :messages="$errors->get('pais')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-1" for="cambio" :value="__('Cambio')" />
              <x-text-input id="cambio" class="block mt-1 col-md-4" type="text" name="cambio" required autofocus autocomplete="cambio" />
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
