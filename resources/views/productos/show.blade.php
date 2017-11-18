@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="row">
                    <div class="col-md-6 col-sm-8">
                        <h3>{{ $producto->nombre }}</h3>
                        <a href="{{ route('productos.index') }}">&laquo; Regresar</a>
                        <form action="{{ route('productos.destroy', ['producto' => $producto->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">
                                Eliminar este producto
                            </button>
                        </form>
                        <p>
                            Precio: ${{ $producto->precio }} pesos
                        </p>
                        <p>
                            {{ $producto->descripcion }}
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-4">
                        @if ($producto->imagen)
                            <img src="{{ asset($producto->imagen) }}" alt="Sin imágen" width="250px" height="100%" class="img-responsive">
                        @else
                                <img src="{{ asset('imagenes/no_image_to_show.jpg') }}" alt="" class="img-responsive">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
