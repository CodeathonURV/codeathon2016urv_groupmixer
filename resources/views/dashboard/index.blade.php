@extends('layout.master')
@push('css')
{!! Html::style('assets/css/dashboard.css') !!}
@endpush
@section('title', 'Index')

@section('body')
    @include('layout.menu')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li class="active"><a href="index.html"><i class="icon-dashboard"></i><span>Dashboard</span> </a>
                    </li>
                    <li><a href="reports.html"><i class="icon-list-alt"></i><span>Reports</span> </a></li>
                    <li><a href="guidely.html"><i class="icon-facetime-video"></i><span>App Tour</span> </a></li>
                    <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Charts</span> </a></li>
                    <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a></li>
                    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i
                                    class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="pricing.html">Pricing Plans</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                            <li><a href="error.html">404</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
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
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th> Nombre</th>
                                        <th> Nº Grupos</th>
                                        <th class="td-actions"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($assignments as $assignment)
                                        <tr id="assignment_{{$assignment->id}}">
                                            <td> {{ $assignment->name }}</td>
                                            <td> {{$assignment->groups->count()}}</td>
                                            <td class="td-actions">
                                                <a href="javascript:deleteAssignment({{$assignment->id}});"
                                                   class="btn btn-danger btn-small">
                                                    <i class="btn-icon-only icon-remove"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('js')
<script>
    function deleteAssignment(id) {
        if (confirm('¿Estas seguro de borrarlo?')) {
            $.ajax({
                data: {id: id},
                url: 'delete_assignment',
                type: 'post',
                beforeSend: function () {
                    //$("#resultado").html("Procesando, espere por favor...");
                },
                success: function (response) {
                    if (typeof response !== "undefined") {
                        $("#assignment_" + response).remove();
                    }

                }
            });
        }
    }

</script>
@endpush
