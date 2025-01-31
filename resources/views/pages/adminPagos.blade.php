@extends('layouts.app', ['page' => __('Dashboard Pagos'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="card">
  <div class="m-3">
    <span class="m-3">
      <a href="{{ route('pagos.create') }}" class="btn">NUEVO PAGO CURSO</a>
    </span>
    {{--     
      <span class="m-3">
        <a href="{{ route('test.index') }}" class="btn">Test</a>
      </span> 
    --}}
  </div>
  <div class="row mx-2 justify-content-center  text-center">
    <div class="col-md-12 mt-3">
      <div class="row justify-content-start">
        <livewire:CursoUserPagos />
      </div>
    </div>
  </div>
  <div class="px-4 py-4">
  </div>
</div>
</div>
</div>
@endsection