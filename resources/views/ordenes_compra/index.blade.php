@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <a href="{{ route('ordenes_compra.create') }}" class="btn btn-primary">
                    Nueva Orden de Compra
                </a>
                {{-- <form class="form-inline pull-right" action="{{route('ordenes_compra.index')}}" method="get">
                    <input type="text" name="search" class="form-control">
                    <button type="submit" class="btn btn-info">Buscar</button>
                    @if (\Request::has('search'))
                        <a href="{{route('ordenes_compra.index')}}">Limpiar busqueda</a>
                    @endif
                </form> --}}
                {{-- <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ordenes_compra as $orden_compra)
                            <tr>
                                <td>{{$orden_compra->id}}</td>
                                <td>{{$orden_compra->nombre}}</td>
                                <td>{{$orden_compra->email}}</td>
                                <td>{{$orden_compra->telefono or 'Sin telefono'}}</td>
                                <td>
                                    <a href="{{ route('ordenes_compra.show', ['orden_compra' => $orden_compra->id]) }}">Ver</a>
                                    <a href="{{ route('ordenes_compra.edit', ['orden_compra' => $orden_compra->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center;"> (No hay ordenes_compra) </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table> --}}
            </div>
        </div>
    </div>
</div>
@endsection
