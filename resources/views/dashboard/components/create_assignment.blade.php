<div class="row">
    <div class="span12">
        <div class="widget ">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Paso 1</h3>
            </div>
            <div class="widget-content">
                <div class="tabbable">
                    {!! Form::open(['route'=>'save_step_1','enctype'=>'multipart/form-data']) !!}
                    <div>
                        <h3 class="text-center">Seleccione que desea</h3>
                        <br>
                        <div class="">
                            <table class="text-center button_selector_table">
                                <tr>
                                    <td>
                                        <a id="file_upload" class="btn-resize btn btn-large btn-inverse" href="#">
                                            <i class=" icon-upload-alt"></i><br>Importar fichero
                                        </a>
                                        <p class="help-block text-danger">
                                            <strong>{{ $errors->first('file') }}</strong></p>
                                    </td>
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
                    <input name="file" class="hidden" type="file" id="file_excel">

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')
<script>
    $(document).ready(function () {
        $('#file_upload').click(function (e) {
            e.preventDefault();
            $('#file_excel').click();
        });

        $('#paste_table').click(function (e) {
            e.preventDefault();
            $('#table_row').parent('div').slideToggle();
        });
    });

</script>
@endpush
