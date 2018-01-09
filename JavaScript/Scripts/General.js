//#region Globals


//#endregion


//#region Functions


//#endregion


//#region Execute

$(document).ready(function () {

    //#region Init
    $("#ResView_OverviewTable").DataTable({
        "lengthChange": false,
        "responsive": true,
        "paging": false
    });
    $("#table_DCH").DataTable({
        "lengthChange": false,
        "responsive": true,
        "paging": false
    });
    $("#parentTable").DataTable({
        "lengthChange": false,
        "responsive": true,
        "paging": false
    })
    //#endregion

});

//#endregion

