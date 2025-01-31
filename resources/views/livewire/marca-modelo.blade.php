<div class="row m-0 col-12">
  <div class=" text-white">
    <label class="">Marca</label>
    <span class="">
      <select wire:model.live="slcMarca" class="form-select">
        <option value="">== Seleccione una marca... ==</option>
        @foreach ($marcas as $marca)
        <option value="{{ $marca->marca }}">{{ $marca->marca }}</option>
        @endforeach
      </select>
    </span>
    <label class="">Modelo</label>
    <span class="">
      <select class=" form-select" wire:model.live="slcModelo">
        <option value="">== Seleccione un modelo ==</option>
        @foreach ($modelos as $modelo)
        <option value="{{ $modelo->id }}">
          {{ $modelo->marca }} {{ $modelo->modelo }}
          {{ $modelo->potencia_original }} {{ $modelo->combustible }} {{ $modelo->trnasmicion }}
          {{ $modelo->anio }}
        </option>
        @endforeach
      </select>
    </span>
  </div>
  <div class="col-md-12">
    @if (!Is_null($vehiculo))
    <div wire:model.live="slcVehiculo" class="mt-4">
      <div class="row my-2">
        <div class="col-md-3">Año</div>
        <div class="col-md-3 text-white">{{ $vehiculo->anio }}</div>
        <div class="col-md-3">Modelo Motor</div>
        <div class="col-md-3 text-white">{{ $vehiculo->modelo_motor }}</div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Motor</div>
        <div class="col-md-3 text-white">{{ $vehiculo->motor }}</div>
        <div class="col-md-3">ECU</div>
        <div class="col-md-3 text-white">{{ $vehiculo->ecu }}</div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Combustible</div>
        <div class="col-md-3 text-white">{{ $vehiculo->combustible }}</div>
        <div class="col-md-3">Transmición</div>
        <div class="col-md-3 text-white">{{ $vehiculo->transmicion }}</div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Potencia Original Apox.</div>
        <div class="col-md-3 text-white">{{ $vehiculo->potencia_original }}</div>
        <div class="col-md-3">Torque Original Aprox.</div>
        <div class="col-md-3 text-white">{{ $vehiculo->torque_original }}</div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Stage 1</div>
        <div class="col-md-3 text-white">{{ $vehiculo->stage1 }}</div>
        <div class="col-md-3">Torque Stage 1</div>
        <div class="col-md-3 text-white">{{ $vehiculo->torque_stg1 }}</div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Imagen Stage 1</div>
        <div class="col-md-9">
          @if ($vehiculo->img_st1 != null)
          <img src="{{ asset('black/img/Graficos_Banco_Pruebas/' . $vehiculo->img_st1) }}">
          @else
          @endif
        </div>
      </div>
      <div class="row  my-2">
        <div class="col-md-3">Stage 2</div>
        <div class="col-md-3 text-white">{{ $vehiculo->stage2 }}</div>
        <div class="col-md-3">Torque Stage 2</div>
        <div class="col-md-3 text-white">{{ $vehiculo->torque_stg2 }}</div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Imagen Stage 2</div>
        <div class="col-md-9">
          @if ($vehiculo->img_st2 != null)
          <img src="{{ asset('black/img/Graficos_Banco_Pruebas/' . $vehiculo->img_st2) }}">
          @else
          @endif
        </div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Stage 3</div>
        <div class="col-md-3 text-white">{{ $vehiculo->stage3 }}</div>
        <div class="col-md-3">Torque Stage 3</div>
        <div class="col-md-3 text-white">{{ $vehiculo->torque_stg3 }}</div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Imagen Stage 3</div>
        <div class="col-md-9">
          @if ($vehiculo->img_st3 != null)
          <img src="{{ asset('black/img/Graficos_Banco_Pruebas/' . $vehiculo->img_st3) }}">
          @else
          @endif
        </div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Configuraci&oacute;n Stage 1</div>
        <div class="col-md-9 text-white">{{ $vehiculo->configuracion_stg1 }}</div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Configuraci&oacute;n Stage 2</div>
        <div class="col-md-9 text-white">{{ $vehiculo->configuracion_stg2 }}</div>
      </div>
      <div class="row my-2">
        <div class="col-md-3">Configuraci&oacute;n Stage 3</div>
        <div class="col-md-9 text-white">{{ $vehiculo->configuracion_stg3 }}</div>
      </div>
    </div>
    @endif
  </div>
</div>