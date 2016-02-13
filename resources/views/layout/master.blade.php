<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Class Manager - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    {{-- CSS block --}}
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/bootstrap-responsive.min.css') !!}
    {!! Html::style('assets/css/font-awesome.css') !!}
    {!! Html::style('assets/css/style.css') !!}

    @stack('css')

    {{-- JS block --}}
    {!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600') !!}
</head>

@yield('body')


{!! Html::script('assets/js/jquery-1.7.2.min.js') !!}
{!! Html::script('assets/js/bootstrap.js') !!}
@stack('js')
</html>