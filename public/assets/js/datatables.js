$(document).ready(function () {
    $(".dataTables").DataTable({
        responsive: true,
        ordering: false,
        language: {
            emptyTable: "Data Kosong",
        },
    });
    $(".dataTables-rumah").DataTable({
        responsive: true,
        ordering: false,
        paging: false,
        searching: false,
        language: {
            emptyTable: "Data Kosong",
        },
        info: "",
    });
    $(".dataTables-laporan").DataTable({
        responsive: true,
        ordering: false,
        paging: true,
        searching: false,
        language: {
            emptyTable: "Data Kosong",
        },
        info: "",
    });
});
