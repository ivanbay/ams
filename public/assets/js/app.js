$(document).ready(function () {

    $('.tagsinput').tagsinput({
        confirmKeys: [13, 188]
    });

    $('form#settings_form').on("keydown", ":input:not([type=submit])", function (event) {
        if (event.key == "Enter") {
            var e = jQuery.Event('keypress');
            e.keyCode = 13; //keycode to trigger this for simulating enter
            $(this).trigger(e);
            event.preventDefault();
        }
    });

    $('#cus_datepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#acq_datepicker, #exp_datepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('.datatable').DataTable();

    $('#datatable-column-btn thead tr').clone(true).appendTo('#datatable-column-btn thead');
    $('#datatable-column-btn thead tr:eq(1) th').each(function (i) {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" style="width: 100%;" class="form-control input-sm"/>');

        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                        .column(i)
                        .search(this.value)
                        .draw();
            }
        });
    });

    var table = $("#datatable-column-btn").DataTable({
        dom: "Bfrtip",
        buttons: [
            {
                extend: "copy",
                className: "btn-sm"
            },
            {
                extend: "csv",
                className: "btn-sm"
            },
            {
                extend: "excel",
                className: "btn-sm"
            },
            {
                extend: "pdfHtml5",
                className: "btn-sm"
            },
            {
                extend: "print",
                className: "btn-sm"
            },
        ],
        responsive: true,
        orderCellsTop: true,
        fixedHeader: true
    });



});

// open modal asset registration form
$('.addViewForm').on('click', function () {

    var thisId = $(this).attr("id");
    var formTitle = $(this).attr("formTitle");
    var forList = $(this).attr("for");

    if (thisId == "addCategory") {
        var fName = "Category *";
    } else if (thisId == "addStatus") {
        var fName = "Status *";
    } else if (thisId == "addLocation") {
        var fName = "Location *";
    }

    $('#addFormModal #addFormModalLabel').html(formTitle);
    $('#addFormModal #addFormModalBtn').attr("for", forList);
    $('#addFormModal #formLabel').html(fName);
    $('#addFormModal .modal-body input').attr("name", thisId);
    $('#addFormModal #div-message').text("");
    $('#addFormModal').modal('show');
});

/**
 * Event when clicking 'Add' button from Modal Form (Add Categories, etc)
 */
$('#addForm').on('click', '#addFormModalBtn', function (e) {

    init_validator();

    var inputField = $('.addFormModalInput').val();
    var forList = $(this).attr("for");
    var $this = $(this);

    if (inputField == "") {
        $('.addFormModalInput').addClass('requiredBox');
        $('#addFormModal #div-message').addClass('text-danger');
        $('#addFormModal #div-message').html("This field is required.");
        $('.alert').hide();
        return false;
    } else {
        $('.addFormModalInput').removeClass('requiredBox');
        $('#addFormModal #div-message').removeClass('text-danger');
        $('#addFormModal #div-message').html("");
    }

    $this.button('loading');

    if ($this.text() == "Add") { // add buton
        var url = APP_URL + "/lookups/lookup";
        var type = "POST";
    } else if ($this.text() == "Update") {
        var recordId = $('.addFormModalInput').attr("recordId");
        var url = APP_URL + "/lookups/lookup/" + recordId;
        var type = "PUT";
    }

    $.ajax({
        url,
        type: type,
        data: {
            formValues: $('form[name=addModalForm]').serialize()
        }
    }).done(function (data, status, xhr) {
        switch (xhr.status) {
            case 200: // successful
                $('form[name=assetRegistrationForm] select.' + forList).append(new Option($('.addFormModalInput').val(), "5"));

                $('#addFormModal #div-message').html("Successful Transaction!");
                $('#addFormModal #div-message').addClass('text-success');
                $('#addFormModal #div-message').removeClass('text-danger');
                $('.addFormModalInput').val("");
                $this.button('reset');

                if (typeof ($this.attr('forRefresh')) !== 'undefined') {
                    location.reload();
                }
                break;
            default: // no records found
                $('#addFormModal #div-message').html("Something went wrong. Please try again.");
                $('#addFormModal #div-message').removeClass('text-success');
                $('#addFormModal #div-message').addClass('text-danger');
                $('.addFormModalInput').val("");
                $this.button('reset');
                break;
        }
    }).fail(function () {
        $('#addFormModal #div-message').html("Something went wrong. Please try again.");
        $('#addFormModal #div-message').removeClass('text-success');
        $('#addFormModal #div-message').addClass('text-danger');
        $this.button('reset');
    });

    return false;
});

/**
 * Delete record via ajax
 */
$('table.assetCategoriesTable, table.assetStatusTable, table.assetLocationsTable').delegate('button.btnDelete', 'click', function () {

    $this = $(this);

    $.confirm({
        title: 'Delete Confirmation',
        content: 'Are you sure you want to delete this record?',
        buttons: {
            confirm: function () {
                var recordId = $this.attr("recordId");
                var forSetting = $this.attr("for");

                $.ajax({
                    url: APP_URL + "/lookups/delete",
                    type: "POST",
                    data: {
                        recordId: recordId,
                        for : forSetting
                    }
                }).done(function (data, status, xhr) {
                    switch (xhr.status) {
                        case 200: // successful
                            location.reload();
                            break;
                        default: // no records found
                            errorDialog();
                            break;
                    }
                }).fail(function () {
                    errorDialog();
                });
            },
            cancel: function () {}
        }
    });

});

$('table.assetCategoriesTable, table.assetStatusTable, table.assetLocationsTable').delegate('button.btnEdit', 'click', function () {
    var forInput = $(this).attr('for');
    var inputValue = $(this).attr('value');
    var recordId = $(this).attr('recordId');

    $('form[name=addModalForm] input[name=' + forInput + ']').val(inputValue);
    $('form[name=addModalForm] input[name=' + forInput + ']').attr("recordId", recordId);

});

$('div#genericEdit table').on('click', 'button.btnEdit', function () {

    var route = $(this).attr("route");
    var $this = $(this);

    $.ajax({
        url: route,
        type: "GET"
    }).done(function (data, status, xhr) {

        switch (xhr.status) {
            case 200: // successful
                var form = $this.parent().closest('div#genericEdit').find('form'); // $('form[name=personnelForm]');

                $.each(data, function (i, v) {
                    var el = form.find('#input_' + i);
                    if ($.type(el) !== 'undefined') {
                        el.val(v);
                    }
                });

                form.find('button#btnEdit').prop("disabled", false);
                break;
            default: // no records found
                errorNotification();
                break;
        }
    }).fail(function () {
        errorNotification();
    });
});

$('table.personnelsTable').on('click', 'button.btnEdit', function () {
    var recId = $(this).attr("recordId");

    $.ajax({
        url: APP_URL + "/personnels/" + recId,
        type: "GET"
    }).done(function (data, status, xhr) {
        switch (xhr.status) {
            case 200: // successful
                var form = $('form[name=personnelForm]');
                form.find('input[name=employeeID]').val(data.id);
                form.find('input[name=lastName]').val(data.lastname);
                form.find('input[name=firstName]').val(data.firstname);
                form.find('input[name=email]').val(data.email);
                form.find('input[name=contactNumber]').val(data.contact);
                form.find('button#btnEdit').prop("disabled", false);
                break;
            default: // no records found
                errorNotification();
                break;
        }
    }).fail(function () {
        errorNotification();
    });
});

$('table.usersTable').delegate('button.btnEdit', 'click', function () {
    var recId = $(this).attr("recordId");

    $.ajax({
        url: APP_URL + "/settings/users/" + recId,
        type: "GET"
    }).done(function (data, status, xhr) {
        console.log(data);
        switch (xhr.status) {
            case 200: // successful
                $('#userAddForm').modal('show');
                $('#userAddForm').find('span.passwordNote').show();

                var form = $('form[name=userForm]');
                form.find('input[name=id]').val(data.id);
                form.find('input[name=name]').val(data.name);
                form.find('input[name=username]').val(data.username);
                form.find('input[name=email]').val(data.email);
                form.find('select[name=role] option:contains(' + data.role + ')').attr("selected", "selected");

                form.find('input[name=password]').removeAttr("required");
                form.find('input[name=confirm_password]').removeAttr("required");
                form.find('button#btnEdit').prop("disabled", false);
                break;
            default: // no records found
                errorNotification();
                break;
        }
    }).fail(function () {
        errorNotification();
    });
});

$('.btnUserFormModal').on('click', function () {
    var form = $('#userAddForm');

    form.modal('show');
    form.find('span.passwordNote').hide();
    $('form[name=userForm]').trigger('reset');
    form.find('input[name=password]').removeAttr("required");
    form.find('input[name=confirm_password]').removeAttr("required");
    $('form[name=userForm]').find('button#btnEdit').prop("disabled", true);
});

$('table.assetListTable').delegate('button.assignAssetBtn', 'click', function () {
    var assetTag = $(this).attr("assetTag");

    $('div#assignAssetFormModal input[name=assetTag]').val(assetTag);
    $('#assignAssetFormModal').modal('show');
});

$('table.licenseListTable').delegate('button.assignAssetBtn', 'click', function () {
    var licenseKey = $(this).attr("licenseKey");
    var licenseId = $(this).attr("licenseId");

    $('div#assignAssetFormModal input[name=licenseId]').val(licenseId);
    $('div#assignAssetFormModal input[name=licenseKey]').val(licenseKey);
    $('#assignAssetFormModal').modal('show');
});

$('table.assetListTable, table.qrcodes').delegate('#enlarge_qr', 'click', function () {
    var tag = $(this).attr("tag");
    var location = $(this).attr("location");
    var assign = $(this).attr("assignedTo");

    $('#qr-code-large').html('');
    $('#assetQR .modal-title').text("Asset: " + tag);
    $('#qr-code-large').qrcode({
        width: 350,
        height: 350,
        text: 'Tag: ' + tag + '\nLocation: ' + location + '\nAssigned To: ' + assign
    });
    $('#assetQR').modal('show');
});

$('#personnel_profile').delegate('button.pull-out-asset', 'click', function () {
    var $this = $(this);


    $.confirm({
        title: 'Pull-out confirmation',
        content: 'Are you sure you want to pull-out this asset?',
        buttons: {
            confirm: function () {
                var route = $this.attr("route");

                $.ajax({
                    url: route,
                    type: "DELETE"
                }).done(function (data, status, xhr) {
                    switch (xhr.status) {
                        case 200: // successful
                            location.reload();
                            new PNotify({
                                title: 'Success',
                                text: data.message,
                                type: 'success'
                            });
                            break;
                        default: // no records found
                            location.reload();
                            errorNotification();
                            break;
                    }
                }).fail(function () {
                    errorNotification();
                });
            },
            cancel: function () {}
        }
    });
});

$('#asset_profile').delegate('button.pull-out-license', 'click', function () {
    var $this = $(this);


    $.confirm({
        title: 'Pull-out confirmation',
        content: 'Are you sure you want to pull-out this license?',
        buttons: {
            confirm: function () {
                var route = $this.attr("route");

                $.ajax({
                    url: route,
                    type: "DELETE"
                }).done(function (data, status, xhr) {
                    switch (xhr.status) {
                        case 200: // successful
                            location.reload();
                            new PNotify({
                                title: 'Success',
                                text: data.message,
                                type: 'success'
                            });
                            break;
                        default: // no records found
                            location.reload();
                            errorNotification();
                            break;
                    }
                }).fail(function () {
                    errorNotification();
                });
            },
            cancel: function () {}
        }
    });
});

// event for assigning asset to personnel or location
$('#assignAssetFormModal').on('click', '#assignAssetBtn', function () {

    var assetTag = $('input[name=assetTag]').val();
    var assignTo = $('select[name=assignTo]').val();

    var $this = $(this);

    if (assignTo == "") {
        $('#assignAssetFormModal #div-message').addClass('text-danger');
        $('#assignAssetFormModal #div-message').html("Assign To field is required.");
        return false;
    } else {
        $('#assignAssetFormModal #div-message').removeClass('text-danger');
        $('#assignAssetFormModal #div-message').html("");
    }

    $this.button('loading');

    $.ajax({
        url: APP_URL + "/assets/assign",
        type: "POST",
        data: {
            assetTag: assetTag,
            assignTo: assignTo
        }
    }).done(function (data, status, xhr) {
        switch (xhr.status) {
            case 200: // successful

                new PNotify({
                    title: 'Success',
                    text: 'Asset successfully assigned!',
                    type: 'success'
                });
                $('select[name=assignTo]').val("");
                $this.button('reset');

                if (typeof ($this.attr('forRefresh')) !== 'undefined') {
                    location.reload();
                }
                break;
            default: // no records found
                new PNotify({
                    title: 'Error',
                    text: 'Something went wrong! Please try again.',
                    type: 'error'
                });
                $('select[name=assignTo]').val("");

                $this.button('reset');
                break;
        }
    }).fail(function () {
        new PNotify({
            title: 'Error',
            text: 'Something went wrong! Please try again.',
            type: 'error'
        });
        $this.button('reset');
    });

    return false;
});

// event for assigning asset to personnel or location
$('#assignAssetFormModal').on('click', '#assignLicenseBtn', function () {

    var licenseKey = $('input[name=licenseKey]').val();
    var licenseId = $('input[name=licenseId]').val();
    var assignTo = $('select[name=assignTo]').val();

    var $this = $(this);

    if (assignTo == "") {
        $('#assignAssetFormModal #div-message').addClass('text-danger');
        $('#assignAssetFormModal #div-message').html("Assign To field is required.");
        return false;
    } else {
        $('#assignAssetFormModal #div-message').removeClass('text-danger');
        $('#assignAssetFormModal #div-message').html("");
    }

    $this.button('loading');

    $.ajax({
        url: APP_URL + "/assets/assign/license",
        type: "POST",
        data: {
            licenseKey: licenseKey,
            licenseId: licenseId,
            assignTo: assignTo
        }
    }).done(function (data, status, xhr) {
        console.log(data);
        switch (xhr.status) {
            case 200: // successful

                new PNotify({
                    title: 'Success',
                    text: 'Asset successfully assigned!',
                    type: 'success'
                });
                $('select[name=assignTo]').val("");
                $this.button('reset');

                if (typeof ($this.attr('forRefresh')) !== 'undefined') {
                    location.reload();
                }
                break;
            default: // no records found
                new PNotify({
                    title: 'Error',
                    text: 'Something went wrong! Please try again.',
                    type: 'error'
                });
                $('select[name=assignTo]').val("");

                $this.button('reset');
                break;
        }
    }).fail(function () {
        new PNotify({
            title: 'Error',
            text: 'Something went wrong! Please try again.',
            type: 'error'
        });
        $this.button('reset');
    });

    return false;
});

// Generic delete function
$('.genericDelete').delegate('button.btnDelete', 'click', function () {

    $this = $(this);

    $.confirm({
        title: 'Delete Confirmation',
        content: 'Are you sure you want to delete this record?',
        buttons: {
            confirm: function () {
                var recordId = $this.attr("recordId");
                var model = $this.attr("model");

                $.ajax({
                    url: APP_URL + "/delete",
                    type: "POST",
                    data: {
                        recordId: recordId,
                        model: model
                    }
                }).done(function (data, status, xhr) {
                    switch (xhr.status) {
                        case 200: // successful
                            location.reload();
                            break;
                        default: // no records found
                            location.reload();
                            errorDialog();
                            break;
                    }
                }).fail(function () {
                    errorDialog();
                });
            },
            cancel: function () {}
        }
    });

});

$('.categories_chart_select').click(function () {
    var content = $(this).attr('content');

    var sContent = content.split("-");
    var type = sContent[1];

    $.ajax({url: APP_URL + "/api/settings/customDashboard/asset_per_category/" + type, type: "GET", async: false});

    $("#categories-numeric-content").hide();
    $("#categories-bar-content").hide();
    $("#categories-line-content").hide();
    $("#categories-pie-content").hide();

    $("#assetCategories_bar").html("");
    $("#assetCategories_line").html("");
    $("#assetCategories_pie").html("");

    $("#" + content).show();

    if (content == 'categories-bar-content') {
        chart_buildAssetCategoriesBar();
    } else if (content == 'categories-line-content') {
        chart_buildAssetCategoriesLine();
    } else if (content == 'categories-pie-content') {
        chart_buildAssetCategoriesPie();
    }
});

$('.status_chart_select').click(function () {
    var content = $(this).attr('content');

    var sContent = content.split("-");
    var type = sContent[1];

    $.ajax({url: APP_URL + "/api/settings/customDashboard/asset_per_status/" + type, type: "GET", async: false});

    $("#status-numeric-content").hide();
    $("#status-bar-content").hide();
    $("#status-line-content").hide();
    $("#status-pie-content").hide();

    $("#assetStatus_bar").html("");
    $("#assetStatus_line").html("");
    $("#assetStatus_pie").html("");

    $("#" + content).show();
    if (content == 'status-bar-content') {
        chart_buildAssetStatusBar();
    } else if (content == 'status-line-content') {
        chart_buildAssetStatusLine();
    } else if (content == 'status-pie-content') {
        chart_buildAssetStatusPie();
    }
});

$('.users_chart_select').click(function () {
    var content = $(this).attr('content');

    var sContent = content.split("-");
    var type = sContent[1];
    $.ajax({url: APP_URL + "/api/settings/customDashboard/user_per_role/" + type, type: "GET", async: false});

    $("#users-numeric-content").hide();
    $("#users-bar-content").hide();
    $("#users-line-content").hide();
    $("#users-pie-content").hide();

    $("#userRole_bar").html("");
    $("#userRole_line").html("");
    $("#userRole_pie").html("");

    $("#" + content).show();
    if (content == 'users-bar-content') {
        chart_buildUserRoleBar();
    } else if (content == 'users-line-content') {
        chart_buildUserRoleLine();
    } else if (content == 'users-pie-content') {
        chart_buildUserRolePie();
    }
});

function errorNotification() {
    new PNotify({
        title: 'Error',
        text: 'Something went wrong! Please try again.',
        type: 'error'
    });
}

function errorDialog() {
    $.confirm({
        title: 'Encountered an error!',
        content: 'Something went wrong!',
        type: 'red',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Try again',
                btnClass: 'btn-red',
                action: function () {
                }
            },
            close: function () {
            }
        }
    });
}

function init_morris_chart() {

    if (typeof (Morris) === 'undefined') {
        return;
    }
    console.log('init_morris_charts');

    if ($('#totalAssets_bar').length) {

        var data = $.ajax({url: APP_URL + "/api/totalAssetCount", type: "GET", async: false}).responseText;
        console.log(data);
        Morris.Bar({
            element: 'totalAssets_bar',
            data: JSON.parse(data),
            xkey: 'name',
            ykeys: ['value'],
            labels: ['Asset Count'],
            barRatio: 0.4,
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            xLabelAngle: 35,
            hideHover: 'auto',
            resize: true
        });

    }

    if ($('#assetCategories_bar').length) {

        var data = $.ajax({url: APP_URL + "/api/totalAssetsPerCategory", type: "GET", async: false}).responseText;

        Morris.Bar({
            element: 'assetCategories_bar',
            data: JSON.parse(data),
            xkey: 'name',
            ykeys: ['value'],
            labels: ['Asset Count'],
            barRatio: 0.4,
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            xLabelAngle: 35,
            hideHover: 'auto',
            resize: true
        });

    }

    if ($('#assetStatus_bar').length) {

        var data = $.ajax({url: APP_URL + "/api/totalAssetsPerStatus", type: "GET", async: false}).responseText;

        Morris.Bar({
            element: 'assetStatus_bar',
            data: JSON.parse(data),
            xkey: 'name',
            ykeys: ['value'],
            labels: ['Asset Count'],
            barRatio: 0.4,
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            xLabelAngle: 35,
            hideHover: 'auto',
            resize: true
        });

    }

    if ($('#userRole_bar').length) {

        var data = $.ajax({url: APP_URL + "/api/totalUsersPerRole", type: "GET", async: false}).responseText;

        Morris.Bar({
            element: 'userRole_bar',
            data: JSON.parse(data),
            xkey: 'name',
            ykeys: ['value'],
            labels: ['Asset Count'],
            barRatio: 0.4,
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            xLabelAngle: 35,
            hideHover: 'auto',
            resize: true
        });

    }

    if ($('#totalAssets_line').length) {
        var data = $.ajax({url: APP_URL + "/api/totalAssetCount", type: "GET", async: false}).responseText;

        Morris.Line({
            element: 'totalAssets_line',
            data: JSON.parse(data),
            xkey: 'name',
            parseTime: false,
            ykeys: ['value'],
            labels: ['Assets'],
            lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB']
        });
    }

    if ($('#assetCategories_line').length) {
        var data = $.ajax({url: APP_URL + "/api/totalAssetsPerCategory", type: "GET", async: false}).responseText;

        Morris.Line({
            element: 'assetCategories_line',
            data: JSON.parse(data),
            xkey: 'name',
            parseTime: false,
            ykeys: ['value'],
            labels: ['Assets'],
            lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB']
        });
    }

    if ($('#assetStatus_line').length) {
        var data = $.ajax({url: APP_URL + "/api/totalAssetsPerStatus", type: "GET", async: false}).responseText;

        Morris.Line({
            element: 'assetStatus_line',
            data: JSON.parse(data),
            xkey: 'name',
            parseTime: false,
            ykeys: ['value'],
            labels: ['Assets'],
            lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB']
        });
    }

    if ($('#userRole_line').length) {
        var data = $.ajax({url: APP_URL + "/api/totalUsersPerRole", type: "GET", async: false}).responseText;

        Morris.Line({
            element: 'userRole_line',
            data: JSON.parse(data),
            xkey: 'name',
            parseTime: false,
            ykeys: ['value'],
            labels: ['Users'],
            lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB']
        });
    }


}

var theme = {
    color: [
        '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
        '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
    ],

    title: {
        itemGap: 8,
        textStyle: {
            fontWeight: 'normal',
            color: '#408829'
        }
    },

    dataRange: {
        color: ['#1f610a', '#97b58d']
    },

    toolbox: {
        color: ['#408829', '#408829', '#408829', '#408829']
    },

    tooltip: {
        backgroundColor: 'rgba(0,0,0,0.5)',
        axisPointer: {
            type: 'line',
            lineStyle: {
                color: '#408829',
                type: 'dashed'
            },
            crossStyle: {
                color: '#408829'
            },
            shadowStyle: {
                color: 'rgba(200,200,200,0.3)'
            }
        }
    },

    dataZoom: {
        dataBackgroundColor: '#eee',
        fillerColor: 'rgba(64,136,41,0.2)',
        handleColor: '#408829'
    },
    grid: {
        borderWidth: 0
    },

    categoryAxis: {
        axisLine: {
            lineStyle: {
                color: '#408829'
            }
        },
        splitLine: {
            lineStyle: {
                color: ['#eee']
            }
        }
    },

    valueAxis: {
        axisLine: {
            lineStyle: {
                color: '#408829'
            }
        },
        splitArea: {
            show: true,
            areaStyle: {
                color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
            }
        },
        splitLine: {
            lineStyle: {
                color: ['#eee']
            }
        }
    },
    timeline: {
        lineStyle: {
            color: '#408829'
        },
        controlStyle: {
            normal: {color: '#408829'},
            emphasis: {color: '#408829'}
        }
    },

    k: {
        itemStyle: {
            normal: {
                color: '#68a54a',
                color0: '#a9cba2',
                lineStyle: {
                    width: 1,
                    color: '#408829',
                    color0: '#86b379'
                }
            }
        }
    },
    textStyle: {
        fontFamily: 'Arial, Verdana, sans-serif'
    },
};

function init_echart() {

    if (typeof (echarts) === 'undefined') {
        return;
    }
    console.log('init_echarts');



    if ($('#totalAssets_pie').length) {

        var echartPie = echarts.init(document.getElementById('totalAssets_pie'), theme);
        var data = $.ajax({url: APP_URL + "/api/totalAssetCount", type: "GET", async: false}).responseText;

        echartPie.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                x: 'center',
                y: 'bottom',
                data: ["For Maintenance", "For Deployment", "Deployed"]
            },
            calculable: true,
            series: [{
                    name: 'Assets',
                    type: 'pie',
                    radius: '55%',
                    center: ['50%', '48%'],
                    label: {
                        normal: {
                            formatter: '{c} ({d}%)'
                        }
                    },
                    data: JSON.parse(data)
                }]
        });

    }

    if ($('#assetCategories_pie').length) {

        var echartPie = echarts.init(document.getElementById('assetCategories_pie'), theme);
        var data = $.ajax({url: APP_URL + "/api/totalAssetsPerCategory", type: "GET", async: false}).responseText;

        echartPie.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                x: 'center',
                y: 'bottom',
                data: ["Electronic Device", "Furniture", "Machinery", "Land", "Equipment", "Building"]
            },
            calculable: true,
            series: [{
                    name: 'Assets',
                    type: 'pie',
                    radius: '55%',
                    center: ['50%', '48%'],
                    label: {
                        normal: {
                            formatter: '{c} ({d}%)'
                        }
                    },
                    data: JSON.parse(data)
                }]
        });

    }

    if ($('#assetStatus_pie').length) {

        var echartPie = echarts.init(document.getElementById('assetStatus_pie'), theme);
        var data = $.ajax({url: APP_URL + "/api/totalAssetsPerStatus", type: "GET", async: false}).responseText;

        echartPie.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                x: 'center',
                y: 'bottom',
                data: ["Deployed", "Available", "Broken - Not Fixable(Disposed)", "For Maintenance", "Ready to Deploy", "Out for Repair", "Lost/Stolen", "In Stock"]
            },
            calculable: true,
            series: [{
                    name: 'Assets',
                    type: 'pie',
                    radius: '55%',
                    center: ['50%', '48%'],
                    label: {
                        normal: {
                            formatter: '{c} ({d}%)'
                        }
                    },
                    data: JSON.parse(data)
                }]
        });

    }

    if ($('#userRole_pie').length) {

        var echartPie = echarts.init(document.getElementById('userRole_pie'), theme);
        var data = $.ajax({url: APP_URL + "/api/totalUsersPerRole", type: "GET", async: false}).responseText;

        echartPie.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                x: 'center',
                y: 'bottom',
                data: ["Technician", "Allocator", "Viewer", "Administrator"]
            },
            calculable: true,
            series: [{
                    name: 'Users',
                    type: 'pie',
                    radius: '55%',
                    center: ['50%', '48%'],
                    label: {
                        normal: {
                            formatter: '{c} ({d}%)'
                        }
                    },
                    data: JSON.parse(data)
                }]
        });

    }
}

function chart_buildAssetCategoriesBar() {
    var data = $.ajax({url: APP_URL + "/api/totalAssetsPerCategory", type: "GET", async: false}).responseText;

    Morris.Bar({
        element: 'assetCategories_bar',
        data: JSON.parse(data),
        xkey: 'name',
        ykeys: ['value'],
        labels: ['Asset Count'],
        barRatio: 0.4,
        barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
        xLabelAngle: 35,
        hideHover: 'auto',
        resize: true
    });
}

function chart_buildAssetStatusBar() {
    var data = $.ajax({url: APP_URL + "/api/totalAssetsPerStatus", type: "GET", async: false}).responseText;

    Morris.Bar({
        element: 'assetStatus_bar',
        data: JSON.parse(data),
        xkey: 'name',
        ykeys: ['value'],
        labels: ['Asset Count'],
        barRatio: 0.4,
        barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
        xLabelAngle: 35,
        hideHover: 'auto',
        resize: true
    });
}

function chart_buildUserRoleBar() {
    var data = $.ajax({url: APP_URL + "/api/totalUsersPerRole", type: "GET", async: false}).responseText;

    Morris.Bar({
        element: 'userRole_bar',
        data: JSON.parse(data),
        xkey: 'name',
        ykeys: ['value'],
        labels: ['Asset Count'],
        barRatio: 0.4,
        barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
        xLabelAngle: 35,
        hideHover: 'auto',
        resize: true
    });
}

function chart_buildAssetCategoriesLine() {
    var data = $.ajax({url: APP_URL + "/api/totalAssetsPerCategory", type: "GET", async: false}).responseText;

    Morris.Line({
        element: 'assetCategories_line',
        data: JSON.parse(data),
        xkey: 'name',
        parseTime: false,
        ykeys: ['value'],
        labels: ['Assets'],
        lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB']
    });
}

function chart_buildAssetStatusLine() {
    var data = $.ajax({url: APP_URL + "/api/totalAssetsPerStatus", type: "GET", async: false}).responseText;

    Morris.Line({
        element: 'assetStatus_line',
        data: JSON.parse(data),
        xkey: 'name',
        parseTime: false,
        ykeys: ['value'],
        labels: ['Assets'],
        lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB']
    });
}

function chart_buildUserRoleLine() {
    var data = $.ajax({url: APP_URL + "/api/totalUsersPerRole", type: "GET", async: false}).responseText;

    Morris.Line({
        element: 'userRole_line',
        data: JSON.parse(data),
        xkey: 'name',
        parseTime: false,
        ykeys: ['value'],
        labels: ['Users'],
        lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB']
    });
}

function chart_buildAssetCategoriesPie() {

    var echartPie = echarts.init(document.getElementById('assetCategories_pie'), theme);
    var data = $.ajax({url: APP_URL + "/api/totalAssetsPerCategory", type: "GET", async: false}).responseText;

    echartPie.setOption({
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            x: 'center',
            y: 'bottom',
            data: ["Electronic Device", "Furniture", "Machinery", "Land", "Equipment", "Building"]
        },
        calculable: true,
        series: [{
                name: 'Assets',
                type: 'pie',
                radius: '55%',
                center: ['50%', '48%'],
                label: {
                    normal: {
                        formatter: '{c} ({d}%)'
                    }
                },
                data: JSON.parse(data)
            }]
    });

}

function chart_buildAssetStatusPie() {

    var echartPie = echarts.init(document.getElementById('assetStatus_pie'), theme);
    var data = $.ajax({url: APP_URL + "/api/totalAssetsPerStatus", type: "GET", async: false}).responseText;

    echartPie.setOption({
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            x: 'center',
            y: 'bottom',
            data: ["Deployed", "Available", "Broken - Not Fixable(Disposed)", "For Maintenance", "Ready to Deploy", "Out for Repair", "Lost/Stolen", "In Stock"]
        },
        calculable: true,
        series: [{
                name: 'Assets',
                type: 'pie',
                radius: '55%',
                center: ['50%', '48%'],
                label: {
                    normal: {
                        formatter: '{c} ({d}%)'
                    }
                },
                data: JSON.parse(data)
            }]
    });

}

function chart_buildUserRolePie() {

    var echartPie = echarts.init(document.getElementById('userRole_pie'), theme);
    var data = $.ajax({url: APP_URL + "/api/totalUsersPerRole", type: "GET", async: false}).responseText;

    echartPie.setOption({
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            x: 'center',
            y: 'bottom',
            data: ["Technician", "Allocator", "Viewer", "Administrator"]
        },
        calculable: true,
        series: [{
                name: 'Users',
                type: 'pie',
                radius: '55%',
                center: ['50%', '48%'],
                label: {
                    normal: {
                        formatter: '{c} ({d}%)'
                    }
                },
                data: JSON.parse(data)
            }]
    });

}