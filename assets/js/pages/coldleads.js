"use strict";

$(document).ready(function () {
    function exportToCSV(code){
        $(".waitting-screen").show();

        $.ajax({
            url: BASE_URL + "exportCSV",
            method: "POST",
            data: {
                code: code
            },
            success: function (data) {
                var downloadLink = document.createElement("a");
                var fileData = ['\ufeff'+data];
  
                var blobObject = new Blob(fileData,{
                   type: "text/csv;charset=utf-8;"
                 });
  
                var url = URL.createObjectURL(blobObject);
                downloadLink.href = url;
                downloadLink.download = "leads-" + code + ".csv";

                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);

                $(".waitting-screen").hide();
            }
        })
    }

    window.exportToCSV = exportToCSV
});