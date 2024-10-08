$(document).ready(function() {
    $('#pagetable').DataTable({
        "pageLength": 10,   
        "ordering": true,   
        "searching": true,
        "lengthChange": true,
        "createdRow": function(row, data, dataIndex) {
            $('td', row).css('text-align', 'center');
            $('th', row).css('text-align', 'center');
        }
    });
});
