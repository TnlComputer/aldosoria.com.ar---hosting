@extends('layouts.app', ['page' => __('Dashboard - Curso - Edit Pago'), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card">
  <div class="card col-md-12">
    <div class="row mx-2 justify-content-center  text-center">
      <div class="col-md-12 mt-3">
        <h3>Pago</h3>
      </div>
      <div class="col-md-6 justify-content-center text-center">
        <div class="justify-content-center text-center w-100">
          <form class="w-100" action="{{ route('pagos.update', $userCurso->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class=" text-left">
              <div class=" form-group">
                <label for="user_name" class="control-label col-sm-12 col-md-3">Cliente</label>
                <input type="hidden" name="user_curso_id" value="{{ $userCurso->user_curso_id }}">
                <input type="hidden" name="curso_id" value="{{ $userCurso->curso_id }}">
                <input type="text" name="user_name" id="user_name" required
                  class="form-select col-md-8 rounded readonly"
                  value="{{ $userCurso->user_last_name }}, {{ $userCurso->user_name }}" readonly />
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label for="nombre_curso" class="control-label col-sm-12 col-md-3">Cursos</label>
                  <input type="text" name="nombre_curso" id="nombre_curso" required class="form-select col-md-8 rounded"
                    value="{{ $userCurso->nombre_curso }}" readonly />
                </div>
                <div class="form-group">
                  <label for="titulo_curso" class="control-label col-sm-12 col-md-3">Titulo</label>
                  <input type="text" name="titulo_curso" id="titulo_curso" required class="form-select col-md-8 rounded"
                    value=" {{ $userCurso->titulo_curso }}" readonly />
                </div>
                <div class="form-group">
                  <label for="fecha_inscripcion" class="control-label col-sm-12 col-md-3">Fecha Compra</label>
                  <input type="date" name="fecha_inscripcion" id="fecha_inscripcion" placeholder="DD/MM/AAAA"
                    value="{{ $userCurso->fecha_inscripcion }}" class="col-md-8 rounded" />
                </div>
                <div class="form-group">
                  <label for="videos_curso_cantidad" class="control-label col-sm-12 col-md-3">Vto Curso</label>
                  <input type="text" name="vto_curso" id="vto_curso" value="0"
                    placeholder="Cantidad de dias, ejemplo = 15" class=" col-md-8 rounded" />
                </div>
                <div class="form-group">
                  <label for="pago_curso" class="control-label col-sm-12 col-md-3">Estado</label>
                  <input type="text" name="pago_curso" id="pago_curso" placeholder="Estado"
                    value="{{ $userCurso->pago_curso }}" class=" col-md-8 rounded" />
                </div>

                <div class="my-4 text-center">
                  <span>
                    <a class="btn btn-outline-light btn-group-toggle mx-2" href="{{ route('pagos.index') }}">Volver</a>
                  </span>
                  <span>
                    <button type="submit" class="btn btn-outline-light btn-group-toggle  mx-2">
                      Enviar
                    </button>
                  </span>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
</script> -->
@endsection