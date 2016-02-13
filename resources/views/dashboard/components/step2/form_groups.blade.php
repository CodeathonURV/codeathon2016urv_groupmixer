<div class="account-container">
    <div class="content clearfix">

        {!! Form::open(array('route' =>'register.save')) !!}
        <div class="step2-fields ">
            <div class="field ">
                {!! Form::label('subject','Asignatura',['class'=>'main_label']) !!}
                {!! Form::text('subject','',['id'=>'subject','placeholder'=>'Asignatura','class'=>'login']) !!}
                <p class="help-block text-danger">
                    <strong>{{ $errors->first('subject') }}</strong></p>
            </div>
            <br>

            <div class="field ">
                {!! Form::label('number_groups','Numero de grupos',['class'=>'main_label']) !!}
                {!! Form::number('number_groups','',['min'=>Config::get('formatter.minGroups'),'max'=>Config::get('formatter.maxGroups'),'id'=>'number_groups','placeholder'=>'Numero de grupos','class'=>'login']) !!}
                <p class="help-block text-danger">
                    <strong>{{ $errors->first('number_groups') }}</strong>
                </p>
            </div>
            <br>

            <div class="field ">
                {!! Form::label('assignment_type','Tipo asignación',['class'=>'main_label']) !!}
                <label class="radio inline">
                    <input type="radio" name="assignment_type" checked> Lista en blanco
                </label>
                <br>
                <label class="radio inline">
                    <input type="radio" name="assignment_type"> Orden alfabetico
                </label>
                <br>
                <label class="radio inline">
                    <input type="radio" name="assignment_type"> Asignación aleatoria
                </label>
                <br>
                <p class="help-block text-danger">
                    <strong>{{ $errors->first('email') }}</strong></p>
            </div>
            <br>


            <div class="field ">
                {!! Form::label('allow_group_changes','Permitir cambios de grupos',['class'=>'main_label']) !!}
                <label class="radio inline">
                    <input type="radio" value="0" name="allow_group_changes" checked> No
                </label>
                <label class="radio inline">
                    <input type="radio" value="1" name="allow_group_changes"> Si
                </label>

                <br>
                <p class="help-block text-danger">
                    <strong>{{ $errors->first('email') }}</strong></p>
            </div>
            <br>
            <div class="field " hidden id="allow_type">
                {!! Form::label('assignment_type','Tipo asignación',['class'=>'main_label']) !!}


                <label class="radio inline">
                    <input type="radio" disabled name="assignment_type"> Lista en blanco
                    <input type="text" class="allow_type_range">
                </label>
                <br>
                <label class="radio inline">
                    <input type="radio" disabled name="assignment_type"> Orden alfabetico
                </label>
                <br>
                <label class="radio inline">
                    <input type="radio" disabled name="assignment_type"> Asignación aleatoria
                </label>
                <br>
                <p class="help-block text-danger">
                    <strong>{{ $errors->first('email') }}</strong></p>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


@push('js')
<script>
    $(document).ready(function () {

        $('#number_groups').change(function () {
            var numberOfGroups = $(this).val();
            $("table.table_groups tbody tr").hide();
            if (numberOfGroups > 0) {
                $("table.table_groups tbody tr").slice(0, numberOfGroups).show();
            }

        });

        $("input:radio[name='allow_group_changes']").click(function () {
            var value = parseInt($(this).val());
            if (value === 0) {
                $('#allow_type').slideUp();
                $('#allow_type input').attr('disabled', 'disabled');
            } else {
                $('#allow_type input').removeAttr('disabled');
                $('#allow_type').slideDown();

            }

        });


    });

</script>
@endpush