@extends('layout.master')
@push('css')
{!! Html::style('assets/css/signin.css') !!}
@endpush
@section('title', 'Index')

@section('body')
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="index.html">
                    Class-Manager
                </a>
                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li>
                            {{link_to_route('register.create','Registrarte!')}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-container">
        <div class="content clearfix">

            {!! Form::open(array(  'route' =>'login.save')) !!}
            <h1>Iniciar sesión</h1>
            <div class="login-fields ">
                <div class="field ">
                    {!! Form::label('dni','Usuario') !!}
                    {!! Form::text('dni','',['id'=>'dni','placeholder'=>'DNI','class'=>'login dni-field','autocomplete'=>'off']) !!}
                    <p class="help-block text-danger"><strong>{{ $errors->first('dni') }}</strong></p>
                </div>
                <div class="field">
                    {!! Form::label('password','Contraseña') !!}
                    {!! Form::password('password',['id'=>'password','placeholder'=>'Contraseña','class'=>'login password-field']) !!}
                    <p class="help-block text-danger"><strong>{{ $errors->first('password') }}</strong></p>
                </div>
            </div>
            <div class="login-actions">
                {!! Form::submit('Sign In',['class'=>'button btn btn-success btn-large']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
{{--{!! Form::open(array('route' =>'login.save')) !!}

{!! Form::text('name', 'Nombre') !!}
{!! Form::text('DNI', '1111111Z') !!}
{!! Form::email('email', 'example@gmail.com') !!}
{!! Form::password('password') !!}
{!! Form::select('user_type', $roles) !!}
{!! Form::submit('Guardar') !!}
{!! Form::close() !!}--}}
