<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th> Nombre</th>
        <th> Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($teachers as $teacherId => $teacher)

        <tr>
            <td> {{$teacher->name }}</td>
            <td>
                <a target="_blank" href="mailto:{{$teacher->email }}"> {{$teacher->email }}</a>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>