<div class="plan-container ">
    <div class="plan green ">
        <div class="plan-header">
            <div class="plan-price plan-small">
                <i class="mdi">Asignaciones</i>
            </div>
        </div>
        <div class="plan-actions">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th> Asignatura</th>
                    <th> Coordinador</th>
                    <th> Grupo</th>
                    <th> Profesor titular</th>
                    <th> Acción</th>
                </tr>
                </thead>
                <tbody>


                @foreach ($assignments as $group)
                    <tr>
                        <td> {{ $group->assignment->name}}</td>
                        <td> {{$group->coordinator->name}}</td>
                        <td> {{$group->name}}</td>
                        <td> {{$group->assignment->teacher->name}}</td>

                        <td style="text-align: center;">
                            <a onclick="changeGroup({{$group->id}},{{$group->assignment->id}});" href="#" role="button"
                               class="btn btn-warning"
                               data-toggle="modal">
                                Cambiar
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @include('student.change_modal')
</div>

@push('js')
<script>
    function changeGroup(groupId, assignmentId) {
        $('#message_request_ok').addClass('hidden');
        console.log($('#message_request_ok'));
        $.ajax({
            data: {
                group_id: groupId,
                assigment_id: assignmentId
            },
            url: '/get_user_groups',
            type: 'post',
            beforeSend: function () {
                //$("#resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                if (typeof response !== "undefined") {
                    $('#myModal .modal-body').html(response);
                    $('#myModal').modal('toggle');
                }
            }
        });

    }

</script>
@endpush