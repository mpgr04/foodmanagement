(function (window) {
    "use strict"

    function defineJLGF() {

        var JLGF = {};
        JLGF.About = { CreatedBy: "Poelzl Manuel", Version: "1.0" }; /*may crash the lib, only for test purpose*/
        JLGF.Ajax = function (data, url, isAsync) {
            if (typeof (data) != "object") {
                console.log("The given type for data is not a object!");
            }
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                async: isAsync
            }).done(function (DoneFunction) {

                if (DoneFunction != null && typeof DoneFunction != "function") {
                    console.log("The paraemeter given for 'DoneFunction' is no function!");
                }
                else if (DoneFunction == null) {
                    console.log("The parameter given for 'DoneFunction' has no value!");
                }
                else if (typeof DoneFunction == "undefined") {
                    console.log("The parameter given for 'DoneFunction' is not defined");
                }
                else if (DoneFunction != null && typeof DoneFunction != "undefined0" && typeof DoneFunction == "function") {
                    DoneFunction();
                }

            });
        };
        JLGF.Show = function (element) {
            $("#" + element).show();
        };
        JLGF.Hide = function (element) {
            $("#" + element).hide();
        };
        JLGF.IsArrayOfType = function (array, datatype) {
            let isOfType = Object.prototype.toString.call(array) === "[" + datatype + " Array]";
            return isOfType;
        };
        JLGF.GetDateAndTime = function () {
            let date = new Date();
            let day = date.getDay();
            let month = date.getMonth() + 1;
            let year = date.getUTCFullYear();

            let currentDateAndTime = { Day: day, Month: month, Year: year };

            return currentDateAndTime;
        };
        JLGF.CSDialog(element) = function () {

            $(element).dialog("open");

        };
        JLGF.CreateMenu = function (element) {

            $("#" + element).menu();
            JLGF.Show("#" + element);


        };
        JLGF.DetectBrowser = function () {

            let isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
            let isFirefox = typeof InstallTrigger !== 'undefined';
            let isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));

            let isIE = /*@cc_on!@*/false || !!document.documentMode;
            let isEdge = !isIE && !!window.StyleMedia;

            let isChrome = !!window.chrome && !!window.chrome.webstore;

            let values = [isOpera, isFirefox, isSafari, isIE, isEdge, isChrome];

            for (let i = 0; i < values.length; i++) {

                if (values[i] === true) {

                    return values[i];
                }

            }
        };
        return JLGF;
    }

    if (typeof JLGF === "undefined") {
        window.JLGF = defineJLGF();
    }


})(window);