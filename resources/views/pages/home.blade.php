@extends('layouts.app', ['page' => __('Home'), 'pageSlug' => 'home'])

@section('content')
<header>
  <div class="container bg-negro mt-0 d-none d-md-block">
    <div class="col-md-12 justify-content-center text-center">
      <img src="{{ asset('black/img/soria perfomance auto.png') }}" alt="imagen decorativa">
    </div>
  </div>
  <div class="container bg-negro mt-2 d-none d-md-block">
    <div id="carouselHome" class="carousel slide justify-content-center text-center" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('black/img/iacf1.jpg') }}" class="d-block w-100" style="height: 400px;">
          <div class="carousel-caption d-none d-md-block">
            <div class="col-md-12 w-100" align="left" style="padding: 10px; border-radius: 10px; ">
              <h3>Mec&aacute;nica</h3>
              <p style="text-shadow:1px 1px #000000;">Soria Perfomance, una empresa que est&aacute;
                dedicada al rubro reparaci&oacute;n y mantenimiento del Autom&oacute;vil. En los
                &uacute;ltimos a&ntilde;os ha incorporado la mayor tecnolog&iacute;a y equipamiento
                para brindarle a sus clientes el mejor servicio...<br /><br />
                <a class="btn btn-outline-secondary header-btn" href="{{ route('mecanica') }}">M&aacute;s

                  info...</a>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('black/img/iacf2.jpg') }}" class="d-block img-fluid" style="width: 100%; height: 400px;">

          <div class="carousel-caption d-none d-md-block" style="z-index:0;">
            <div class="col-md-12 w-100" align="left" style="padding: 10px; border-radius: 10px; ">
              <h4>Electr&oacute;nica</h4>
              <p style="text-shadow:1px 1px #000000;">Nuestro Taller a Acumulado mucha
                informaci&oacute;n a trav&eacute;s de los a&ntilde;os y esta se la brindamos a
                nuestros clientes para resolver los problemas de su
                autom&oacute;vil.<br />Inyecci&oacute;n, ABS, Airbag, Pincode, Llaves,
                Inmobilizador...<br /><br />
                <a class="btn btn-outline-secondary header-btn" href="{{ route('electronica') }}">M&aacute;s

                  info...</a>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('black') }}/img/iacf3.jpg" class="d-block img-fluid" style="width: 100%; height: 400px;">

          <div class="carousel-caption d-none d-md-block">
            <div class="col-md-12 w-100" align="left" style="padding: 10px; border-radius: 10px; ">
              <h4>Chiptunning</h4>
              <p style="text-shadow:1px 1px #000000;">¿Que es un CHIP? Es una memoria de distintas
                capacidades donde se encuentran las localizaciones de avance de encendido, aumento
                de cantidad de combustible, cargas de motor y en cada mapa de un chip se encuentran
                tambi&eacute;n los limitadores de R.P.M del motor, carga de turbos compresores y
                varios factores que pueden incrementar su potencia.<br /><br />
                <a class="btn btn-outline-secondary header-btn" href="{{ route('chiptuning') }}">M&aacute;s

                  info...</a>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('black/img/Taller/20170215_140322.jpg') }}" class="d-block img-fluid" style="width: 100%; height: 400px;">

          <div class="carousel-caption d-none d-md-block">
            <div class="col-md-12 w-100" align="left" style="padding: 10px; border-radius: 10px; ">
              <h4>Taller</h4>
              <p style="text-shadow:1px 1px #000000;">Nuestro taller cuenta con todas las comodidades
                para un servicio a la altura de nuestros clientes.<br /><br />
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('black/img/BancoPrueba/20170215_140315.jpg') }}" class="d-block img-fluid" style="width: 100%; height: 400px;">

          <div class="carousel-caption d-none d-md-block">
            <div class="col-md-12 w-100" align="left" style="padding: 10px; border-radius: 10px; ">
              <h4></h4>
              <p style="text-shadow:1px 1px #000000;">Banco de Prueba, donde comprobamos las mejoras
                realizadas en los veh&iacute;culos, con su respectivo diagn&oacute;stico de cada
                par&aacute;metro, llegando al rendimiento esperado.<br /><br />
              </p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br />
  </div>
  <div id="sec-Hom" class="container bg-negro">
    <br />
    <div class="row">
      <br />
      <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="col-md-12 w-100">
          <img src="{{ asset('black') }}/img/mantenimiento-programado.jpg" alt="mantenimiento-programado" width="100%" height="265" />
          <div class="col-md-12 p-2">
            <br>
            <h5 class=" text-center">Mantenimiento programado</h5>
            <p>¿Usted sabe cu&aacute;ntos Km tiene su Lubricante? Nosotros podemos ayudarle a sacarse
              obligaciones de sus tareas le brindamos un servicio de alertas a trav&eacute;s de su
              email. </p>
            <a class="btn btn-secondary mb-2" href="{{ route('mantenimiento') }}" target="_self">Leer
              m&aacute;s...</a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="col-md-12 w-100">
          <img src="{{ asset('black') }}/img/evc-car.jpg" alt="Chiptuning" width="100%" height="265" />
          <div class="col-md-12 p-2">
            <br>
            <h5 class="text-center">Chiptunning</h5>
            <p>Nuestro Taller a Acumulado mucha informaci&oacute;n a trav&eacute;s de los a&ntilde;os y
              esta se la brindamos a nuestros clientes para resolver los problemas de su
              autom&oacute;vil.
              Inyecci&oacute;n, ABS, Airbag, Pincode, Llaves, Inmobilizador.... </p>
            <a class="btn btn-secondary mb-2" href="{{ route('chiptuning') }}" target="_self">Leer
              m&aacute;s...</a>

          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="col-md-12 w-100">
          <img src="{{ asset('black') }}/img/logosRepre5.png" alt="Representaciones" width="100%" height="265" />
          <div class="col-md-12 p-2">
            <br>
            <h5 class="text-center">Representaciones</h5>
            <p align="justify">Somos la &uacute;nica empresa del Pa&iacute;s Autorizada a vender los
              equipos de Diagn&oacute;sticos de Gesti&oacute;n Electr&oacute;nica del autom&oacute;vil
              de la Empresa NAPRO ELECTRONIC de BRASIL.&nbsp;</p>
            <a class="btn btn-secondary mb-2" href="{{ route('representacion') }}" target="_self">Leer
              m&aacute;s...</a>

          </div>
        </div>
      </div>
    </div>
    <br />
  </div>
</header>
@endsection

{{-- @push('js')
<script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
<script>
  $(document).ready(function() {
    demo.initDashboardPageCharts();
  });
</script>
@endpush --}}