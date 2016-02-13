<div class="account-container register">
    <div class="content clearfix">

        {!! Form::open(array('route' =>'register.save')) !!}
        <div class="login-fields ">
            <div class="field ">
                {!! Form::label('subject','Asignatura') !!}
                {!! Form::text('subject','',['id'=>'subject','placeholder'=>'Asignatura','class'=>'login']) !!}
                <p class="help-block text-danger"><strong>{{ $errors->first('subject') }}</strong></p>
            </div>

            <div class="field ">
                {!! Form::label('number_groups','Numero de grupos') !!}
                {!! Form::number('number_groups','',['min'=>Config::get('formatter.minGroups'),'max'=>Config::get('formatter.maxGroups'),'id'=>'number_groups','placeholder'=>'Numero de grupos','class'=>'login']) !!}
                <p class="help-block text-danger"><strong>{{ $errors->first('number_groups') }}</strong>
                </p>
            </div>

            <div class="field ">
                {!! Form::label('dni','Nombrar') !!}
                {!! Form::text('dni','',['id'=>'dni','placeholder'=>'DNI','class'=>'login']) !!}
                <p class="help-block text-danger"><strong>{{ $errors->first('dni') }}</strong></p>
            </div>

            <div class="field ">
                {!! Form::label('email','Email') !!}
                {!! Form::email('email','',['id'=>'email','placeholder'=>'Email','class'=>'login']) !!}
                <p class="help-block text-danger"><strong>{{ $errors->first('email') }}</strong></p>
            </div>

            <div class="field ">
                {!! Form::label('password','Contraseña') !!}
                {!! Form::password('password',['id'=>'password','placeholder'=>'Contraseña','class'=>'login']) !!}
                <p class="help-block text-danger"><strong>{{ $errors->first('password') }}</strong>
                </p>
            </div>

            <div class="field ">
                {!! Form::label('password_confirmation','Rep. contraseña') !!}
                {!! Form::password('password_confirmation',['id'=>'password_confirmation','placeholder'=>'Rep. contraseña','class'=>'login']) !!}
                <p class="help-block text-danger">
                    <strong>{{ $errors->first('password_confirmation') }}</strong></p>
            </div>


        </div>
        {!! Form::close() !!}
    </div>
</div>

@push('js')
{!! Html::script('assets/js/jquery-1.7.2.min.js') !!}
<script>
    $(document).ready(function () {
        $('#number_groups').change(function () {
            var numberOfGroups = $(this).val();
            $("table.table_groups tbody tr").hide()
            if (numberOfGroups > 0) {
                $("table.table_groups tbody tr").slice(0, numberOfGroups).show();

            }


        });


    });

</script>
@endpush