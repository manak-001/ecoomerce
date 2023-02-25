var listTable;

listTable = $("#companyTable").DataTable({
    destroy: true,
    searching: false,
    "lengthChange": false,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "destroy": true,
//    "order": [[3, "desc"]],
    "ajax": {
        "url": "/admin/company/getList",
        "dataType": "json",
        "type": "GET",
        "dataFilter": function (data) {
            var json = $.parseJSON(data);

            return  JSON.stringify(json);
        }
    }, "fnDrawCallback": function (oSettings) {
        bootstrapSwitcher();
    },
    "columns": [
        {"data": "id"},
        {"data": "company_name"},
        {"data": "address"},
        {"data": "created_at"},
        {"data": "status"},
        {"data": "action"},
    ],
    'columnDefs': [{
            'targets': [0, 4, 5], /* column index */
            'orderable': false, /* true or false */
        }]

});
listTable = $("#departmentTable").DataTable({
    destroy: true,
    searching: false,
    "lengthChange": false,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "destroy": true,
//    "order": [[3, "desc"]],
    "ajax": {
        "url": "/admin/department/getList",
        "dataType": "json",
        "type": "GET",
        "dataFilter": function (data) {
            var json = $.parseJSON(data);

            return  JSON.stringify(json);
        }
    }, "fnDrawCallback": function (oSettings) {
        bootstrapSwitcher();
    },
    "columns": [
        {"data": "id"},
        {"data": "company_name"},
        {"data": "department_name"},
        {"data": "created_at"},
        {"data": "status"},
        {"data": "action"},
    ],
    'columnDefs': [{
            'targets': [0, 4, 5], /* column index */
            'orderable': false, /* true or false */
        }]

});
listTable = $("#listTable").DataTable({
    destroy: true,
    searching: false,
    "lengthChange": false,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "destroy": true,
//    "order": [[3, "desc"]],
    "ajax": {
        "url": "/admin/designation/getList",
        "dataType": "json",
        "type": "GET",
        "dataFilter": function (data) {
            var json = $.parseJSON(data);

            return  JSON.stringify(json);
        }
    }, "fnDrawCallback": function (oSettings) {
        bootstrapSwitcher();
    },
    "columns": [
        {"data": "id"},
        {"data": "name"},
        {"data": "created_at"},
        {"data": "status"},
        {"data": "action"},
    ],
    'columnDefs': [{
            'targets': [0, 4], /* column index */
            'orderable': false, /* true or false */
        }]

});
listTable = $("#employeeTable").DataTable({
    destroy: true,
    searching: true,
    "lengthChange": false,
    "processing": true,
    "serverSide": true,
    "ordering": true,
    "destroy": true,
    "order": [[3, "desc"]],
    "ajax": {
        "url": "/admin/employee/getList",
        "dataType": "json",
        "type": "GET",
        "dataFilter": function (data) {
            var json = $.parseJSON(data);

            return  JSON.stringify(json);
        }
    }, "fnDrawCallback": function (oSettings) {
        bootstrapSwitcher();
    },
    "columns": [
        {"data": "name"},
        {"data": "emp_id"},
        {"data": "email"},
        {"data": "join_date"},
        {"data": "role"},
        {"data": "status"},
        {"data": "action"},
    ],
    'columnDefs': [{
            'targets': [1, 4, 5, 6], /* column index */
            'orderable': false, /* true or false */
        }]

});
listTable = $("#clientTable").DataTable({
    destroy: true,
    searching: true,
    "lengthChange": false,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "destroy": true,
    "ajax": {
        "url": "/admin/clients/getList",
        "dataType": "json",
        "type": "GET",
        "dataFilter": function (data) {
            var json = $.parseJSON(data);

            return  JSON.stringify(json);
        }
    }, "fnDrawCallback": function (oSettings) {
        bootstrapSwitcher();
    },
    "columns": [
        {"data": "data"},
    ],

});

listTable = $("#holidayTable").DataTable({
    destroy: true,
    searching: false,
    "lengthChange": false,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "destroy": true,
    "ajax": {
        "url": "/admin/holiday/getList",
        "dataType": "json",
        "type": "GET",
        "dataFilter": function (data) {
            var json = $.parseJSON(data);

            return  JSON.stringify(json);
        }
    }, "fnDrawCallback": function (oSettings) {
        bootstrapSwitcher();
    },
    "columns": [
        {"data": "id"},
        {"data": "name"},
        {"data": "date"},
        {"data": "day"},
        {"data": "action"},
    ],

});
listTable = $("#adminLeaveTable").DataTable({
    destroy: true,
    searching: false,
    "lengthChange": false,
    "processing": true,
    "serverSide": true,
    "ordering": false,
    "destroy": true,
    "ajax": {
        "url": "/admin/leaves/getList",
        "dataType": "json",
        "type": "GET",
        "dataFilter": function (data) {
            var json = $.parseJSON(data);

            return  JSON.stringify(json);
        }
    }, "fnDrawCallback": function (oSettings) {
        bootstrapSwitcher();
    },
    "columns": [
        {"data": "id"},
        {"data": "name"},
        {"data": "leave_from"},
        {"data": "leave_to"},
        {"data": "no_of_days"},
        {"data": "reason"},
        {"data": "status"},
        {"data": "action"},
    ],
    'columnDefs': [{
            'targets': [1, 4, 5, 6], /* column index */
            'orderable': false, /* true or false */
        }]

});
