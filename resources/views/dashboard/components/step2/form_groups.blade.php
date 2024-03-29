<div class="account-container">
    <div class="content clearfix">

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
                {!! Form::number('number_groups',Config::get('formatter.minGroups'),['min'=>Config::get('formatter.minGroups'),'max'=>Config::get('formatter.maxGroups'),'id'=>'number_groups','placeholder'=>'Numero de grupos','class'=>'login']) !!}
                <p class="help-block text-danger">
                    <strong>{{ $errors->first('number_groups') }}</strong>
                </p>
            </div>
            <br>

            <div class="field ">
                {!! Form::label('assignment_type','Tipo asignación',['class'=>'main_label']) !!}

                <label class="radio inline">
                    <input value="2" type="radio" name="assignment_type" checked> Asignación aleatoria
                </label>
                <br>
                <label class="radio inline">
                    <input value="1" type="radio" name="assignment_type"> Orden alfabetico
                </label>
                <br>
                <p class="help-block text-danger">
                    <strong>{{ $errors->first('assignment_type') }}</strong></p>
            </div>
            <br>

            <?php
            $yesChecked = 'checked';
            $noChecked = '';
            ?>
            @if(!$errors->has('change_type'))
                <?php
                $yesChecked = '';
                $noChecked = 'checked';
                ?>
            @endif
            <div class="field ">
                {!! Form::label('allow_group_changes','Permitir cambios de grupos',['class'=>'main_label']) !!}
                <label class="radio inline">
                    <input type="radio" value="0" name="allow_group_changes" {{$noChecked}}> No
                </label>
                <label class="radio inline">
                    <input type="radio" value="1" name="allow_group_changes" {{$yesChecked}}> Si
                </label>

                <br>
                <p class="help-block text-danger">
                    <strong>{{ $errors->first('allow_group_changes') }}</strong></p>
            </div>

        </div>
    </div>
</div>


@push('js')
{!! Html::script('assets/js/bootstrap_slider.js') !!}
{!! Html::script('assets/js/step2.js') !!}
<script>

</script>
@endpush