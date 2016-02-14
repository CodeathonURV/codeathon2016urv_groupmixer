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
                <div class="row">
                    <div class="span12">
                        <div class="widget widget-table action-table">
                            <div class="widget-header"><i class="icon-th-list"></i>
                                <h3>Listado de profesores</h3>
                            </div>
                            <div class="widget-content">
                                <div style="padding: 1em;;">
                                    {!! link_to_route('index','Volver a inicio',[],['class'=>'btn btn-warning']) !!}
                                </div>
                                @include('lists.teacher.main_table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection