/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "0",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
function successMsg(msg) {
    toastr.success(msg);
}
function errorMsg(msg) {
    toastr.error(msg);
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function showLoader() {
    $('#loadingDiv').fadeIn();
}
function hideLoader() {
    $('#loadingDiv').fadeOut();
}

$("body").on("click", ".delete_records", function () {
    var url = $("body").find(".delete_url").val();
    var ids = [$(this).data('id')];
    var tbl = $(this).data('tbl');
    $.confirm({
        title: 'Confirm!',
        animateFromElement: false,
        animation: "zoom",
        closeAnimation: "zoom",
        icon: "fas fas-question",
        content: 'Are you sure you want to delete this records ?',
        buttons: {
            danger: {
                btnClass: 'btn-red',
                text: 'Confirm',
                action: function () {
                    deleteData(url, ids, tbl);
                }
            },
//            confirm: function () {
//
//            },
            cancel: function () {
//                
            },
        }
    });
});

function deleteData(url, ids, tbl = null) {
    $.ajax({
        "type": "post",
        "dataType": "json",
        "data": {ids: ids},
        "url": url,
        success: function (data) {
            if (data.status == 200) {
                successMsg(data.msg);
                listTable.ajax.reload();
            } else {
                errorMsg(data.error);
            }
        },
        error: function (xhr, ajaxOptions, thrownError)
        {
            hideLoader();
            errorMsg(thrownError);
        }
    });
}

function bootstrapSwitcher() {
    $("body").find(".statusSwitcher").bootstrapSwitch({
        onSwitchChange: function (event, state) {
            var url = $(this).data('url');
            var ids = [$(this).data('value')];
            changeRowStatus(url, ids, $(this).prop("checked"));
        }
    });
}
function changeRowStatus(url, ids, status) {
    showLoader();
    $.ajax({
        "type": "post",
        "dataType": "json",
        "data": {ids: ids, status: status},
        "url": url,
        success: function (data) {
            hideLoader();
            if (data.status == 200) {
                successMsg(data.msg);
            } else {
                errorMsg(data.error);
            }
        },
        error: function (xhr, ajaxOptions, thrownError)
        {
            hideLoader();
            errorMsg(thrownError);
        }
    });
}

function changeLeaveStatus(id, status) {
    $.confirm({
        title: 'Confirm!',
        animateFromElement: false,
        animation: "zoom",
        closeAnimation: "zoom",
        icon: "fas fas-question",
        content: 'Are you sure you want to update status ?',
        buttons: {
            danger: {
                btnClass: 'btn-red',
                text: 'Confirm',
                action: function () {
                    changeLeaveStatusAjax(id, status);
                }
            },
            cancel: function () {
//                
            },
        }
    });
}
function changeLeaveStatusAjax(id, status) {
    $.ajax({
        "type": "post",
        "dataType": "json",
        "data": {id: id, status: status},
        "url": '/admin/leaves/status',
        success: function (data) {
            hideLoader();
            if (data.status == 200) {
                successMsg(data.msg);
                listTable.ajax.reload(null, false);
            } else {
                errorMsg(data.error);
            }
        },
        error: function (xhr, ajaxOptions, thrownError)
        {
            hideLoader();
            errorMsg(thrownError);
        }
    });
}
function changeProjectStatus(id, status) {
    $.ajax({
        "type": "post",
        "dataType": "json",
        "data": {id: id, status: status},
        "url": '/admin/project/priority',
        success: function (data) {
            hideLoader();
            if (data.status == 200) {
                successMsg(data.msg);
                listTable.ajax.reload(null, false);
            } else {
                errorMsg(data.error);
            }
        },
        error: function (xhr, ajaxOptions, thrownError)
        {
            hideLoader();
            errorMsg(thrownError);
        }
    });
}
$("body").on("click", ".delete_project_file", function () {
    var id = $(this).data('value');
    var _this = $(this);
    $.confirm({
        title: 'Confirm!',
        animateFromElement: false,
        animation: "zoom",
        closeAnimation: "zoom",
        icon: "fas fas-question",
        content: 'Are you sure you want to delete this file ?',
        buttons: {
            danger: {
                btnClass: 'btn-red',
                text: 'Confirm',
                action: function () {
                    $.ajax({
                        "type": "post",
                        "url": "/admin/project/delete-file",
                        data: {id: id},
                        success: function (data) {
                            if (data.status == 200) {
                                $(_this).closest(".file_section").remove();
                                successMsg(data.msg);
                            } else {
                                errorMsg(data.error);
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError)
                        {
                            hideLoader();
                            errorMsg(thrownError);
                        }
                    });
                }
            },
            cancel: function () {
//                
            },
        }
    });
});

function changeTaskStatus(id, status) {
    var _this = $(this);
    $.confirm({
        title: 'Confirm!',
        animateFromElement: false,
        animation: "zoom",
        closeAnimation: "zoom",
        icon: "fas fas-question",
        content: 'Are you sure you want to mark complete ?',
        buttons: {
            danger: {
                btnClass: 'btn-red',
                text: 'Confirm',
                action: function () {
                    $.ajax({
                        "type": "post",
                        "url": "/admin/tasks/complete",
                        "data": {id: id, status: status},
                        success: function (data) {
                            if (data.status == 200) {
                                successMsg(data.msg);
                                listTable.ajax.reload(null, false);
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError)
                        {
                            hideLoader();
                            errorMsg(thrownError);
                        }
                    });
                }
            },
            cancel: function () {
                $(_this).attr('checked', false);
            },
        }
    });
}

$(".select-select2").select2();
$("body").find(".currentSwitcher").bootstrapSwitch();