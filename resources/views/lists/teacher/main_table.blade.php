<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th> Nombre</th>
        <th class="td-actions"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($teachers as $teacherId => $teacher)
        <tr>
            <td> {{$teacher }}</td>

            <td class="td-actions">
                <a href="javascript:deleteAssignment({{$teacherId}});"
                   class="btn btn-danger btn-small">
                    <i class="btn-icon-only icon-remove"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>