//#region Globals


//#endregion


//#region Functions

function ShowAddChildDialog() {

    JLGF.CSDialog("#dialog_AddChild");

}
//#endregion


//#region Execute

$(document).ready(function () {

    //#region Init
    //#region DataTables
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
    //#endregion

    //#region Execute
    $("#link_openUserActionsMenu").click(function () {

        JLGF.CreateMenu("CreateMenu");
    });
    $("#link_updateChildState").click(function () {
        //data object, url, isasync
        JLGF.Ajax
        // Needs parenting
    });
    //#enderegion

});
//#endregion

