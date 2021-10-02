$( document ).ready(function() {
    console.log( "jquery ready!" );
    get_order();
    hitung_total();
});

function get_order(ID_Subcategory)
{
    var baseurl = $("#base_url").val();

    $(".spinner-order-frame").show();
    $(".list-order-frame").hide();
    $(".list-order-frame").empty();

    $.ajax({
        type: 'GET',
        cache: false,
        timeout: 5000,
        url: baseurl+'index.php/payment/get_order',
        dataType: 'json',
        success: function(response)
        {
            var Success = response.Success;
            var Message = response.Message;
            
            if(Success == true)
            {
                var html_data = "";
                for(x=0;x<response.Data.length;x++)
                {
                    html_data += "<div id='order-"+response.Data[x]['ID']+"' class='col col-6'><div class='card mb-3 rounded-3 shadow-sm'><div class='card-body'><p class='card-text'>";
                    html_data += response.Data[x]['ID'] + " - " + response.Data[x]['TableName'];
                    html_data += "<div>Pelayan: "+response.Data[x]['NameUser']+"</div>";
                    html_data += "<div>"+response.Data[x]['Total']+"</div>";
                    html_data += "<div class='d-grid gap-2'><button onclick='choose_order(this);' data-id='"+response.Data[x]['ID']+"' data-name='"+response.Data[x]['NameUser']+"' data-table='"+response.Data[x]['TableName']+"' data-total='"+response.Data[x]['Total']+"' data-counter='' class='btn btn-sm btn-primary bg-primaya' id='btn-choose-order-"+response.Data[x]['ID']+"'>Pilih</button></div>";
                    html_data += "</p></div></div></div>";
                }
                $(".list-order-frame").empty();
                $(".list-order-frame").append(html_data);
                $(".spinner-order-frame").hide();
                $(".list-order-frame").show();
            }
            else
            {
                var html_alert = "<div class='alert alert-danger' role='alert'>"+Message+"</div>"
                $(".list-order-frame").empty();
                $(".list-order-frame").append(html_alert);
                $(".spinner-order-frame").hide();
                $(".list-order-frame").show();
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) 
        {
            var html_alert = "<div class='alert alert-danger' role='alert'>Terjadi kesalahan, silakan coba lagi</div>"
            $(".list-order-frame").empty();
            $(".list-order-frame").append(html_alert);
            $(".spinner-order-frame").hide();
            $(".list-order-frame").show();
            console.error(XMLHttpRequest.status + "\n" + textStatus + "\n" + errorThrown);
        }
    });
}

function choose_order(obj)
{
    var counter = $('#counter').val();
    var newCounter = parseInt(counter)+1;

    var ID = $(obj).attr("data-id");
    var Total = $(obj).attr("data-total");

    $(obj).attr("data-counter",newCounter);

    var html_data = "<input id='saved-ID-"+newCounter+"' value='"+ID+"' class='saved-item-row'>";
    html_data += "<input id='saved-Total-"+newCounter+"' value='"+Total+"'>";

    $("#order-"+ID).removeClass();
    $("#order-"+ID).addClass('col col-6 info');
    $("#btn-choose-order-"+ID).removeClass();
    $("#btn-choose-order-"+ID).addClass('btn btn-sm btn-danger');
    $("#btn-choose-order-"+ID).text('Batal Pilih');
    $("#btn-choose-order-"+ID).attr('onclick',"deselect_order(this);");

    $(".list-ordered-item-frame").append(html_data);

    $('#counter').val(newCounter);

    hitung_total();
}

function deselect_order(obj)
{
    var ID = $(obj).attr("data-id");
    var Total = $(obj).attr("data-total");
    var Counter = $(obj).attr("data-counter");
    
    $("#saved-ID-"+Counter).remove();
    $("#saved-Total-"+Counter).remove();


    $("#order-"+ID).removeClass();
    $("#order-"+ID).addClass('col col-6');
    $("#btn-choose-order-"+ID).removeClass();
    $("#btn-choose-order-"+ID).addClass('btn btn-sm btn-primary bg-primaya');
    $("#btn-choose-order-"+ID).text('Pilih');
    $("#btn-choose-order-"+ID).attr('onclick',"choose_order(this);");
    hitung_total();
}

function hitung_total()
{
    var counter = $("#counter").val();
    var GrandTotal = 0;
    for(x=0;x<=counter;x++)
    {
        if($('#saved-Total-'+x).length)
        {
            var Total = parseFloat($('#saved-Total-'+x).val());
            GrandTotal += Total;
        }
    }
    $("#TotalOrder").val(GrandTotal);

    var Disc = parseFloat($("#DiscPersen").val());
    var DiscRupiah = (GrandTotal*(Disc/100));
    $("#DiscRupiah").val(DiscRupiah);
    var PPN = parseFloat($("#PPNPersen").val());
    var PPNRupiah = ((GrandTotal-DiscRupiah)*(PPN/100));
    $("#PPNRupiah").val(PPNRupiah);
    var SC = parseFloat($("#SCPersen").val());
    var SCRupiah = ((GrandTotal-DiscRupiah-PPNRupiah)*(SC/100));
    $("#SCRupiah").val(SCRupiah);
    var TotalTagihan = GrandTotal-DiscRupiah+PPNRupiah+SCRupiah;
    $("#TotalTagihan").val(TotalTagihan);

    var Voucher = parseFloat($("#Voucher").val());
    var TotalBayar = parseFloat($("#TotalBayar").val());
    var TotalChange = (TotalBayar+Voucher)-TotalTagihan;
    $("#TotalChange").val(TotalChange);

    if(TotalChange < 0)
    {
        $("#btn-commit").attr('disabled',true);
    }
    else
    {
        $("#btn-commit").attr('disabled',false);
    }
}

function confirm_save()
{
    var baseurl = $("#base_url").val();
    var totalData = document.getElementsByClassName('saved-item-row').length;
    if(totalData > 0)
    {
        var conf = confirm('Simpan pembayaran ini?');
        if(conf == true)
        {
            var tempArray = [];
            var totalCounter = $("#counter").val();
            for(x=0;x<=totalCounter;x++)
            {
                if($('#saved-ID-'+x).length)
                {
                    var ID_Order = $('#saved-ID-'+x).val();
                    var Total_Order = $('#saved-Total-'+x).val();
                    tempArray.push({ID_Order: ID_Order, TotalOrder: Total_Order});
                }
            }

            var ID_User = $("#ID_User").val();


            var TotalOrder = $("#TotalOrder").val();
            var DiscPersen = $("#DiscPersen").val();
            var DiscRupiah = $("#DiscRupiah").val();
            var PPNPersen = $("#PPNPersen").val();
            var PPNRupiah = $("#PPNRupiah").val();
            var SCPersen = $("#SCPersen").val();
            var SCRupiah = $("#SCRupiah").val();
            var TotalTagihan = $("#TotalTagihan").val();
            var Voucher = $("#Voucher").val();
            var TotalBayar = $("#TotalBayar").val();
            var TotalChange = $("#TotalChange").val();
            var ID_PaymentMethod = $("#ID_PaymentMethod").val();

            $("#btn-commit").attr("disabled",true);

            $.ajax({
                type: 'POST',
                cache: false,
                timeout: 5000,
                url: baseurl+'index.php/payment/post',
                dataType: 'json',
                data:{ID_User:ID_User,TotalOrder:TotalOrder,ID_PaymentMethod:ID_PaymentMethod,DiscPersen:DiscPersen,DiscRupiah:DiscRupiah,PPNPersen:PPNPersen,PPNRupiah:PPNRupiah,SCPersen:SCPersen,SCRupiah:SCRupiah,TotalTagihan:TotalTagihan,Voucher:Voucher,TotalBayar:TotalBayar,TotalChange:TotalChange,Detail:JSON.stringify(tempArray)},
                success: function(response)
                {
                    var Success = response.Success;
                    var Message = response.Message;
                    
                    if(Success == true)
                    {
                        alert('Sukses menyimpan data');
                        window.location.href = baseurl+"index.php/payment";
                    }
                    else
                    {
                        alert(Message);
                        $("#btn-commit").attr("disabled",false);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) 
                {
                    alert('Terjadi kesalahan, silakan coba lagi');
                    console.error(XMLHttpRequest.status + "\n" + textStatus + "\n" + errorThrown);
                    $("#btn-commit").attr("disabled",false);
                }
            });
        }
    }
    else
    {
        alert('Anda belum memilih pesanan yang akan dibayar!');
    }
}