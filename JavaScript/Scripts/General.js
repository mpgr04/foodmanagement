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
    $("#btn_AddChild").click(function () {

        JLGF.CSDialog("#dialog_AddChild", "Add Child", false);
    });
    $("#link_refreshPage").click(function () {

        window.location.reload();

    });
    $("#link_updateChildState").click(function () {

        debugger;


        var submitObject = Object
        var checkedElements = [];
        var uncheckedElements = [];

        for (let i = 0; i < document.getElementsByClassName("switch").length; i++) {

            let currentSwitch = document.getElementsByClassName("switch")[i].children[0].children[0]


            if ($(currentSwitch).is(":checked")) {

                let childname = document.getElementsByClassName("switch")[i].parentElement.children[0].innerHTML;
                let childNameSeperated = childname.split(" ");
                let firstname = childNameSeperated[0];
                let lastname = childNameSeperated[1];
                let loopCounter = i.toString();
                var checkedChild = { firstname: firstname, lastname: lastname };
                checkedElements.push(checkedChild);
            }
            else {
                let childname = document.getElementsByClassName("switch")[i].parentElement.children[0].innerHTML;
                let childNameSeperated = childname.split(" ");
                let firstname = childNameSeperated[0];
                let lastname = childNameSeperated[1];
                var uncheckedChild = { firstname: firstname, lastname: lastname };
                uncheckedElements.push(uncheckedChild);
            }


        }
        submitObject.CheckedChilds = checkedElements;
        submitObject.UncheckedChilds = uncheckedElements;

        let rf = function () {
            window.location.reload();
        };

        JLGF.Ajax(submitObject, "http://foodmanagement.naxant.at/experimental/PHPScripts/UpdateChildState.php", true, rf);

    });
    //#enderegion

});
//#endregion

