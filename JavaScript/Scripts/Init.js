//#region DataTables


$(document).ready(function () {

    $("#ResView_OverviewTable").DataTable({
        "lengthChange": false,
        "responsive": true,
        "paging": false,
        "bInfo": false,
        "select": true
    });
    $("#table_DCH").DataTable({
        "lengthChange": false,
        "responsive": true,
        "paging": false,
        "bInfo": false
    });
    $("#parentTable").DataTable({
        "lengthChange": false,
        "responsive": true,
        "paging": false,
        "bInfo": false
    });
    $("#select_parents").material_select();




});


//#endregion1