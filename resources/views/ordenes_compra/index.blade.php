@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <a href="{{ route('ordenes_compra.create') }}" class="btn btn-primary">
                    Nueva Orden de Compra
                </a>
                <form class="form-inline pull-right" action="{{route('ordenes_compra.index')}}" method="get">
                    <input type="text" name="search" class="form-control">
                    <button type="submit" class="btn btn-info">Buscar</button>
                    @if (\Request::has('search'))
                        <a href="{{route('ordenes_compra.index')}}">Limpiar busqueda</a>
                    @endif
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ordenesCompra as $orden_compra)
                            <tr>
                                <td>{{ 'ODC-' . $orden_compra->id}}</td>
                                <td>{{$orden_compra->cliente->nombre}}</td>
                                <td>$ {{$orden_compra->total}}</td>
                                <td>{{$orden_compra->user->name}}</td>
                                <td>
                                    <a class="btn btn-link" href="{{ route('ordenes_compra.show', ['orden_compra' => $orden_compra->id]) }}">Ver</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center;"> (No hay ordenes_compra) </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
