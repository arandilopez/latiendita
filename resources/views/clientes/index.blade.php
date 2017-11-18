@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <a href="{{ route('clientes.create') }}" class="btn btn-primary">
                    Nuevo cliente
                </a>
                <form class="form-inline pull-right" action="{{route('clientes.index')}}" method="get">
                    <input type="text" name="search" class="form-control">
                    <button type="submit" class="btn btn-info">Buscar</button>
                    @if (\Request::has('search'))
                        <a href="{{route('clientes.index')}}">Limpiar busqueda</a>
                    @endif
                </form>
                <table class="table">
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
                        {{-- Esto es un comentario blade, no de html ni php --}}
                        @forelse ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->telefono or 'Sin telefono'}}</td>
                                <td>
                                    <a href="{{ route('clientes.show', ['cliente' => $cliente->id]) }}">Ver</a>
                                    <a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center;"> (No hay clientes) </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('customScripts')
    @parent
    <script type="text/javascript">
        $('form').on('submit', function (e) {
            swal('Seguro', function (result) {
                if (result) {
                    $(this).submit();
                }
            })
        })
    </script>
@endsection --}}
