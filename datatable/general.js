tableInfo = function (tblObj, url, columns, frmObj) {
    var frmData = (frmObj === '') ? "" : frmObj.serializeArray();
    tblObj.dataTable({
        "bDestroy": true,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": url,
        "bFilter": false,
        "bInfo": false,
        "bLengthChange": false,
        "iDisplayLength": 10,
        "columns": columns,
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': ["_all"],
                'width':'10%',
            }],
        "fnServerParams": function (aoData) {
            $.each(frmData, function (i, field) {
                aoData.push({"name": field.name, "value": field.value});
            });
        },
        "fnServerData": function (sSource, aoData, fnCallback, oSettings) {
            oSettings.jqXHR = $.ajax({
                "dataType": 'json',
                "type": "POST",
                "url": sSource,
                "data": aoData,
                "success": fnCallback,
                "error": function (xhr, error, thrown) {
                    var message = $.parseJSON(xhr.responseText);
                    alert(message);
                }
            });
        }
    });
}
$(document).ready(function () {
    $('table').removeClass('display');
    $('table').addClass('table table-striped table-bordered');
});