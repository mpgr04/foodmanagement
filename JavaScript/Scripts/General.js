//#region Globals


//#endregion


//#region Functions


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
    });

    //#endregion
    //#endregion

    //#region Execute
    $("#link_openUserActionsMenu").click(function () {

        JLGF.CreateMenu("menu_userActionss");
    });
    $("#link_updateChildState").click(function () {

    });
    $("#btn_AddChild").click(function () {

        JLGF.CSDialog("#dialog_AddChild", "Add Child");
    });
    //#enderegion

});
//#endregion

