@extends('layouts.app', ['page' => __('Dashboard Cursos'), 'pageSlug' => 'dashboard'])

@section('content')
<div class="card col-md-12">
  <div class="row mx-2 justify-content-center  text-center">
    <div class="col-md-12 mt-3">
      <h3>Edit Oferta</h3>
    </div>
    <form class="" action="{{ route('adminOferta.update', $oferta->id) }}" method="post" enctype="multipart/form-data" id="formulario">
      @csrf
      @method('patch')
      <div class="m-4">
        <img src="{{ asset('img/Ofertas/' . $oferta->oferta) }}" width="200px" id="imagenSeleccionada">
      </div>

      <div class="m-4">
        <label for="imagen" class="control-label col-sm-12 col-md-12 text-left">Subir imagen
          {{ $oferta->id }}</label>
        <input type="file" name="imagen" id="imagen" accept="image/jpg" value="{{ $oferta->oferta }}" class="w-100 p-1 bg-secondary text-white rounded hidden" />
      </div>

      <div class="m-2">
        <input type="submit" value="Actualizar Ofertas" class="btn btn-secondary">
      </div>
    </form>
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