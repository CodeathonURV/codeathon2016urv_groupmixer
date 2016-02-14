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
                    <th> Grupo</th>

                    <th> Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td> {{ $request->groupFrom->name}}</td>


                        <td style="text-align: center;">
                            <a onclick="executeChange({{$request->id}});" href="#" role="button"
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
</div>

@push('js')
<script>

    function executeChange(requestId) {
        $.ajax({
            data: {
                request_id: requestId
            },
            url: '/execute_group',
            type: 'post',
            beforeSend: function () {
                //$("#resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                /* if (typeof response !== "undefined") {
                 $('#myModal .modal-body').html(response);
                 $('#myModal').modal('toggle');
                 }*/
            }
        });
    }
</script>