@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-body">
                    <h3>{{ $cliente->nombre }}</h3>
                    <a href="{{ route('clientes.index') }}">&laquo; Regresar</a>
                    <form action="{{ route('clientes.destroy', ['cliente' => $cliente->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">
                            Eliminar este cliente
                        </button>
                    </form>
                    <p>
                        <strong>Email:</strong> {{ $cliente->email }}
                        <br>
                        <strong>Teléfono:</strong> {{ $cliente->telefono }}
                        <br>
                        <strong>Dirección:</strong> {{ $cliente->direccion }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
