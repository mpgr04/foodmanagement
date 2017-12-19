//#region Globals


//#endregion


//#region Functions


//#endregion


//#region Execute

$(document).ready(function () {

    //#region Init

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

