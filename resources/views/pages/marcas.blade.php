@extends('layouts.app', ['page' => __('ChipTuning - Marcas'), 'pageSlug' => 'marcas'])

@section('content')
<section">
  <div class="container">
    <div class="container my-5">
      <div class="row justify-content-start">
        <livewire:marca-modelo />
      </div>
    </div>
    <br />
    <div class="item-page">
      <div class="item-page p-2">
        Los llamados STAGE son diferentes configuraciones en Motor y Cajas que se deben
        tener en cuenta para su realización.<br />
        Se aclara que para realización y funcionamiento es necesario el uso de combustibles
        de Alto Octanaje en Naftas y en Diesel con bajo contenido de Azufre.<br />
        <br />
        <strong style="color:#F00">STAGE 1</strong><br />
        <br />
        Solo Actualización de Soft para mejorar potencia sin cambios en su periféricos
        externos.
        <br />
        Cambio de Filtro Aire y Escape Opcional.<br />
        <br />
        <strong style="color:#F00">STAGE 2</strong><br />
        <br />
        Cambio de escape y salida de Turbos Llamados DOWN PIPE diámetros de escapes
        especificados.<br />
        Cambio de Filtros de Aire. <br />
        Cambios y Anulación de Catalizadores <br />
        Cambios de Intercoler <br />
        Cambios de Mangueras IC , DV.<br />
        Cambios de Válvulas DV.<br />
        <br />
        <strong style="color:#F00">STAGE 3</strong><br />
        <br />
        Cambio de Turbo cargadores .<br />
        Cambios internos Motor Bielas, Pistones , Válvulas, Resortes de Válvulas.<br />
        Cambio de Múltiples Admisión.<br />
        Cambios de Bombas de Combustibles para mayor Flujo de Combustibles.<br />
        Cambios de Inyectores.<br />
        Cambios de sensores de Medidor de Masa Aire (MAF).<br />
        Cambios de sensores de Presión Turbo (MAP).<br />
        Cambio de escape y salida de Turbos Llamados DOWN PIPE.<br />
        Cambio de Filtros de Aire .<br />
        Cambios y Anulación de Catalizadores <br />
        Cambios de Intercoler <br />
        Colocación de equipos Agua Metanol.<br />
        <br />
        <strong style="color:#F00">Otras Funciones</strong>
        Realización de Launch Control en Unidades de Mando , LC , NCL , Turbo Lag.<br />
        En ME 7.5 – MED9 – MED 17. <br />
        También realizamos Seteos de Multimap.<br />
        <br />
        DSG VAG. Cajas Automáticas <br />
        <br />
        <strong style="color:#F00">Stage 1 - 2</strong>
        <br />
        Launch Control.<br />
        Rpm Máxima.<br />
        Tiempo de Cambio.<br />
        <br />
        <u>Normativas y Garantías en todos nuestros trabajos</u><br />
        <br />
        Los trabajos están garantizados.<br />
        Si después de 2 semanas de uso no está conforme se vuelve a la programación original
        y se reintegra el Dinero.<br />
        <br />
        <strong style="color:#F00">Para su actualizaciones de tipos Stage usted puede
          hacerlo directamente en Nuestro Taller.<br />
          <br />
          Enviando su Unidad de Mando a Nuestro Taller.<br /><br />
          Vía algunos de nuestros representantes.</strong> <br />
        <br />
        <strong style="color:#F00">Vía Email.</strong>
      </div>
    </div>
  </div>
  </section>
  @endsection