<div class="row">
    <div class="span12">
        <div class="widget ">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Paso 1</h3>
            </div>
            <div class="widget-content">
                <div class="tabbable">
                    {!! Form::open() !!}
                    <div>
                        <h3 class="text-center">Seleccione que desea</h3>
                        <br>
                        <div class="">
                            <table class="text-center button_selector_table">
                                <tr>
                                    <td>
                                        <a id="file_upload" class="btn-resize btn btn-large btn-inverse" href="#">
                                            <i class=" icon-upload-alt"></i><br>Importar fichero
                                        </a></td>
                                    <td>
                                        <a hidden id="paste_table" class="btn-resize btn btn-large btn-inverse"
                                           href="#">
                                            <i class="icon-paste"></i><br>Pegar tabla
                                        </a>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div class="text-center" hidden>
                            {!! Form::textarea('table_row',null,['class'=>'table_row','id'=>'table_row']) !!}
                        </div>
                        <br>
                        <div class="control-group text-center">
                            <h6 class="bigstats"></h6>
                            {!! Form::submit('Siguiente paso',['class'=>'btn btn-success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<input name="file" class="hidden" type="file" id="file_hidden">


@push('js')
{!! Html::script('assets/js/jquery-1.7.2.min.js') !!}
<script>
    $(document).ready(function () {
        $('#file_upload').click(function (e) {
            e.preventDefault();
            $('#file_hidden').click();
        });

        $('#paste_table').click(function (e) {
            e.preventDefault();
            console.log('a');
            $('#table_row').parent('div').slideToggle();

        });

        var files;

        $('input[type=file]').on('change', prepareUpload);

        function prepareUpload(event) {
            files = event.target.files;
            uploadFiles(event);
        }

        $('form').on('submit', uploadFiles);

        function uploadFiles(event) {
            event.stopPropagation(); // Stop stuff happening
            event.preventDefault(); // Totally stop stuff happening

            var data = new FormData();
            $.each(files, function (key, value) {
                data.append(key, value);
            });

            $.ajax({
                url: '{{route('file_upload')}}',
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    if (typeof data.error === 'undefined') {
                        // Success so call function to process the form
                        submitForm(event, data);
                    }
                    else {
                        // Handle errors here
                        console.log('ERRORS: ' + data.error);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle errors here
                    console.log('ERRORS: ' + textStatus);
                    // STOP LOADING SPINNER
                }
            });
        }


    });

    function checkFileExtension(filename) {
        var extension = filename.substr((filename.lastIndexOf('.') + 1));
        switch (extension) {
            case 'jpg':
            case 'png':
            case 'gif':
                alert('was jpg png gif');  // There's was a typo in the example where
                break;                         // the alert ended with pdf instead of gif.
            case 'zip':
            case 'rar':
                alert('was zip rar');
                break;
            case 'pdf':
                alert('was pdf');
                break;
            default:
                alert('who knows');
        }
    }

</script>@endpush
