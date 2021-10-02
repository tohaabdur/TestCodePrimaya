$( document ).ready(function() {
    console.log( "jquery ready!" );
});

function search()
{
    var baseurl = $("#base_url").val();
	var keyword = $("#search").val().trim();
	
	if(keyword != "")
	{
		window.location.href = baseurl+'index.php/payment/list_trans/search/'+keyword+'/0/';
	}
}

function reset_search()
{
    var baseurl = $("#base_url").val();
	window.location.href = baseurl+'index.php/payment/list_trans/main/NULL/0/';
}

function choose_trans(obj)
{
    var baseurl = $("#base_url").val();
    var ID = $(obj).attr("data-id");

    $("#selected_ID").val(ID);

    $(".spinner-detail-frame").show();
    $(".list-detail-frame").hide();
    $(".list-detail-frame").empty();

    $.ajax({
        type: 'POST',
        cache: false,
        timeout: 5000,
        url: baseurl+'index.php/payment/get_detail',
        dataType: 'json',
        data:{ID:ID},
        success: function(response)
        {
            var Success = response.Success;
            var Message = response.Message;
            
            if(Success == true)
            {
                var html_header = "<div class='table-responsive'><table class='table table-borderless'>";
                html_header += "<tbody>";
                html_header += "<tr>";
                html_header += "<td class='text-start'>ID</td>";
                html_header += "<td class='text-start'>:</td>";
                html_header += "<td class='text-start'>"+response.Header['ID']+"</td>";
                html_header += "<td class='text-start'>Waktu</td>";
                html_header += "<td class='text-start'>:</td>";
                html_header += "<td class='text-start'>"+response.Header['DateTime']+"</td>";
                html_header += "</tr>";
                html_header += "<tr>";
                html_header += "<td class='text-start'>Jenis Pembayaran</td>";
                html_header += "<td class='text-start'>:</td>";
                html_header += "<td class='text-start'>"+response.Header['PaymentMethod']+"</td>";
                html_header += "<td class='text-start'>Kasir</td>";
                html_header += "<td class='text-start'>:</td>";
                html_header += "<td class='text-start'>"+response.Header['NameUser']+"</td>";
                html_header += "</tr>";
                html_header += "</tbody>";
                html_header += "</table></div>";


                var html_data = "<div class='table-responsive'><table class='table table-striped table-hover'>";
                for(x=0;x<response.Data.length;x++)
                {
                    html_data += "<tr id='saved-item-"+response.Data[x]['ID_Order']+"'>";
                    html_data += "<td class='text-start'><strong>"+response.Data[x]['ID_Order']+" - "+response.Data[x]['TableName']+"</strong></td>";
                    html_data += "<td class='text-end'><strong>"+response.Data[x]['TotalOrder']+"</strong></td>";
                    html_data += "</tr>";
                }

                var html_footer = "<table class='table'>";
                html_footer += "<tr>";
                html_footer += "<td class='text-start'>Total Pesanan</td>";
                html_footer += "<td class='text-end'>"+response.Header['TotalOrder']+"</td>";
                html_footer += "</tr>";
                html_footer += "<tr>";
                html_footer += "<tr>";
                html_footer += "<td class='text-start'>Diskon "+response.Header['Disc']+"%</td>";
                html_footer += "<td class='text-end'>-"+response.Header['DiscRupiah']+"</td>";
                html_footer += "</tr>";
                html_footer += "<tr>";
                html_footer += "<td class='text-start'>PPN "+response.Header['PPN']+"%</td>";
                html_footer += "<td class='text-end'>"+response.Header['PPNRupiah']+"</td>";
                html_footer += "</tr>";
                html_footer += "<tr>";
                html_footer += "<td class='text-start'>Service Charge "+response.Header['ServiceCharge']+"%</td>";
                html_footer += "<td class='text-end'>"+response.Header['ServiceChargeRupiah']+"</td>";
                html_footer += "</tr>";
                html_footer += "<tr>";
                html_footer += "<td class='text-start'>Total Tagihan</td>";
                html_footer += "<td class='text-end'>"+response.Header['GrandTotal']+"</td>";
                html_footer += "</tr>";
                html_footer += "<tr>";
                html_footer += "<td class='text-start'>Voucher</td>";
                html_footer += "<td class='text-end'>"+response.Header['Voucher']+"</td>";
                html_footer += "</tr>";
                html_footer += "<tr>";
                html_footer += "<tr>";
                html_footer += "<td class='text-start'>Total Pembayaran</td>";
                html_footer += "<td class='text-end'>"+response.Header['TotalPayment']+"</td>";
                html_footer += "</tr>";
                html_footer += "<tr>";
                html_footer += "<td class='text-start'>Kembali</td>";
                html_footer += "<td class='text-end'>"+response.Header['TotalChange']+"</td>";
                html_footer += "</tr>";
                html_footer += "</table></div>";

                $(".list-detail-frame").empty();
                $(".list-detail-frame").append(html_header);
                $(".list-detail-frame").append(html_data);
                $(".list-detail-frame").append(html_footer);
                $(".spinner-detail-frame").hide();
                $(".list-detail-frame").show();
                $("#btn-delete-trans").show();
            }
            else
            {
                var html_alert = "<div class='alert alert-danger' role='alert'>"+Message+"</div>"
                $(".list-detail-frame").empty();
                $(".list-detail-frame").append(html_alert);
                $(".spinner-detail-frame").hide();
                $(".list-detail-frame").show();
                $("#btn-delete-trans").hide();
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) 
        {
            var html_alert = "<div class='alert alert-danger' role='alert'>Terjadi kesalahan, silakan coba lagi</div>"
            $(".list-detail-frame").empty();
            $(".list-detail-frame").append(html_alert);
            $(".spinner-detail-frame").hide();
            $(".list-detail-frame").show();
            $("#btn-delete-trans").hide();
            console.error(XMLHttpRequest.status + "\n" + textStatus + "\n" + errorThrown);
        }
    });
}

function delete_trans()
{
    var baseurl = $("#base_url").val();
    var ID_Trans = $("#selected_ID").val();
    var ID_User = $("#ID_User").val();

    var conf = confirm('Hapus pembayaran ini?');
    if(conf == true)
    {
        $("#btn-commit").attr("disabled",true);

        $.ajax({
            type: 'POST',
            cache: false,
            timeout: 5000,
            url: baseurl+'index.php/payment/delete_trans',
            dataType: 'json',
            data:{ID_User:ID_User,ID:ID_Trans},
            success: function(response)
            {
                var Success = response.Success;
                var Message = response.Message;
                
                if(Success == true)
                {
                    alert('Sukses menghapus data');
                    window.location.href = baseurl+"index.php/payment/list_trans";
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