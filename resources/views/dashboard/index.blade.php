@extends('layout.master')
@push('css')
{!! Html::style('assets/css/plans.css') !!}
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
                                <div class="pricing-plans plans-4">
                                    @foreach($sections as $section)
                                        @include('dashboard.components.index.row_component',['section'=>$section])
                                    @endforeach
                                </div>
                                <div class="pricing-plans plans-1">
                                    @include('dashboard.components.index.petitions',['requests'=>$requests])
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
