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
                                <h3>Resumen</h3>
                            </div>
                            <div class="widget-content">

                                @include('lists.teacher.main_table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection