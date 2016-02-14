<table class="table table-striped table-bordered table_groups">
    <thead>
    <tr>
        <th> Nombre de grup</th>
        <th> Descripción/ Horario</th>
        <th> Profesor</th>
    </tr>
    </thead>
    <tbody>
    @for($i=0;$i<Config::get('formatter.maxGroups');$i++)
        <?php $hidde = ''; ?>

        @if($i>Config::get('formatter.minGroups')-1)
            <?php $hidde = 'hidden'; ?>
        @endif
        <tr {{$hidde}}>
            <td> {!! Form::text('group_name[]','Grupo '.($i+1),['id'=>'group_name[]','class'=>'login']) !!}</td>
            <td> {!! Form::text('description[]','',['id'=>'description[]','class'=>'login']) !!}</td>
            <td> {!! Form::select('teacher[]',$teachers,'',['id'=>'teacher[]','class'=>'login']) !!}</td>
        </tr>
    @endfor
    </tbody>
</table>