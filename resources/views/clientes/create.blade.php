@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear nuevo usuario</div>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" action="{{ route('clientes.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cliente_nombre">Nombre</label>
                            <input type="text" name="nombre" id="cliente_nombre" class="form-control" value="{{ old('nombre') }}">
                        </div>
                        <div class="form-group">
                            <label for="cliente_rfc">RFC</label>
                            <input type="text" name="rfc" id="cliente_rfc" class="form-control" value="{{ old('rfc') }}">
                        </div>
                        <div class="form-group">
                            <label for="cliente_email">Email</label>
                            <input type="email" name="email" id="cliente_email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="cliente_telefono">Telefono</label>
                            <input type="text" name="telefono" id="cliente_telefono" class="form-control" value="{{ old('telefono') }}">
                        </div>
                        <div class="form-group">
                            <label for="cliente_direccion">Dirección</label>
                            <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Guardar cliente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
