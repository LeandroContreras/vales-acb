@extends('layouts.app')

@section('content')
<style>
    .btn.btn-primary {
    background-color: blue; /* color de fondo */
    color: white; /* color de texto */
    border: none; /* quita borde */
    padding: 0.5em 1em; /* espaciado */
    font-size: 16px; /* tamaño de texto */
    border-radius: 5px; /* redondeo de bordes */
    text-transform: uppercase; /* convierte a mayúsculas */
    transition: all 0.2s ease-in-out; /* animación suave al hacer hover */
    }
    .btn.btn-primary:hover {
    background-color: rgb(205, 238, 16); /* color de fondo al hacer hover */
    cursor: pointer; /* cursor en forma de mano */
    }
</style>
<div class="container" style="background-color: rgb(255, 255, 255); width:3000px; height:1000px; position:relative; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
    <div class="row justify-content-center" style="justify-content:center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(0,45,95); width:500px; height:450px; text-align:center; border-radius:20px; position:absolute; top:30%; left:50%; transform:translate(-50%, -50%)">
                <div class="card-header" style="color:white; font-size:25px">{{ __('Acceder') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3" >
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="font-size:20px; color:white; ">{{ __('Usuario') }}</label>

                            <div class="col-md-6" style="width:500px; height:50px">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" >
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="font-size: 20px; color:white">{{ __('Password') }}</label>

                            <div class="col-md-6" style="width:500px; height:50px">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-0" style="text-align: center">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
