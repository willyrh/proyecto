@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Crear reseña</h1>
            <a href="{{route('proyects.index')}}" class="btn btn-primary">Index</a>

            <hr>
            @if($errors->any())
            <div class="alert alert-danger">
                <h4>Por favor, corrige los siguientes errores:</h4>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}<br></li>
                    @endforeach
                </ul>
            </div>
            @endif



            <form action="{{route('resenyas.store')}}" method="post" enctype="multipart/form-data" id="formulariocrearvideojuegos">
                @csrf

                <div class="row align-self-center">
                    <div class="col col-md-4 mb-8 ">
                        <div class="form-outline">
                            <label class="form-label" for="formtitulo">Titulo</label>
                            <input type="text" id="form3Example1" class="form-control  bordesredondeados " name="titulo" />
                        </div>
                    </div>
                </div>
                <div class=" mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="formcont">Contenido</label>
                        <input type="text" id="form3Example2" class="form-control bordesredondeados" name="contenido" />

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-4">
                    <div class="form-outline">
                    <label class="form-label" for="formpuntuacion">Puntuacion</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="puntuacion">

                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Imagen reseña</label>
                            <input class="form-control" type="file" name="imagen">
                        </div>

                    </div>
                </div>
                <input type="submit" value="Crear" class="btn btn-success">
            </form>

        </div>
    </div>
</div>
@endsection