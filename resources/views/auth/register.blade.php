<x-guest-layout>
  <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
      <x-input-label for="name" :value="__('Nombre')" />
      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="last_name" :value="__('Apellido')" />
      <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
      <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>

    <div>
      <x-input-label for="phone" :value="__('Teléfono')" />
      <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
      <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <div>
      <x-input-label for="pais_id" :value="__('Pais')" />
      <select name="pais_id" id="pais_id" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'block mt-1 col-md-4">
        <option value="">Seleccione su país</option>
        @foreach ($paises as $pais)
        <option value="{{$pais->id}}">{{ $pais->nombre }}</option>
        @endforeach
      </select>
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />

      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-input-label for="password_confirmation" :value="__('Confirmar Password')" />

      <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
    <div class="flex">
      <div class=" justify-content-around">
        <x-input-label for="whatsapp" :value="__('Whatsapp')" class="mt-3" />
        <select name="whatsapp" id="whatsapp" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'block mt-1 col-md-4">
          <option value="NO">NO</option>
          <option value="SI">SI</option>
        </select>
      </div>

      <div>
        <x-input-label for="tlgram" :value="__('Telegram')" class="mt-3" />
        <select name="tlgram" id="tlgram" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'block mt-1 col-md-4">
          <option value="NO">NO</option>
          <option value="SI">SI</option>
        </select>
      </div>
    </div>

    <div class="flex items-center justify-end mt-4">
      <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
        {{ __('Ya estas registrado?') }}
      </a>

      <x-primary-button class="ms-4">
        {{ __('Registrarse') }}
      </x-primary-button>
    </div>
  </form>
</x-guest-layout>