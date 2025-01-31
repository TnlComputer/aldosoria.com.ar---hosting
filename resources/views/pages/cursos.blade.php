@extends('layouts.app', ['page' => __('Cursos'), 'pageSlug' => 'cursos'])
@section('content')
<div class="card">
  <div class="card-body">
    <div class="chart-area">
      <p class="text-right mr-3 text-white">Importante... si va a comprar un curso, realice su Login o Register !!!
      </p>
      <div class="row justify-content-between mt-4 text-center">
        @foreach ($cursos as $curso)
        <div class="col-sm-12 col-md-6 pb-4 shadow-lg">
          <div class="col-lg-12">
            @if ($curso->video_demo_Uri)
            <iframe src="{{ $curso->video_demo_Uri }}" width="100%" webkitAllowFullScreen mozallowfullscreen
              allowfullscreen frameborder="1" scrolling="no"></iframe>
            @else
            <a class=""><img src="{{ asset('black/img/cursos/' . $curso->image_curso) }}"></a>
            @endif
          </div>
          <div class="col-lg-12">
            @if ($curso->coast <=1) <div class="btn btn-outline-dark btn-lg w-100">
              <h4 style="color: antiquewhite">{{ $curso->name }}</h4>
              <p style="color: antiquewhite">{{ $curso->title }}</p>
              <div <div class=" py-2 font-bold importe">LIBRE</div>
          </div>
          @else
          <form action="{{ route('cursoDetalle.show', $curso->id) }}">
            <button type="submit" class="btn btn-outline-dark btn-lg w-100" title="Click para ver Temario">
              <h4 style="color: antiquewhite">{{ $curso->name }}</h4>
              <p style="color: antiquewhite">{{ $curso->title }}</p>
              <div class=" py-2 font-bold importe">
                {{ $curso->simbolo }}
                {{ $curso->coast }}</div>
            </button>
          </form>
          @endif
        </div>
      </div>
      @endforeach
    </div>
    <div class="px-4 py-2">
      {{ $cursos->links() }}
    </div>
  </div>
</div>
</div>
@endsection