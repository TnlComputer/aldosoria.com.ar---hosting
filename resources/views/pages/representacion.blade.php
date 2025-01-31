@extends('layouts.app', ['page' => __('Representación Oficial'), 'pageSlug' => 'representacion'])

@section('content')
<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <div class="chart-area">
          <div class="font-icon-list col-12 justify-content-center text-center text-white">
            <h3><strong>EQUIPO DE DIAGNOSTICO</strong></h3>
            <div>
              <img src="{{ asset('black') }}/img/napro.jpg" width="142" height="98" />
            </div>
            <div>
              <p class="pb-2 pt-4 text-justify"><strong>El SCAN30000 PC-USB</strong> es el escáner con
                tecnología brasileña, que sirve a la mayor parte de la flota nacional e incluso importado.
                Diseñado para satisfacer las necesidades de la mecánica, que funciona en conjunción con un
                ordenador (PC o Notebook) *.</p>
              <p class="pb-2 text-justify">Con los avances tecnológicos en el mercado, la comunicación USB
                rápida asociado con un ordenador, permite una gran velocidad de procesamiento de datos, que
                aporta una respuesta rápida de los sistemas analizados.</p>
              <p class="pb-2 text-justify">Cumple con los diversos protocolos y sistemas, lo que facilita la
                vida mecánica en una gran relación costo x beneficio.</p>
              <p class="pb-2 text-justify">El escáner acoplado a un ordenador, permite un bajo coste de
                mantenimiento, ya que un ordenador hoy en día es una tecnología popular, fácil de encontrar
                y mantenimiento simplificado.</p>
            </div>
            <h2 class="mt-4">CARACTERÍSTICAS PRINCIPALES</h2>
            <p class="m-4">
              <li class=" text-left ">Consulta y borra los avarias memoria (lectura de código de
                fallo)</li>
            </p>
            <p class="m-4">
              <li class=" text-left">Sensores y actuadores elementos diagnóstico.</li>
            </p>
            <p class="m-4">
              <li class=" text-left">actuadores de ajuste básico (cuando sea necesario)</li>
            </p>
            <p class="m-4">
              <li class=" text-left">Orientación a defectos mecánicos en la identificación.</li>
            </p>
            <p class="m-4">
              <li class=" text-left">Modo Continuo - parámetros del vehículo lectura dinámica, una
                serie de valores, todo al mismo tiempo en la pantalla del
                ordenador.</li>
            </p>
            <p class="m-4">
              <li class=" text-left">Tiene el escáner VAG (VW / Audi / Seat / Skoda), permitiendo que
                el mismo escáner procedimiento fabricante de automóviles.</li>
            </p>

            <h2 class=" pt-4">OPERACIÓN FÁCIL</h2>
            <p class=" text-justify">Usted no necesita conocimientos informáticos
              avanzados para su funcionamiento, el programa es educativo y guía al
              usuario a la que se deben utilizar cable o conector.</p>
            <p class="pb-2 text-justify">El programa (software) será siempre todo liberado y desbloqueado:</p>
            <p class="text-justify"> Sin necesidad de comprar paquetes o por separado los
              fabricantes de automóviles. El programa es que siempre están
              equipados completamente liberado.</p>
            <p class="pt-2 text-justify"> Con el equipo, los sistemas mecánicos pueden consultar sido desarrollados para
              el equipo, siempre que ha adquirido los correspondientes conectores o cables de cada vehículo provisto
              opcionalmente.</p>

            <h2 class="pt-4 text-center">ACTUALIZACIÓN</h2>
            <p class=" text-left"><strong>El sistema de actualización Napro es el mercado más ventajoso:</strong> </p>
            <p class=" text-left">El sistema permite una nueva versión que se adquiere sin la necesidad de comprar los
              anteriores.</p>
            <p class="pt-2 text-left"> La nueva versión del programa será siempre totalmente completa y puesto en
              libertad en el pasado, donde el equipo es.</p>
            <p class="pt-2 text-left"> Es fácil adquirirla, el usuario recibe un CD / DVD para su propia instalación,
              rápido y sin complicaciones.</p>
            <p class="pt-2 text-left"><strong>Los fabricantes a cumplir 47 **</strong></p>

            <!-- </div> -->
            <div class="bg-dark mt-4 mb-4 text-left text-white">
              <table class="col-lg-12 align-middle m-2">
                <tr>
                  <td>Agrale</td>
                  <td>Alfa Romeo</td>
                  <td>Audi</td>
                  <td>BMW</td>
                </tr>
                <tr>
                  <td>Chamonix</td>
                  <td>Chery</td>
                  <td>Chrysler</td>
                  <td>Citroën</td>
                </tr>
                <tr>
                  <td>Cnauto</td>
                  <td>Dacia</td>
                  <td>Daewoo</td>
                  <td>Esquivar</td>
                </tr>
                <tr>
                  <td>Effa</td>
                  <td>Fíat</td>
                  <td>Vado</td>
                  <td>GM</td>
                </tr>
                <tr>
                  <td>Opel</td>
                  <td>Haffei</td>
                  <td>Holden</td>
                  <td>Honda</td>
                </tr>
                <tr>
                  <td>Hyundai</td>
                  <td>Iveco</td>
                  <td>Jac</td>
                  <td>Jaguar</td>
                </tr>
                <tr>
                  <td>Jeep</td>
                  <td>Kia</td>
                  <td>Lancia</td>
                  <td>Land Rover</td>
                </tr>
                <tr>
                  <td>Lexus</td>
                  <td>Lifan</td>
                  <td>Mazda</td>
                  <td>Mercedes Bens</td>
                </tr>
                <tr>
                  <td>Mini</td>
                  <td>Mitsubishi</td>
                  <td>Moto Honda</td>
                  <td>Nissan</td>
                </tr>
                <tr>
                  <td>Peugeot</td>
                  <td>Renault</td>
                  <td>Seat</td>
                  <td>Shineray</td>
                </tr>
                <tr>
                  <td>Skoda</td>
                  <td>SSangyoung</td>
                  <td>Suzuki</td>
                  <td>Toyota</td>
                </tr>
                <tr>
                  <td>Troller</td>
                  <td>Volvo</td>
                  <td>Volkswagen</td>
                  <td>Yamaha</td>
                </tr>
              </table>
            </div>
            <p class="pb-2 text-justify">El NaPro de que se trate con constantes avances
              tecnológicos y la reducción de costes, ha desarrollado el nuevo
              conector 3 en 1, SW / SAE / CAN.</p>
            <p class="pb-2 text-justify">Fue lanzado por el grupo GM, un nuevo sistema de
              comunicación con una sola línea de datos para la comunicación con
              sistemas de paneles, bolsas de aire, aire acondicionado, etc ...
              conoce como TPMS SW (Single Wire Can).</p>
            <p class="pb-2 text-justify">Prestar atención a estos nuevos sistemas, hemos
              desarrollado una nueva interfaz de alta tecnología para este
              protocolo, que sólo NaPro ofrece a sus clientes.</p>
            <p class="pb-2 text-justify">Equipo con el Kit básico viene con el conector
              OBD2 / ISO, pero se puede comprar notros conectores y cables como opciones.</p>
            <p class="pb-4 text-justify">OBD2 / ISO, ALDL10, ALDL12, adaptador ISO, adaptador
              de PSA, EC4 / DLC, SW / SAE-M / CAN, Honda, Fiat, MB38, etc ...</p>
            <div class="py-2 d-flex flex-wrap justify-content-around">
              <a class="py-4" target="_blank" href="http://www.napro.com.br">
                <img src="{{ asset('black') }}/img/napro.jpg" width="160" height="98" alt="Napro" title="Napro" />
              </a>
              <a class="py-4" href="{{ asset('black') }}/img/equipos-de-diagnostico-napro.php"><img src="{{ asset('black') }}/img/telaspcscan3000.png" width="312" height="98" title="Equipo de Diagnóstico" alt="Equipo de Diagnóstico">
              </a>
              <a class="py-4" target="_blank" href="https://www.youtube.com/channel/UCKtZndryGb_u1Q4-zisGmNg/videos">
                <img src="{{ asset('black') }}/img/social/youtube.svg" width="97" height="98" title="YouTube Napro" alt=" YouTube Napro" />
              </a>
              <a class="py-4" target="_blank" href="https://www.suporte.napro.com.br/index.php?language=Espa%C3%B1ol">
                <img src="{{ asset('black/img/soporte-tecnico.png') }}" width="99" height="98" title="Soporte Napro" alt="Soporte Napro" />
              </a>
            </div>
            <!-- <br> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6 min-h-80">
    <div class="card">
      <div class="card-body">
        <div class="chart-area">
          <div class="font-icon-list col-12 justify-content-center text-center">
            <h3 class="test-center"><strong>CHIPTUNING PROFESIONALES</strong></h3>
            <h2 class="mb-0">
              <img src="{{ asset('black/img/logoevc.jpg') }}" width="142" height="98" />
            </h2>
            <p class="pt-4 text-left"><strong>EVC Electrónic es una empresa de origen
                Alemana.</strong></p>
            <p class="pt-2 text-left">
              <strong>Soria Performance</strong> es la única empresa representante
              en Latinoamérica de sus productos.
            </p>
            <p class="pt-2  text-left">
              <strong>EVC</strong> es la creadora del famoso Soft de edición de
              Mapas WINOLS además de una gran cantidad de productos para el manejo
              de programación.
            </p>
            <p class="pt-2 text-left">
              <strong>Para mayor información consúltenos brindamos asesoramiento
                para su taller o empresa de chiptuning.</strong>
            </p>
            <div class="my-4">
              <div style=" background-color:#666">
                <h2><strong> Trainings WinOLS </strong></h2>
              </div>
            </div>
            <p class="text-left">
              <strong>Reconocidos por EVC Electrónic</strong>
            </p>
            <p class="pt-2 text-left">
              <strong>Cursos individuales, 100% personalizados en función de las
                aptitudes y necesidades de cada profesional</strong>
            </p>
            <p class="pt-2 text-left">
              <strong>Fechas a convenir, en fines de semana</strong>
            </p>
            </p>
            <p class="pt-2 text-left">
              Sus productos son varios que aquí se muestran en orden cronológico
              su funcionamiento.
            </p>
            <p class=" text-justify text-white-50 my-4">
              <img src="{{ asset('black/img/WinOls_Components.jpg') }}" class=img-fluid>
            </p>
            <p class=" pt-2 text-left">WinOLS es una aplicación, que está escrito
              especialmente para modificar los contenidos de la memoria de la ECU.
            </p>
            <p class="pt-2 text-left">Facilita la búsqueda y la búsqueda de mapas, que
              luego se pueden nombrar y ver de diferentes maneras y cambiados.
            </p>
            <p class="pt-2  text-left">
              Para cambiar los datos, se ofrecen diferentes funciones para editar
              los mapas.
            </p>
            <p class="pt-2  text-left">Todos los datos y mapas se almacenan en archivos de
              proyecto. Estos archivos de proyecto tienen toda la información
              obtenida en el curso de la tramitación de un controlador
              determinado.
            </p>
            <p class="pt-2  text-left">
              Otra información, como el nombre del cliente, número de
              coche, y los archivos de imagen se puede añadir.
            </p>
            <p class="pt-2 text-left">Las modificaciones de los mapas se pueden almacenar
              como "versiones" y pueden ser comentados.
            </p>
            <p class="pt-2  text-left">Hasta 200 versiones de un
              archivo original son posibles.</p>
            <p class="pt-2 text-left">Todos los proyectos modificados se muestran en una
              lista, que se puede filtrar y ordenar.
            </p>
            <p class="pt-2  text-left">Por lo que es fácil encontrar
              un proyecto ya modificado de nuevo. </p>
            <h3 class="my-4 test-center">Visión de conjunto:</h3>
            <li class="mt-2 text-justify text-white">La representación de los datos en imagen está
              disponible en gráfico 2D o hexagonal / volcado decimal.
              Detección automática del procesador para distinguir entre el
              programa y el área de datos.</li>
            <li class="mt-2 text-justify text-white">Funciones para buscar mapas y ponerlos abajo en la
              lista de mapas hace eficiente trabajo mucho más fácil.
            </li>
            <li class="mt-2 text-justify text-white">Una ventana de pre visualizaci&oacute;n 3D hace que
              sea más f&aacute;cil encontrar mapas.
            </li>
            <li class="mt-2 text-justify text-white">Los mapas se pueden mostrar como gr&aacute;fico 3D /
              2D o como una mesa.</li>
            <li class="mt-2 text-justify text-white">B&uacute;squeda autom&aacute;tica de n&uacute;meros
              ECU y software.
            </li>
            <li class="mt-2 text-justify text-white">Se puede seleccionar ya sea en Ingl&eacute;s o
              alem&aacute;n como el idioma de la interfaz y cambiar entre
              ellas.
            </li>
            <li class="mt-2 text-justify text-white">El concepto de la corrección de suma de control
              integrado se ha mantenido. Mediante el uso de archivos DLL los
              algoritmos fueron removidos del programa principal y por lo
              tanto son independientes de la versión utilizada.
            </li>
            <li class="mt-2 text-justify text-white">Soporte para el hardware m&aacute;s reciente como
              BDM 100, BSL100 y OLS300, as&iacute; como el m&oacute;dulo
              simulador de hardware antiguo y OLS200 Eprom programador MP2440
              (P) en Windows XP - Win7-32. Bajo Win7-64 el uso de OLS200 y
              MP2440P ya no es posible.
            </li>
            <li class="mt-2 text-justify text-white"><strong>Im- y exportaci&oacute;n de archivos binarios, Intel y
                Motorola-Hexfiles</strong>. Todos los tipos pueden ser
              comprimidos, codificados y han intercambiado sus líneas o ser
              enviado directamente por correo electr&oacute;nico.
            </li>
            <div class="py-4 d-flex flex-wrap justify-content-around">
              <div class="my-4">
                <a target="_blank" href="https://www.evc.de"><img src="{{ asset('black/img/logoevc.jpg') }}" width="142" height="98" title="EVC" alt="EVC" /></a>
              </div>
              <div class="my-4">
                <img src="{{ asset('black/img/evc_vdat_110.jpg') }}" width="98" height="98" title="EVC VDAT" alt="EVC VDAT">
              </div>
              <div class="my-4">
                <a target="_blank" href="https://www.evc.de/en/service/"><img src="{{ asset('black/img/soporte-tecnico.png') }}" width="99" height="98" title="Soporte EVC" alt="Soporte EVC" /></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="d-sm-none d-md-block">
          <br /><br /><br /><br /><br /><br /><br /><br />
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="chart-area">
          <div class=" text-white">
            <p class="mt-2 text-justify">NAPRO Es un equipo de diagn&oacute;stico, ideal para acceder a los sistemas
              de electrónica del motor de much&iacute;simas marcas. Para iniciarse en el mundo de la
              inyecci&oacute;n electr&oacute;nica es ideal por costo y prestaciones. De muy buen
              desempe&ntilde;o y con algunas funciones de programaci&oacute;n de algunos sistemas.
              Comunica al PC vía USB o serial.</p>
          </div>
          <div class="mt-2 text-white">
            <p class="mt-2 text-justify">WinOLS es una aplicaci&oacute;n que sirve para editar el software ECU
              desarrollado por <strong>EVC</strong> y que se ha convertido en el est&aacute;ndar de la
              industria. Desde hace a&ntilde;os es el mejor editor hexadecimal que hay en el mercado para
              los tuners profesionales.</p>
          </div>
          <div class="mt-4 text-white"> Forma de Pago</div>
          <br>
          <div>
            <img src="{{ asset('black/img/mercadoPago1.png') }}" alt="MercadoPago" title="MercadoPago" width="64" height="38" />
            <img src="{{ asset('black/img/visa.jpg') }}" alt="Visa" title="Visa" width="41" height="38" />
            <img src="{{ asset('black/img/mastercard.jpg') }}" alt="Mastercard" title="Mastercard" width="41" height="38" />
            <img src="{{ asset('black/img/american_express.jpg') }}" alt="American Express" title="American Express" width="27" height="38" />
            <img src="{{ asset('black/img/argencard.jpg') }}" alt="Argencard" title="Argencard" width="29" height="38" />
            <img src="{{ asset('black/img/cabal.jpg') }}" alt="Cabal" title="Cabal" width="27" height="38" />
            <img src="{{ asset('black/img/tarjeta_naranja.jpg') }}" alt="Tarjeta Naranja" title="Tarjeta Naranja" width="27" height="38" />
            <img src="{{ asset('black/img/paypal.gif') }}" alt="PayPal" title="PayPal" width="68" height="38" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection