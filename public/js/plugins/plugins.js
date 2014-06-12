// DataTables configuration
$(document).ready(function () {
    oTable = $('#expensesTable').dataTable({
        "bPaginate": true,
        "bFilter": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "aaSorting": [
            [1, 'desc']
        ],
        "aoColumns": [
            { "aTargets": [ 0 ], "bSortable": true },
            { "aTargets": [ 1 ], "bSortable": true, "sType": "date-eu" },
            { "aTargets": [ 2 ], "bSortable": true },
            { "aTargets": [ 3 ], "bSortable": true },
            { "aTargets": [ 4 ], "bSortable": true },
            { "aTargets": [ 5 ], "bSortable": false }
        ]
    });
});

// Here you can use other search input.
// And even hide table's search bar ( DataTables )
//    $('#expensesTable_filter').hide();
$('#mainSearch').keyup(function () {
    oTable.fnFilter($(this).val());
});

// Input file helper
$(document).on('change', '.btn-file :file', function () {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});

// Input file helper
$('.btn-file :file').on('fileselect', function (event, numFiles, label) {

    var input = $(this).parents('.input-group').find(':text'),
        log = numFiles > 1 ? numFiles + ' files selected' : label;

    if (input.length) {
        input.val(log);
    } else {
        if (log) alert(log);
    }

});

// DatePicker (from jQuery UI)
$('input[name = date]').datepicker({
    dateFormat: 'dd.mm.yy',
    firstDay: 1,
    showWeek: true,
    changeMonth: true,
    changeYear: true,
    showOtherMonths: true,
    selectOtherMonths: true
});

// bootstrap-progressbar v0.7.1
$('.progress .progress-bar').progressbar();

/**
 * Similar to the Date (dd/mm/YY) data sorting plug-in, this plug-in offers
 * additional  flexibility with support for spaces between the values and
 * either . or / notation for the separators.
 *
 *  @name Date (dd . mm[ . YYYY])
 *  @summary Sort dates in the format `dd/mm/YY[YY]` (with optional spaces)
 *  @author [Robert Sedovšek](http://galjot.si/)
 *
 *  @example
 *    $('#example').dataTable( {
 *       columnDefs: [
 *         { type: 'date-eu', targets: 0 }
 *       ]
 *    } );
 */

jQuery.extend(jQuery.fn.dataTableExt.oSort, {
    "date-eu-pre": function (date) {
        date = date.replace(" ", "");
        var eu_date, year;

        if (date == '') {
            return 0;
        }

        if (date.indexOf('.') > 0) {
            /*date a, format dd.mn.(yyyy) ; (year is optional)*/
            eu_date = date.split('.');
        } else {
            /*date a, format dd/mn/(yyyy) ; (year is optional)*/
            eu_date = date.split('/');
        }

        /*year (optional)*/
        if (eu_date[2]) {
            year = eu_date[2];
        } else {
            year = 0;
        }

        /*month*/
        var month = eu_date[1];
        if (month.length == 1) {
            month = 0 + month;
        }

        /*day*/
        var day = eu_date[0];
        if (day.length == 1) {
            day = 0 + day;
        }

        return (year + month + day) * 1;
    },

    "date-eu-asc": function (a, b) {
        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
    },

    "date-eu-desc": function (a, b) {
        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
    }
});
