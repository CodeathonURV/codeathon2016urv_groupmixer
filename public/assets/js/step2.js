$(document).ready(function () {
    $("#students_range").slider({});
    $('#number_groups').change(function () {
        var numberOfGroups = $(this).val();
        var tableTr = $("table.table_groups tbody tr");
        tableTr.hide();
        if (numberOfGroups > 0) {
            tableTr.slice(0, numberOfGroups).show();
        }

    });
    $("input:radio[name='allow_group_changes']").click(function () {
        var value = parseInt($(this).val());
        if (value === 0) {
            $('#allow_type').slideUp();
            $('#allow_type input').attr('disabled', 'disabled');
        } else {
            $('#allow_type input').removeAttr('disabled');
            $('#allow_type').slideDown();

        }
    });
});