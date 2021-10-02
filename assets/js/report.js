$( document ).ready(function() {
    console.log( "jquery ready!" );
    $("#btn-print").click(function() {
        $('#data-print').printArea();
    });
});

function get_data()
{
    var Tgl1 = $("#Tgl1").val();
    var Tgl2 = $("#Tgl2").val();

    if(Tgl1 != '' && Tgl2 != '')
    {
        $("#form_report").submit();
    }
    else
    {
        alert('Tanggal harus dipilih');
    }
}