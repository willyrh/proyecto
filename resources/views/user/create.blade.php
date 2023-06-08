@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Crear producto</h1>
            <a href="{{route('users.index')}}" class="btn btn-primary">Index</a>

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



            <form action="{{route('users.store')}}" method="post">
                @csrf



              


                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                    </label>
                </div>


                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="email">
                    </label>
                </div>
                <div class="form-group">
                    <label for="email">password</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="password">
                    </label>
                </div>
                <label for="email">Rol</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" value="usuario">
                    <label class="form-check-label" for="usuario">usuario</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol"  value="administrador">
                    <label class="form-check-label" for="administrador">administrador</label>
                </div>


                <input type="submit" value="Crear" class="btn btn-success">
            </form>





        </div>
    </div>
</div>
@endsection