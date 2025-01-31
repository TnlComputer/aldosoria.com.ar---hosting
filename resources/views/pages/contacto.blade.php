@extends('layouts.app', ['page' => __('Contacto'), 'pageSlug' => 'contacto'])

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
              <form class="card my-4" action="{{ 'envio_contacto' }}" method="post" id="formulario">
                <div class="card-body control-group ">
                  <div class="form-group control-label">
                    <label class="control-label" for="inputEmail">Nombre :</label>
                    <input type="text" name="txtNombre" class="form-control" required />
                  </div>
                  <div class="form-group control-label">
                    <label class="control-label" for="inputTelefono">Tel&eacute;fono :</label>
                    <input type="text" name="txtTelefono" class="form-control" required />
                  </div>
                  <div class="form-group control-label">
                    <label class="control-label" for="inputEmail">Email :</label>
                    <input type="email" name="txtEmail" class="form-control" required />
                  </div>
                  <div class="form-group control-label">
                    <label class="control-label" for="inputAsunto">Asunto : </label>
                    <input type="text" name="txtAsunto" class="form-control" required />
                  </div>
                  <div class="form-group control-label">
                    <label class="control-label" for="inputDescripcion">Mensaje :</label>
                    <textarea rows="6" cols="30" name="txtMensaje" class="form-control"></textarea>
                  </div>
                  <button type="submit" class="btn btn-outline-dark btn-block mt-2">
                    Enviar
                  </button>
                </div>
              </form>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6" align="center">
              <div class="col-xs-12 col-sm-12 col-md-12" style="color: #FFF" align="center">
                <br /> <br /> <br />
                <br /> <br />

                <h5>SORIA PERFOMANCE</h5>
                <p>
                  <a>General A. J. de Sucre 1053/1057 - CP1708 <br /> Morón - Provincia de Buenos
                    Aires</a><br />
                  <a> Tel.: 4483-1235 / 4629-8829 /5294-4412</a>
                </p>
                <iframe class="img-thumbnail" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.7933289046136!2d-58.63106368431864!3d-34.65992198044491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc7449c36ec85%3A0x7653129a31a6ad8b!2sSoria+Perfomance!5e0!3m2!1ses-419!2sus!4v1554908259641!5m2!1ses-419!2sus"></iframe>
                <div>
                  </br></br>
                  <span>
                    {{-- <a href="https://www.facebook.com/www.aldosoria.com.ar/" class="footerc" target="blank"><img
                        src="https://aldosoria.com.ar/images/Facebook alt 1.png"
                        alt="Facebook" title="Siguenos en Facebook" />
                    </a>
                    <a href="https://twitter.com/aldosoria?lang=es" class="footerc" target="_blank"><img
                        src="https://aldosoria.com.ar/images/Twitter NEW.png"  alt="Twitter"
                        title="Siguenos en Twitter" />
                    </a>
                    <a href="https://www.instagram.com/mecatronicasoria/" class="footerc" target="_blank"><img
                        src="https://aldosoria.com.ar/images/Instagram.png"  alt="Instagram"
                        title="Siguenos en Instagram" />
                    </a>
                    <a href="https://www.youtube.com/channel/UCz1Q_SBgdqp_ULPY8poUM1g" class="footerc" target="blank"><img
                        src="https://aldosoria.com.ar/images/YouTube.png" alt="YouTube"
                        title="Siguenos en YouTube" />
                    </a> --}}
                  </span>
                  </br></br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
