$( document ).ready(function() {
    console.log( "jquery ready!" );
});

function search()
{
    var baseurl = $("#base_url").val();
	var keyword = $("#search").val().trim();
	
	if(keyword != "")
	{
		window.location.href = baseurl+'index.php/order/list_trans/search/'+keyword+'/0/';
	}
}

function reset_search()
{
    var baseurl = $("#base_url").val();
	window.location.href = baseurl+'index.php/order/list_trans/main/NULL/0/';
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
        url: baseurl+'index.php/order/get_detail',
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
                html_header += "<td class='text-start'>Meja</td>";
                html_header += "<td class='text-start'>:</td>";
                html_header += "<td class='text-start'>"+response.Header['TableName']+" <input type='hidden' id='ID_Table' value='"+response.Header['ID_Table']+"'></td>";
                html_header += "<td class='text-start'>Pelayan</td>";
                html_header += "<td class='text-start'>:</td>";
                html_header += "<td class='text-start'>"+response.Header['NameUser']+"</td>";
                html_header += "</tr>";
                html_header += "</tbody>";
                html_header += "</table></div>";



                var html_data = "<div class='table-responsive'><table class='table table-striped table-hover'>";
                for(x=0;x<response.Data.length;x++)
                {
                    html_data += "<tr id='saved-item-"+response.Data[x]['Counter']+"'>";
                    html_data += "<td class='text-start' colspan='2'><strong>"+response.Data[x]['Name']+"</strong></td>";
                    html_data += "</tr>";
                    html_data += "<tr>";
                    html_data += "<td class='text-start' colspan='2'><strong id='Price_text"+response.Data[x]['Counter']+"'>"+response.Data[x]['Price']+" x "+response.Data[x]['Qty']+" = "+response.Data[x]['Total']+"</strong></td>";
                    html_data += "</tr>";
                    html_data += "<tr>";
                    html_data += "<td class='text-start'><i id='Notes_text"+response.Data[x]['Counter']+"'>Notes: "+response.Data[x]['Notes']+"</i></td>";
                    html_data += "<td class='text-end'>";
                    html_data += "<button class='btn-warning btn btn-sm' id='btn-edit-"+response.Data[x]['Counter']+"' onclick='edit_temp_product(this);' data-id='"+response.Data[x]['ID_Product']+"' data-counter='"+response.Data[x]['Counter']+"' data-name='"+response.Data[x]['Name']+"' data-price='"+response.Data[x]['Price']+"' data-qty='"+response.Data[x]['Qty']+"' data-notes='"+response.Data[x]['Notes']+"'>Ubah</button>";
                    html_data += "&nbsp;<button class='btn-danger btn btn-sm' id='btn-delete-"+response.Data[x]['Counter']+"' onclick='delete_temp_product(this);' onclick='delete_product(this);' data-id='"+response.Data[x]['ID_Product']+"' data-counter='"+response.Data[x]['Counter']+"' data-name='"+response.Data[x]['Name']+"' data-price='"+response.Data[x]['Price']+"' data-qty='"+response.Data[x]['Qty']+"' data-notes='"+response.Data[x]['Notes']+"'>Hapus</button>";
                    html_data += "</td>";
                    html_data += "</tr>";
                }

                var html_footer = "<table class='table'>";
                html_footer += "<tr>";
                html_footer += "<td class='text-start'>Total Pesanan</td>";
                html_footer += "<td class='text-end'>"+response.Header['Total']+"</td>";
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

function edit_temp_product(obj)
{
    var ID = $(obj).attr("data-id");
    var Name = $(obj).attr("data-name");
    var Price = $(obj).attr("data-price");
    var Qty = $(obj).attr("data-qty");
    var Total = $(obj).attr("data-total");
    var Notes = $(obj).attr("data-notes");
    var CounterExisting = $(obj).attr("data-counter");

    $("#ModalDetailProduct #From").val('Update');
    $("#ModalDetailProduct #CounterExisting").val(CounterExisting);
    $("#ModalDetailProduct #ProductID").val(ID);
    $("#ModalDetailProduct #ProductName").val(Name);
    $("#ModalDetailProduct #ProductPrice").val(Price);
    $("#ModalDetailProduct #ProductQty").val(Qty);
    $("#ModalDetailProduct #ProductNotes").val(Notes);

    var myModal = new bootstrap.Modal(document.getElementById('ModalDetailProduct'));
    myModal.show();
}

function save_temp_product()
{
    var baseurl = $("#base_url").val();
    var ID_Trans = $("#selected_ID").val();
    var ID_User = $("#ID_User").val();

    var From = $("#ModalDetailProduct #From").val();
    var CounterExisting = $("#ModalDetailProduct #CounterExisting").val();
    var ID = $("#ModalDetailProduct #ProductID").val();
    var Name = $("#ModalDetailProduct #ProductName").val();
    var Price =  $("#ModalDetailProduct #ProductPrice").val();
    var Qty = $("#ModalDetailProduct #ProductQty").val();
    var Notes = $("#ModalDetailProduct #ProductNotes").val();
    var Total = parseFloat(parseFloat(Qty)*parseFloat(Price));

    $.ajax({
        type: 'POST',
        cache: false,
        timeout: 5000,
        url: baseurl+'index.php/order/update_data',
        dataType: 'json',
        data:{ID_User:ID_User,ID:ID_Trans,ID_Product:ID,Price:Price,Counter:CounterExisting,Qty:Qty,Notes:Notes,Total:Total},
        success: function(response)
        {
            var Success = response.Success;
            var Message = response.Message;
            
            if(Success == true)
            {
                alert('Sukses menyimpan data');
                $('.btn-close').click();
                $("#btn-choose-trans-"+ID_Trans).click();
            }
            else
            {
                alert(Message);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) 
        {
            alert('Terjadi kesalahan, silakan coba lagi');
            console.error(XMLHttpRequest.status + "\n" + textStatus + "\n" + errorThrown);
        }
    });    
}

function delete_temp_product(obj)
{
    var conf = confirm('Hapus produk ini?');
    if(conf == true)
    {
        var baseurl = $("#base_url").val();
        var ID_Trans = $("#selected_ID").val();
        var ID_User = $("#ID_User").val();
        var ID = $(obj).attr("data-id");
        var Name = $(obj).attr("data-name");
        var Price = $(obj).attr("data-price");
        var Qty = $(obj).attr("data-qty");
        var Total = $(obj).attr("data-total");
        var Notes = $(obj).attr("data-notes");
        var CounterExisting = $(obj).attr("data-counter");

        $.ajax({
            type: 'POST',
            cache: false,
            timeout: 5000,
            url: baseurl+'index.php/order/delete_data',
            dataType: 'json',
            data:{ID_User:ID_User,ID:ID_Trans,ID_Product:ID,Price:Price,Counter:CounterExisting,Qty:Qty,Notes:Notes,Total:Total},
            success: function(response)
            {
                var Success = response.Success;
                var Message = response.Message;
                
                if(Success == true)
                {
                    alert('Sukses menghapus data');
                    $("#btn-choose-trans-"+ID_Trans).click();
                }
                else
                {
                    alert(Message);
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) 
            {
                alert('Terjadi kesalahan, silakan coba lagi');
                console.error(XMLHttpRequest.status + "\n" + textStatus + "\n" + errorThrown);
            }
        });
    }
}

function delete_trans()
{
    var baseurl = $("#base_url").val();
    var ID_Trans = $("#selected_ID").val();
    var ID_User = $("#ID_User").val();
    var ID_Table = $("#ID_Table").val();

    var conf = confirm('Hapus pesanan ini?');
    if(conf == true)
    {
        $("#btn-commit").attr("disabled",true);

        $.ajax({
            type: 'POST',
            cache: false,
            timeout: 5000,
            url: baseurl+'index.php/order/delete_trans',
            dataType: 'json',
            data:{ID_User:ID_User,ID:ID_Trans},
            success: function(response)
            {
                var Success = response.Success;
                var Message = response.Message;
                
                if(Success == true)
                {
                    alert('Sukses menghapus data');
                    window.location.href = baseurl+"index.php/order/list_trans";
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