@extends('layouts.app', ['page' => __('Dashboard - Usuario - Alta '), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card text-center">
  <div class="row">
    <div class="col-md-12">
      <div>
        <h3>Alta Usuario</h3>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="name" :value="__('Nombre')" />
              <x-text-input id="name" class="block mt-2 col-md-4" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-2" for="last_name" :value="__('Apellido')" />
              <x-text-input id="last_name" class="block mt-2 col-md-4" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
              <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-2" for="phone" :value="__('Teléfono')" />
              <x-text-input id="phone" class="block mt-2 col-md-4" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
              <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-2" for="pais_id" :value="__('Pais')" />
              <select name="pais_id" id="pais_id" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 col-md-4">
                <option value="">Seleccione un Pais</option>
                @foreach ($paises as $pais)
                <option value="{{$pais->id}}">{{ $pais->nombre }}</option>
                @endforeach
                </option>
              </select>
              <x-input-error :messages="$errors->get('pais_id')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="">
              <x-input-label class="text-left m-2 col-md-2" for="email" :value="__('Email')" />
              <x-text-input id="email" class="block mt-2 col-md-4" type="email" name="email" :value="old('email')" required autocomplete="username" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="">
              <x-input-label class="text-left m-2 col-md-2" for="password" :value="__('Password')" />
              <x-text-input id="password" class="block mt-2 col-md-4" type="password" name="password" required autocomplete="new-password" />
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="">
              <x-input-label class="text-left m-2 col-md-2" for="password_confirmation" :value="__('Confirmar Password')" />
              <x-text-input id="password_confirmation" class="block mt-2 col-md-4" type="password" name="password_confirmation" required autocomplete="new-password" />
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div>
              <x-input-label class="text-left m-2 col-md-2" for="roles">Saguridad</x-input-label>
              <select name="roles" id="roles" required class="block mt-2 col-md-4">
                <option value="ROLE_USERE">Usuario</option>
                <option value="ROLE_ADMIN">Administrador</option>
              </select>
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
