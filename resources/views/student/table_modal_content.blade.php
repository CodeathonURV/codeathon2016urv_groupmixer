<table class="table table-striped table-bordered">
    <tbody>
    <tr>
        <td style="text-align: center;">
            <select id="change_group_select">
                @foreach($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
        </td>
        <input class="hidden" id="group_from_id" name="group_from_id" value="{{$groupFromId}}">
        <td style="text-align: center;">
            <button id="button_change" class="btn btn-success">Pedir cambio</button>
        </td>
    </tr>
    </tbody>
</table>
@push('js')
<script>
    $('#button_change').click(function () {
        var groupSelect = $('#change_group_select').val();
        var oldGroup = $('#group_from_id').val();
        $.ajax({
            data: {
                group_from_id: oldGroup,
                group_to_id: groupSelect
            },
            url: '/change_group',
            type: 'post',
            beforeSend: function () {
                //$("#resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                $('#message_request_ok').removeClass('hidden');
                $

            }
        });
    });
</script>