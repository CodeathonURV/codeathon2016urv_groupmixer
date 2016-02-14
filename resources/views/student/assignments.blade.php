<div class="plan-container ">
    <div class="plan green ">
        <div class="plan-header">
            <div class="plan-price plan-small">
                <i class="mdi">Peticiones</i>
            </div>
        </div>
        <div class="plan-actions">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th> Asignatura</th>
                    <th> Coordinador</th>
                    <th> Grupo</th>
                    <th class="td-actions"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($assignments->groups as $group)
                    {{dd($group->assignment())}}

                    <tr id="request_{{$request['id']}}">
                        <td> {{ $request['from']}}</td>
                        <td> {{$request['from_group']}}</td>
                        <td> {{$group->name}}</td>
                        <td> {{$request['subject']}}</td>
                        <td class="td-actions">
                            <a href="javascript:;" class="btn_small btn-small btn-success">
                                <i class="btn-icon-only icon-ok"> </i>
                            </a>
                            <a href="javascript:deleteAssignment({{$request['from']}});"
                               class="btn_small btn-danger btn-small">
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