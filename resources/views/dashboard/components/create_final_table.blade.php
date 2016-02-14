<div class="row">

    <div class="span12">

        <div class="widget ">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Paso 3</h3>
            </div>
            {!! Form::open(array('route' =>'save_step_2')) !!}

            <div class="widget-content">
                <div class="alert alert-success text-center">
                    <h2><strong>Los grupos se han generado con éxito!</strong></h2>
                </div>
                <br>
                <div class="tabbable">
                    @include('dashboard.components.step3.table')
                </div>
                -
                <div class="control-group text-center">
                    <h6 class="bigstats"></h6>
                    {!! link_to_route('index','Volver a Inicio',[],['class'=>'btn btn-success']) !!}

                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
