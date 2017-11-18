@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                {{-- <form class="form-horizontal" action="/productos" method="post"> --}}
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
                    <form class="form-horizontal" action="{{ route('productos.update', ['producto' => $producto->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="producto_nombre">Nombre</label>
                            <input type="text" name="nombre" id="producto_nombre" class="form-control" value="{{ $producto->nombre }}">
                        </div>
                        <div class="form-group">
                            <label for="producto_precio">Precio</label>
                            <input type="number" step="0.01" name="precio" id="producto_precio" class="form-control" value="{{ $producto->precio }}">
                        </div>
                        <div class="form-group">
                            <label for="producto_descripcion">Descripcion</label>
                            <textarea name="descripcion" id="producto_descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <label for="producto_imagen">Imágen</label>
                                    <input type="file" name="imagen">
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <img src="{{ asset($producto->imagen) }}" alt="Sin imágen" class="img-responsive" width="100px" height="100%">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Actualizar producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
