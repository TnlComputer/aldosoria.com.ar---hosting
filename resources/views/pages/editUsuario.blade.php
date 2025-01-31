@extends('layouts.app', ['page' => __('Dashboard - Usuario - Edit '), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card">
  <div class="row">
    <div class="col-md-12 m-3">
      <div class="text-center">
        <h3>Edit Usuario</h3>
      </div>
      <div class="row">
        <div class=" col-md-12">
          <form class="" action="{{ route('usuarios.update', $usuario->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
              <x-input-label class="text-left m-2 col-md-1" for="name" :value="__('Nombre')" />
              <x-text-input id="name" class="block mt-1 col-md-4" type="text" name="name" value="{{ $usuario->name }}" required autofocus autocomplete="name" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
              <!-- </div>

              <div> -->
              <x-input-label class="text-left m-2 col-md-1" for="last_name" :value="__('Apellido')" />
              <x-text-input id="last_name" class="block mt-1 col-md-4" type="text" name="last_name" value="{{ $usuario->last_name }}" required autofocus autocomplete="last_name" />
              <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-1" for="phone" :value="__('Teléfono')" />
              <x-text-input id="phone" class="block mt-1 col-md-4" type="text" name="phone" value="{{ $usuario->phone }}" required autofocus autocomplete="phone" />
              <x-input-error :messages="$errors->get('phone')" class="mt-2" />
              <!-- </div>

              <div> -->
              <x-input-label class="text-left m-2 col-md-1" for="pais_id" :value="__('Pais')" />
              <select name="pais_id" id="pais_id" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 col-md-4">
                <option value="{{ $usuario->pais_id }}">{{ $paisUser->nombre }}</option>
                @foreach ($paises as $pais)
                <option value="{{$pais->id}}">{{ $pais->nombre }}</option>
                @endforeach
                </option>
              </select>
              <x-input-error :messages="$errors->get('pais_id')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-1" for="whatsapp" :value="__('Whatsapp')" />
              <select name="whatsapp" id="whatsapp" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 col-md-4">
                <option value="{{ $usuario->whatsapp}}">{{ $usuario->whatsapp}}</option>
                <option value="NO">NO</option>
                <option value="SI">SI</option>
              </select>
              <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />

            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-1" for="tlgram" :value="__('Telegram')" />
              <select name="tlgram" id="tlgram" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 col-md-4">
                <option value="{{ $usuario->tlgram}}">{{ $usuario->tlgram}}</option>
                <option value="NO">NO</option>
                <option value="SI">SI</option>
              </select>
              <x-input-error :messages="$errors->get('tlgram')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-1" for="roles" :value="__('Seguridad')" />
              <select name="roles" id="roles" required class="block mt-1 col-md-4">
                <option value="{{ $usuario->roles }}">
                  @if ($usuario->roles == 'ROLE_USER')
                  Usuario
                  @else
                  Administrador
                  @endif
                </option>
                <option value="ROLE_USER">Usuario</option>
                <option value="ROLE_ADMIN">Administrador</option>
              </select>
              <x-input-error :messages="$errors->get('roles')" class="mt-2" />
            </div>

            <div class="my-4 text-center">
              <span>
                <a class="btn btn-outline-light btn-group-toggle mx-2" href="{{ route('usuarios.index') }}">Volver</a>
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