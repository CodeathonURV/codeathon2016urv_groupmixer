@extends('layout.master')
@push('css')
{!! Html::style('assets/css/dashboard.css') !!}
{!! Html::style('assets/css/plans.css') !!}
@endpush
@section('title', 'Index')

@section('body')
    @include('layout.menu')
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
                                <div class="pricing-plans plans-1">
                                    @include('student.assignments',['assignments'=>$userAssignment])
                                </div>
                                <div class="pricing-plans plans-1">

                                    @include('student.requests',['requests'=>$requests])
                                </div>
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
