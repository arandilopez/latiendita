@extends('layouts.app')

{{-- @section('titulo', 'Listado de Productos') --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <a href="{{ route('productos.create') }}" class="btn btn-primary">
                    Nuevo producto
                </a>
                <form class="form-inline pull-right" action="{{route('productos.index')}}" method="get">
                    <input type="text" name="search" class="form-control">
                    <button type="submit" class="btn btn-info">Buscar</button>
                    @if (\Request::has('search'))
                        <a href="{{route('productos.index')}}">Limpiar busqueda</a>
                    @endif
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Esto es un comentario blade, no de html ni php --}}
                        @forelse ($productos as $prod)
                            <tr>
                                <td>{{$prod->id}}</td>
                                <td>{{$prod->nombre}}</td>
                                <td>{{$prod->precio}}</td>
                                <td>{{$prod->descripcion or 'Sin descripcion'}}</td>
                                <td>
                                    {{-- <a href="/productos/{{ $prod->id }}">Ver</a> --}}
                                    <a href="{{ route('productos.show', ['producto' => $prod->id]) }}">Ver</a>
                                    {{-- <a href="/productos/{{ $prod->id }}/edit">Editar</a> --}}
                                    <a href="{{ route('productos.edit', ['producto' => $prod->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center;"> (No hay productos) </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
