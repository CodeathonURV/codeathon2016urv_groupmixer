@extends('layout.master')
@push('css')
{!! Html::style('assets/css/dashboard.css') !!}
@endpush
@section('title', 'Index')

@section('body')
    @include('layout.menu')
    <div class="subnavbar">
        <!-- /subnavbar-inner -->
    </div>
    <div class="main">

        <div class="main-inner">
            <div class="container">
                @include('dashboard.components.create_assignment')
            </div>

        </div>
    </div>

@endsection