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

    function formatDate(dateString) {
        console.log("Original date string:", dateString);
        const date = new Date(dateString);
        
        if (isNaN(date.getTime())) {
            console.error("Invalid date value:", dateString);
            return dateString;
        }
        
        return date.toISOString().split('T')[0];
    }

    $('#exportButton').click(function(e) {
        e.preventDefault();
        
        var table = document.getElementById('pagetable');
        var sheetName = $(table).data('sheet-name') || "Sheet1";
        var fileName = $(table).data('file-name') || "data.xlsx";

        const rows = Array.from(table.rows);
        const formattedData = rows.map((row, index) => {
            const cells = Array.from(row.cells).map(cell => {
                if (index === 0) {
                    return cell.innerText;
                } else {
                    if (cell.cellIndex === 2) {
                        return formatDate(cell.innerText);
                    }
                    return cell.innerText;
                }
            });
            return cells;
        });

        const ws = XLSX.utils.aoa_to_sheet(formattedData);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, ws, sheetName);
        
        XLSX.writeFile(workbook, fileName);
    });
});
