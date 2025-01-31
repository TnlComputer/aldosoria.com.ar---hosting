@extends('layouts.app', ['page' => __('Dashboard'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="row">
  <div class="card">
    <div class="card-body">
      <div class="chart-area">
        <div class=" text-white">
          <div class="d-inline">PANEL PERSONAL - {{ Auth::user()->name }} {{ Auth::user()->last_name }}
          </div>
          <div class="row">
            @if (Auth::user()->roles == 'ROLE_USER')
            <div class="card px-3">
              <div class="row justify-content-center mt-4 text-center">
                <div class="col-lg-12 ">
                  @if (!Is_null($cursosPagos))
                  @foreach ($cursosPagos as $cursoPago)
                  <div class="font-icon-detail">
                    <div class="row">
                      <div class=" col-md-6">
                        <h4>{{ $cursoPago->name }} - {{ $cursoPago->title }} </h4>
                        <div class="col-lg-12">
                          <img src="{{ asset('img/cursos/' . $cursoPago->image_curso) }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <h4>Temario</h4>
                        <div class="col-md-12 text-left text-white">
                          @if (!Is_null($cursoPago))
                          @foreach ($temarios as $temario)
                          @if ($cursoPago->video_curso_id == $temario->video_curso_id)
                          <div class="pb-2">{{ $temario->descripcion }}</div>
                          @endif
                          @endforeach
                          @else
                          <h5 class="my-3 mx-4">No hay Temario disponible para este Curso</h5>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="mt-4 ">
                      <form action="{{ route('video.show', $cursoPago->video_curso_id) }}" method="get">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <button class="btn btn-group-lg border-black" type="submit">Ver videos del curso</button>
                      </form>
                    </div>
                  </div>
                  @endforeach
                  @else
                  <p class=" text-white">No tienes cursos disponibles</p>
                  @endif
                  @if (Auth::user()->roles == 'ROLE_USER')
                  <div class="px-4 py-2">
                    {{ $cursosPagos->links() }}
                  </div>
                  @endif
                </div>
              </div>
            </div>
            @endif
            @if (Auth::user()->roles == 'ROLE_ADMIN')
            <div class="col-md-12 my-4">
              <h4>ADMINISTRACIÓN</h4>
              <div class="row">
                <div class="col-12">
                  <span>
                    <a class="btn btn-admin" href="{{ route('cursos.index') }}">Cursos </a>
                  </span>
                  <span>
                    <a class="btn btn-admin" href="{{ route('adminOferta.index') }}">Oferta </a>
                  </span>
                  <span>
                    <a class="btn btn-admin" href="{{ route('pagos.index') }}">Pagos</a>
                  </span>
                  <span>
                    <a class="btn btn-admin" href="{{ route('usuarios.index') }}">Usuarios</a>
                  </span>
                  <span>
                    <a class="btn btn-admin" href="{{ route('monedas.index') }}">Monedas </a>
                  </span>
                  <span>
                    <a class="btn btn-admin" href="{{ route('novedad.index') }}">Novedades </a>
                  </span>
                  <span>
                    <a class="btn btn-admin" href="{{ route('marcas.index') }}">Marcas </a>
                  </span>
                  <span>
                    <a class="btn btn-admin" href="{{ route('chiptuning.index') }}">Chiptuning</a>
                  </span>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection