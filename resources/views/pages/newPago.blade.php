@extends('layouts.app', ['page' => __('Dashboard - Curso - Alta Pago'), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card col-md-12">
  <div class="row mx-2 justify-content-center  text-center">
    <div class="col-md-12 mt-3">
      <h3>Alta Pago</h3>
    </div>
    <div class="col-md-6 justify-content-center text-center">
      <div class="justify-content-center text-center w-100">
        <form class="w-100" action="{{ route('pagos.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class=" text-left">
            <div class=" form-group">
              <label for="user_curso_id" class="control-label col-sm-12 col-md-3">Cliente</label>
              {{-- <input type="text" name="name" id="name" required class=" w-100 rounded" /> --}}
              <select name="user_curso_id" id="user_curso_id" required class="form-select col-md-8 rounded">
                <option value="">Seleccione un Cliente</option>
                @foreach ($usuarios as $usuario)
                <option class=" letraMayuscula" value="{{ $usuario->id }}">{{ $usuario->last_name }} {{ $usuario->name
                  }}</option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="video_curso_id" class="control-label col-sm-12 col-md-3">Cursos</label>
              <select name="video_curso_id" id="video_curso_id" required class="form-select col-md-8 rounded">
                <option value="">Seleccione un Curso</option>
                @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->name }} {{ $curso->title }}</option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="videos_curso_cantidad" class="control-label col-sm-12 col-md-3">Vto Curso</label>
              <input type="text" name="vto_curso" id="vto_curso" placeholder="Cantidad de dias, ejemplo = 15"
                class=" col-md-8 rounded" />
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