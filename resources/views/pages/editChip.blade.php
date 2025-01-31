@extends('layouts.app', ['page' => __('Dashboard - Chiptuning - Edit chiptuning'), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card text-center">
  <div class="row">
    <div class="col-md-12 mt-4">
      <div>
        <h3>Edit Chiptuning</h3>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" action="{{ route('chiptuning.update', $chip) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="marca" :value="__('Marca')" />
              {{-- <select required class="block mt-1 col-md-4" name="marca" id="marca">
                <option value="{{ $marcaSlc->id }}">{{ $marcaSlc->marca }}</option>
                @foreach ($marcas as $marca)
                <option value="{{ $marca->marca }}">{{ $marca->marca }}</option>
                @endforeach
              </select> --}}
              <x-text-input type="text" name="marca" id="marca" value="{{ $chip->marca }}" readonly
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('marca')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="modelo" :value="__('Modelo')" />
              <x-text-input type="text" name="modelo" id="modelo" value="{{ $chip->modelo }}" required
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="anio" :value="__('Año')" />
              <x-text-input type="text" name="anio" id="anio" value="{{ $chip->anio }}" required
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('anio')" class="mt-2" />

            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="motor" :value="__('Motor')" />
              <x-text-input type="text" name="motor" id="motor" value="{{ $chip->motor }}" required
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('motor')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="ecu" :value="__('ECU')" />
              <x-text-input type="text" name="ecu" id="ecu" value="{{ $chip->ecu }}" required
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('ecu')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="combustible" :value="__('Combustible')" />
              <x-text-input type="text" name="combustible" id="combustible" value="{{ $chip->combustible }}" required
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('combustible')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="transmicion" :value="__('Transmición')" />
              <x-text-input type="text" name="transmicion" id="transmicion" value="{{ $chip->transmicion }}" required
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('transmicion')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="potencia_original" :value="__('Potencia Original')" />
              <x-text-input type="text" name="potencia_original" id="potencia_original"
                value="{{ $chip->potencia_original }}" required class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('potencia_original')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="torque_original" :value="__('Torque Original')" />
              <x-text-input type="text" name="torque_original" id="torque_original" value="{{ $chip->torque_original }}"
                required class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('torque_original')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="stage1" :value="__('Stage 1')" />
              <x-text-input type="text" name="stage1" id="stage1" value="{{ $chip->stage1 }}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('stage1')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="torque_stg1" :value="__('Torque ST1')" />
              <x-text-input type="text" name="torque_stg1" id="torque_stg1" value="{{ $chip->torque_stg1 }}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('torque_stg1')" class="mt-2" />
            </div>
            <div class="grid grid-cols-1">
              <img id="imagenSeleccionada1" style="max-height: 150px;" class="ml-10">
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="img_st1" :value="__('Imagen ST1')" />
              <x-text-input type="file" accept="image/*" name="img_st1" id="img_st1" value="{{ $chip->img_stg1 }}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('img_st1')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="stage2" :value="__('Stage 2')" />
              <x-text-input type="text" name="stage2" id="stage2" value="{{ $chip->stage2}}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('stage2')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="torque_stg2" :value="__('Torque ST2')" />
              <x-text-input type="text" name="torque_stg2" id="torque_stg2" value="{{ $chip->torque_stg2}}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('torque_stg2')" class="mt-2" />
            </div>
            <div class="grid grid-cols-1">
              <img id="imagenSeleccionada2" style="max-height: 150px;" class="ml-10">
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="img_st2" :value="__('Imagen ST2')" />
              <x-text-input type="file" accept="image/*" name="img_st2" id="img_st2" value="{{ $chip->img_stg2}}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('img_st2')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="stage3" :value="__('Stage 3')" />
              <x-text-input type="text" name="stage3" id="stage3" value="{{ $chip->stage3}}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('stage3')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="torque_stg3" :value="__('Torque ST3')" />
              <x-text-input type="text" name="torque_stg3" id="torque_stg3" value="{{ $chip->torque_stg3}}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('torque_stg3')" class="mt-2" />
            </div>
            <div class="grid grid-cols-1">
              <img id="imagenSeleccionada3" style="max-height: 150px;" class="ml-10">
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="img_st3" :value="__('Imagen ST3')" />
              <x-text-input type="file" accept="image/*" name="img_st3" id="img_st3" value="{{ $chip->img_stg3}}"
                class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('img_st3')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="configuracion_stg1" :value="__('Configuración ST1')" />
              <x-text-input type="text" name="configuracion_stg1" id="configuracion_stg1"
                value="{{ $chip->configuracion_stg1}}" class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('configuracion_stg1')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="configuracion_stg2" :value="__('Configuración ST2')" />
              <x-text-input type="text" name="configuracion_stg2" id="configuracion_stg2"
                value="{{ $chip->configuracion_stg2 }}" class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('configuracion_stg2')" class="mt-2" />
            </div>
            <div>
              <x-input-label class="text-left m-2 col-md-2" for="configuracion_stg3" :value="__('Configuración ST3')" />
              <x-text-input type="text" name="configuracion_stg3" id="configuracion_stg3"
                value="{{ $chip->configuracion_stg3 }}" class="block mt-1 col-md-4" />
              <x-input-error :messages="$errors->get('configuracion_stg3')" class="mt-2" />
            </div>

            <div class="my-4 text-center">
              <span>
                <a class="btn btn-outline-light btn-group-toggle mx-2" href="{{ route('chiptuning.index') }}">Volver</a>
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
    $('#img_st1').change(function() {
      let reader = new FileReader();
      reader.onload = (e) => {
        $('#imagenSeleccionada1').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    });
  });

  $(document).ready(function(e) {
    $('#img_st2').change(function() {
    let reader = new FileReader();
    reader.onload = (e) => {
    $('#imagenSeleccionada2').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
    });

    $(document).ready(function(e) {
      $('#img_st3').change(function() {
      let reader = new FileReader();
      reader.onload = (e) => {
      $('#imagenSeleccionada3').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
      });
      });
</script>

@endsection