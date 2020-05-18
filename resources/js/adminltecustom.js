$(function () {
    $("#example1").DataTable();
    $(".select2").select2();
    $('.summernote').summernote();

    $('#datepicker').daterangepicker({
        singleDatePicker: true,
        autoclose: true,
        locale: { format: 'DD/MM/YYYY' }
    });
});
