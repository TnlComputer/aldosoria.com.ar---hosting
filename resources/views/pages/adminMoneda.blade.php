@extends('layouts.app', ['page' => __('Dashboard - Monedas'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="card">
  <div class="m-3">
    <!-- <span class="m-3">
      <a href="{{ route('dashboard') }}"><Button class="btn"> Administración</Button></a>
    </span> -->
    <span class="m-3">
      <a href="{{ route('monedas.create') }}" class="btn">NUEVA MONEDA</a>
    </span>
  </div>
  <div class="row mx-2 justify-content-center  text-center">
    <div class="col-md-12 mt-3">
      <table class="col-md-12">
        <tr>
          <td class="text-center bg-light" 12px">
          </td>
          <td class="text-center bg-light"></td>
          <td class="text-left bg-light"><strong>Moneda</strong></td>
          <td class="text-left bg-light"><strong>Simbolo</strong></td>
          <td class="text-left bg-light"><strong>Nombre</strong></td>
          <td class="text-left bg-light"><strong>Pais</strong></td>
          <td class="text-left bg-light"><strong>Cambio</strong></td>
          <!-- <td class="text-center bg-light"></td> -->
        </tr>
        @foreach ($monedas as $moneda)
        <tr class="text-light">
          <td>
            <form action="{{ route('monedas.edit', $moneda->id) }}" method="get">
              @csrf
              <input class=" align-middle" type="image" src="{{ asset('black/img/reply.gif') }}" alt="Editar" title="Editar {{ $moneda->id }}" />
            </form>
          </td>
          <td class="text-center"></td>
          <td class="text-left">{{ $moneda->moneda }}</td>
          <td class="text-left">{{ $moneda->simbolo }}</td>
          <td class="text-left">{{ $moneda->name }}</td>
          <td class="text-left">{{ $moneda->pais }}</td>
          <td class="text-left">{{ $moneda->cambio }}</td>
          <!-- <td class="text-center">
            <form action="{{ route('monedas.destroy', $moneda->id) }}" method="post" class="formEliminar">
              @csrf
              @method('DELETE') <input type="hidden" name="monedaId" <input class=" align-middle" type="image" src="{{ asset('black/img/borrar.gif') }}" alt="borrar" title="Borrar  {{ $moneda->id }}" />
            </form>
          </td> -->
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection