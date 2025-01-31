@extends('layouts.app', ['page' => __('Novedades'), 'pageSlug' => 'novedades'])
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="chart-area">
        <div class="row justify-content-between text-center mt-4">
          @foreach ($novedades as $novedad)
            <div class="py-2 col-sm-12 col-md-6">
              @if ($novedad->tipo_novedad == 4)
                @php
                  if ($novedad->tipo_novedad == 1) {
                      $tipo_novedad = 'Facebook';
                      $uri_novedad = $novedad->uri_novedad;
                  }
                  if ($novedad->tipo_novedad == 2) {
                      $tipo_novedad = 'Instagram';
                      $uri_novedad = 'https://www.instagram.com/mecatronicasoria/"';
                  }
                  if ($novedad->tipo_novedad == 3) {
                      $tipo_novedad = 'Twitter';
                      $uri_novedad = 'https://twitter.com/aldosoria?lang=es"';
                  }
                  if ($novedad->tipo_novedad == 4) {
                      $tipo_novedad = 'YouTube';
                      $uri_novedad = $novedad->uri_novedad;
                  }
                @endphp
                <div class="py-2">
                  <p class=" text-left text-white">Publicado el dia {{ $novedad->fecha }} en
                    <a href="{{ $uri_novedad }}" target="blank"><strong>{{ $tipo_novedad }}</strong></a>
                  </p>
                  <p class=" text-left">{{ $novedad->novedades }} </p>
                </div>
                <div>
                  <iframe class="" src="{{ $uri_novedad }}" width="100%" frameborder="0"
                    allowfullscreen></iframe>
                </div>
              @endif
            </div>
          @endforeach
        </div>
        <div class=" px-4 py-2">
          {{ $novedades->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
