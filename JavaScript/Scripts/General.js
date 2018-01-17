//#region Globals


//#endregion


//#region Functions


//#endregion


//#region Execute

$(document).ready(function () {

    //#region Execute
    $("#link_openUserActionsMenu").click(function () {

        JLGF.CreateMenu("menu_userActionss");
    });
    $("#link_updateChildState").click(function () {

    });
    $("#btn_AddChild").click(function () {

        JLGF.CSDialog("#dialog_AddChild", "Add Child", false);
    });
    $("#link_refreshPage").click(function () {

        window.location.reload();

    });
    $("#link_updateChildState").click(function () {

        $("input:checkbox[name=type]:checked").each(function () {
            //Push push
        });

    });
    //#enderegion

});
//#endregion

