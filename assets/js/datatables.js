$(document).ready(function() {

    var table = $('#data_table').DataTable({
        responsive: true,
        select: true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }]
    });
    $('#data_table tbody').on( 'click', 'tr', function() {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    // Plugin data table
    $.fn.dataTable.Api.register('column().data().sum()', function() {
        return this.reduce(function(a, b) {
            var x = parseFloat(a) || 0;
            var y = parseFloat(b) || 0;
            return x + y;
        });
    });

});
