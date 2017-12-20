(function (window) {
    "use strict"

    function defineJLGF() {
        var JLGF = {};
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
            var isOfType = Object.prototype.toString.call(array) === "[" + datatype + " Array]";
            return isOfType;
        };
        JLGF.GetDateAndTime = function () {
            var date = new Date();
            var day = date.getDay();
            var month = date.getMonth() + 1;
            var year = date.getUTCFullYear();

            var currentDateAndTime = { Day: day, Month: month, Year: year };

            return currentDateAndTime;
        };

        return JLGF;
    }

    if (typeof JLGF === "undefined") {
        window.JLGF = defineJLGF();
    }


})(window);