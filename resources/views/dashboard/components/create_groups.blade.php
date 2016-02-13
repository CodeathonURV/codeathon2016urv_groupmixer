<div class="row">
    <div class="span12">
        <div class="widget ">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Paso 2</h3>
            </div>
            <div class="widget-content">
                <div class="tabbable">
                    <div class="span4">
                        @include('dashboard.components.step2.form_groups')
                    </div>
                    <div class="span7">
                        @include('dashboard.components.step2.groups_table')
                    </div>

                </div>
                <div class="control-group text-center">
                    <h6 class="bigstats"></h6>
                    {!! Form::submit('Siguiente paso',['class'=>'btn btn-success']) !!}
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
            $('#file_hidden').click();
        });

        $('#paste_table').click(function (e) {
            e.preventDefault();
            $('#table_row').parent('div').slideToggle();
        });
    });

</script>@endpush
