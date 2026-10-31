"use strict";

document.addEventListener("DOMContentLoaded", function () {

    // table 1
    if (document.querySelector("#datatable_1")) {
        new simpleDatatables.DataTable("#datatable_1", {
            searchable: true,
            perPage: 30,
            perPageSelect: [30, 50, 100, ["الجميع", 0]]
        });
    }

    // custom table (no pagination)
    if (document.querySelector("#custom-table")) {
        new simpleDatatables.DataTable("#custom-table", {
            searchable: true,
            perPage: 99999999, // show all rows
            perPageSelect: false
        });
    }

});