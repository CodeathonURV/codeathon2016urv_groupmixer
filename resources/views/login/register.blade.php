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
                            {{link_to_route('login.create','¿Ya tienes una cuenta? Entra!')}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-container register">
        <div class="content clearfix">

            {!! Form::open(array('route' =>'register.save')) !!}
            <h1>Registrate!</h1>
            <div class="login-fields ">
                <div class="field ">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name','',['id'=>'name','placeholder'=>'Nombre','class'=>'login']) !!}
                    <p class="help-block text-danger"><strong>{{ $errors->first('name') }}</strong></p>
                </div>

                <div class="field ">
                    {!! Form::label('surnames','Apellidos') !!}
                    {!! Form::text('surnames','',['id'=>'surnames','placeholder'=>'Apellidos','class'=>'login']) !!}
                    <p class="help-block text-danger"><strong>{{ $errors->first('surnames') }}</strong></p>
                </div>

                <div class="field ">
                    {!! Form::label('dni','DNI') !!}
                    {!! Form::text('dni','',['id'=>'dni','placeholder'=>'DNI','class'=>'login']) !!}
                    <p class="help-block text-danger"><strong>{{ $errors->first('dni') }}</strong></p>
                </div>

                <div class="field ">
                    {!! Form::label('email','Email') !!}
                    {!! Form::email('email','',['id'=>'email','placeholder'=>'Email','class'=>'login']) !!}
                    <p class="help-block text-danger"><strong>{{ $errors->first('email') }}</strong></p>
                </div>

                <div class="field ">
                    {!! Form::label('password','Contraseña') !!}
                    {!! Form::password('password',['id'=>'password','placeholder'=>'Contraseña','class'=>'login']) !!}
                    <p class="help-block text-danger"><strong>{{ $errors->first('password') }}</strong></p>
                </div>

                <div class="field ">
                    {!! Form::label('password_confirmation','Rep. contraseña') !!}
                    {!! Form::password('password_confirmation',['id'=>'password_confirmation','placeholder'=>'Rep. contraseña','class'=>'login']) !!}
                    <p class="help-block text-danger"><strong>{{ $errors->first('password_confirmation') }}</strong></p>
                </div>

                <div class="field ">
                    {!! Form::label('user_type','Tipo de usuario') !!}
                    {!! Form::select('user_type',$roles,'',['id'=>'rep_password','class'=>'login']) !!}
                    <p class="help-block text-danger"><strong>{{ $errors->first('user_type') }}</strong></p>
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