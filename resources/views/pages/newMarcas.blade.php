@extends('layouts.app', ['page' => __('Dashboard - Marcas - Alta Marca'), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card text-center">
  <div class="row">
    <div class="col-md-12">
      <div>
        <h3>Alta Marca</h3>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" action="{{ route('marcas.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="marca" :value="__('Marca')" />
              <x-text-input type="text" name="marca" id="marca" required class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('marca')" class="mt-2" />
            </div>
            <div class="grid grid-cols-1">
              <img id="imagenSeleccionada" style="max-height: 150px;" class="ml-10">
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="imagen" :value="__('Logo')" />
              <x-text-input type="file" name="imagen" id="imagen" accept="image/*" class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
            </div>
            <div class="my-4 text-center">
              <span>
                <a class="btn btn-outline-light btn-group-toggle mx-2" href="{{ route('marcas.index') }}">Volver</a>
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