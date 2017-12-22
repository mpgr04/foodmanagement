//#region Globals


//#endregion


//#region Functions


//#endregion


//#region Execute

$(document).ready(function () {

    //#region Init
    //#region Init
    $("#ResView_OverviewTable").DataTable({
        "lengthChange": false,
        "responsive": true,
        "paging": false

    });
    //#endregion

    $("#ResView_Body").on("mousemove", function (event) {
        if (event.pageX < 50) {
            $("#ResView_SideNavActivator").sideNav("show");
        }
        else {
            $("#ResView_SideNavActivator").sideNav("hide");
        }
    });
});

//#endregion

