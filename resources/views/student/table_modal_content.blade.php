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
        alert(groupSelect);
    });
</script>