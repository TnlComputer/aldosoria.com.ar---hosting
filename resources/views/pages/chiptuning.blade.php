@extends('layouts.app', ['page' => __('Chiptuning'), 'pageSlug' => 'chiptuning'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <section id="sec-Chi" class="my-5">
          <div class="container bg-negro mt-5">
            <br />
            <div class="row">
              <div class="col-md-12 mt-auto">
                <div class="row justify-content-center text-center">
                  <div class="col-md-3 p-2 justify-content-center">
                    <a><img src="{{ asset('black/img/BancoPrueba/banco_prueba.jpg') }}" width="260" height="147"></a>
                  </div>
                  <div class="col-md-3 p-2 justify-content-center">
                    <a><img src="{{ asset('black/img/Chiptuning/evc_lab.jpg') }}" width="260" height="147"></a>
                  </div>
                  <div class="col-md-3 p-2 justify-content-center">
                    <a><img src="{{ asset('black/img/Chiptuning/2014071.jpg') }}" width="260" height="147"></a>
                  </div>
                  <div class="col-md-3 p-2 justify-content-center">
                    <a><img src="{{ asset('black/img/Chiptuning/2014072.jpg') }}" width="260" height="147"></a>
                  </div>
                  <br>
                  <div class="col-md-12 mt-4 justify-content-center text-center">
                    <h3>Marcas ChipTuning realizados</h3>
                  </div>
                  <div class="col-md-12 justify-content-center text-center">
                    <form action="{{ route('chipMarcas') }}">
                      <button type="submit" class="btn btn-dark px-2">
                        <img src="{{ asset('black/img/marcas_autos_de_lujo_autoelite.jpg') }}" />
                      </button>
                    </form>
                  </div>
                </div>
                <br>
                <div align="justify"><strong>¿Que es un CHIP?</strong> Es una memoria de distintas
                  capacidades donde
                  se encuentran las localizaciones de avance de encendido, aumento de cantidad de
                  combustible,
                  cargas de motor y en cada mapa de un chip se encuentran también los limitadores de
                  R.P.M del
                  motor, limitadores de velocidad máxima, carga de turbos compresores y varios
                  factores que pueden
                  incrementar su potencia, torque y así poder lograr <strong>potencias mayores y
                    mejores consumos
                    de combustible</strong>.<br />

                  Los más antiguos tenían un memoria RAM que se desmontaba de la unidad de mando y
                  esta se
                  cambiaba o Modificaba para poder modificar su cartografía interna. Los sistemas más
                  modernos
                  tienen esta información en su Micro controlador el cual es necesario poseer equipos
                  de buena
                  calidad para estas lectura y grabaciones.<br />
                  <br />
                  <strong>Hay diferentes modos de lectura hoy en los vehículos las llamadas vía OBD que se realizan por
                    el conector de Diagnostico .<br />
                    Las lecturas tipo Boot Mode que es necesario
                    desmontar la ECU motor y poder hacer lectura en banco de trabajo .<br />
                    Lecturas tipo BDM que
                    algunos modelos tienen un puerto para esta lectura pero siempre desmontando la ecu del
                    Vehículo.<br />
                    También realizamos programaciones en cajas de velocidad del tipo Automáticas DSG
                    DQ200-250-300-500 de la línea VAG y BMW.<br /> <br />
                    Podemos realizar reprogramaciones de diferentes tipos de Potencia estos son
                    Llamados STAGE
                    1-2-3 – Con LC – NCL – ANTILAG. Las configuraciones de los diferentes Stage es
                    el uso de
                    Combustibles de Alta Calidad de 98 Octanos en Gasolina y Gas Oíl de Alta calidad
                    con bajos
                    contenidos de Azufre.<br /><br />

                    Realizamos Stage a Medida con Agua-Metanol para motores con diferentes
                    configuraciones de
                    elementos.</strong><br /><br />

                  La inyección nafta y diesel se incorporo en los vehículos de hoy para lograr una
                  posibilidad de
                  controlar todo el sistema de motor a través de una unidad de motor, para mejorar su
                  comportamiento y funcionamiento, esto trajo aparejado a los talleres nuevas
                  tecnologías en
                  equipos y estudios para lograr comprender que hoy los automóviles son maquinas
                  perfectas en su
                  funcionamiento y prestaciones.<br />

                  Además se puede potenciar estos sistemas para mejorar la potencia de estos nuevos
                  sistemas de
                  inyección, ya que los sistemas que llegan a nuestro país con normas de contaminación
                  de los
                  países europeos, ya que en estos países europeos se representan con las siglas Euro
                  3 y Euro 4 y
                  estas atacan principalmente las normas de contaminación y por ello estos automóviles
                  presentan
                  en muchísimas ocasiones falta de potencia para el uso de nuestros combustibles que
                  se encuentran
                  en nuestro país, para ello hemos incorporado nuevas tecnologías en pruebas con
                  equipos de alta
                  técnica para su desarrollo técnico y eficaz.<br />

                  <strong>Nuestra empresa posee la mayor tecnología y además poseemos banco de
                    rodillos</strong>
                  para poder evaluar la potencia antes y después de la modificación del auto, probar
                  el vehículo
                  hasta una velocidad de 300 Km sin salir del taller. <strong>Tememos más experiencia
                    en sistemas
                    de inyección electrónica Nafta y Diesel Aspirados y Turbo comprimidos y en Cajas
                    Automáticas
                    DSG de la línea VAG</strong> ya que estamos en esta función a través de 22 años
                  de
                  experiencia en sistemas de electrónica automotor.
                  </br></br>
                  <div>
                    <br />
                    <a href="https://www.evc.de/en/check_evc_license.asp?k=kAV25xWfgnfRmeLXxsUPHQ%3d%3d"
                      target="_blank"><img src="{{ asset('black') }}/img/check_evc_license_image.png" width="472"
                        height="118" alt="WinOLS - License check" title="WinOLS - License check"></a>

                    {{-- <a href="https://www.evc.de/en/check_evc_license.asp?k=kAV25xWfgnfRmeLXxsUPHQ%3d%3d"
                      target="_blank"><img
                        src="https://www.evc.de/common/check_evc_license_image.asp?k=kAV25xWfgnfRmeLXxsUPHQ%3d%3d"
                        width="220" height="109" alt="WinOLS - License check" title="WinOLS - License check"></a> <br />
                    --}}
                  </div>
                  <br /><br />
                  Forma de Pago
                  </br>
                  <div>
                    <img src="{{ asset('black') }}/img/mercadoPago1.png" alt="MercadoPago" width="64" height="38" />
                    <img src="{{ asset('black') }}/img/visa.jpg" alt="Visa" width="41" height="38" />
                    <img src="{{ asset('black') }}/img/mastercard.jpg" alt="Mastercard" width="41" height="38" />
                    <img src="{{ asset('black') }}/img/american_express.jpg" alt="American Express" width="27"
                      height="38" />
                    <img src="{{ asset('black') }}/img/argencard.jpg" alt="Argencard" width="29" height="38" />
                    <img src="{{ asset('black') }}/img/cabal.jpg" alt="Cabal" width="27" height="38" />
                    <img src="{{ asset('black') }}/img/tarjeta_naranja.jpg" alt="Tarjeta Naranja" width="27"
                      height="38" />
                    <img src="{{ asset('black') }}/img/paypal.gif" alt="PayPal" width="68" height="38" />
                  </div>
                  <br />
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
@endsection