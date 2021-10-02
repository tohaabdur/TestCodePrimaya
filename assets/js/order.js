$( document ).ready(function() {
    console.log( "jquery ready!" );
    get_table();
});

function get_table()
{
    var baseurl = $("#base_url").val();

    $(".table-frame").show();
    $(".spinner-table-frame").show();
    $(".list-table-frame").hide();
    $(".category-frame").hide();
    $(".spinner-category-frame").hide();
    $(".list-category-frame").hide();
    $(".product-frame").hide();
    $(".spinner-product-frame").hide();
    $(".list-product-frame").hide();
    $(".table-status").hide();
    $(".table-edit-btn").hide();
    $(".list-table-frame").empty();

    $.ajax({
        type: 'GET',
        cache: false,
        timeout: 5000,
        url: baseurl+'index.php/order/get_table',
        dataType: 'json',
        success: function(response)
        {
            var Success = response.Success;
            var Message = response.Message;
            
            if(Success == true)
            {
                var html_table = "";
                for(x=0;x<response.Data.length;x++)
                {
                    html_table += "<div class='col col-3' onclick='choose_table(this);' data-id='"+response.Data[x]['ID']+"' data-name='"+response.Data[x]['Name']+"'><div class='card mb-2 rounded-3 shadow-sm'><div class='card-body'><p class='card-text'>"+response.Data[x]['Name']+"&nbsp;<strong>("+response.Data[x]['CounterTrans']+")</strong> Pesanan</p></div></div></div>";
                }
                $(".list-table-frame").empty();
                $(".list-table-frame").append(html_table);

                $(".spinner-table-frame").hide();
                $(".list-table-frame").show();
                $(".table-frame").show();
            }
            else
            {
                var html_alert = "<div class='alert alert-danger' role='alert'>"+Message+"</div>"
                $(".list-table-frame").empty();
                $(".list-table-frame").append(html_alert);

                $(".spinner-table-frame").hide();
                $(".list-table-frame").show();
                $(".table-frame").show();
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) 
        {
            var html_alert = "<div class='alert alert-danger' role='alert'>Terjadi kesalahan, silakan coba lagi</div>"
            $(".list-table-frame").empty();
            $(".list-table-frame").append(html_alert);

            $(".spinner-table-frame").hide();
            $(".list-table-frame").show();
            $(".table-frame").show();
            console.error(XMLHttpRequest.status + "\n" + textStatus + "\n" + errorThrown);
        }
    });
}

function choose_table(obj)
{
    var ID = $(obj).attr("data-id");
    var Name = $(obj).attr("data-name");
    $('#ID_Table').val(ID);
    $('.table-status').text(Name);
    $(".table-frame").hide();
    $(".list-table-frame").hide();
    $(".category-frame").show();
    $(".list-category-frame").show();
    $(".product-frame").show();
    $(".list-product-frame").show();
    $(".table-status").show();
    $(".table-edit-btn").show();
    $(".list-ordered-item-frame").show();

    get_subcategory();
}

function get_subcategory()
{
    var baseurl = $("#base_url").val();

    $(".spinner-category-frame").show();
    $(".list-category-frame").hide();
    $(".list-category-frame").empty();

    $.ajax({
        type: 'GET',
        cache: false,
        timeout: 5000,
        url: baseurl+'index.php/order/get_subcategory',
        dataType: 'json',
        success: function(response)
        {
            var Success = response.Success;
            var Message = response.Message;
            
            if(Success == true)
            {
                var html_category = "";
                for(x=0;x<response.Data.length;x++)
                {
                    html_category += "<div class='col col-4' onclick='choose_subcategory(this);' data-id='"+response.Data[x]['ID']+"' data-name='"+response.Data[x]['Name']+"'><div class='card mb-2 rounded-3 shadow-sm'><div class='card-body'><p class='card-text'>"+response.Data[x]['Name']+"</p></div></div></div>";
                }
                $(".list-category-frame").empty();
                $(".list-category-frame").append(html_category);
                $(".spinner-category-frame").hide();
                $(".list-category-frame").show();
                get_product('1');
            }
            else
            {
                var html_alert = "<div class='alert alert-danger' role='alert'>"+Message+"</div>"
                $(".list-category-frame").empty();
                $(".list-category-frame").append(html_alert);
                $(".spinner-category-frame").hide();
                $(".list-category-frame").show();
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) 
        {
            var html_alert = "<div class='alert alert-danger' role='alert'>Terjadi kesalahan, silakan coba lagi</div>"
            $(".list-category-frame").empty();
            $(".list-category-frame").append(html_alert);
            $(".spinner-category-frame").hide();
            $(".list-category-frame").show();
            console.error(XMLHttpRequest.status + "\n" + textStatus + "\n" + errorThrown);
        }
    });
}

function choose_subcategory(obj)
{
    var ID = $(obj).attr("data-id");
    var Name = $(obj).attr("data-name");
    get_product(ID);
}

function get_product(ID_Subcategory)
{
    var baseurl = $("#base_url").val();

    $(".spinner-product-frame").show();
    $(".list-product-frame").hide();
    $(".list-product-frame").empty();

    $.ajax({
        type: 'POST',
        cache: false,
        timeout: 5000,
        url: baseurl+'index.php/order/get_product',
        dataType: 'json',
        data:{ID_Subcategory:ID_Subcategory},
        success: function(response)
        {
            var Success = response.Success;
            var Message = response.Message;
            
            if(Success == true)
            {
                var html_data = "";
                for(x=0;x<response.Data.length;x++)
                {
                    if(response.Data[x]['FlagReady'] == '1')
                    {
                        html_data += "<div class='col col-4' onclick='choose_product(this);' data-id='"+response.Data[x]['ID']+"' data-name='"+response.Data[x]['Name']+"' data-price='"+response.Data[x]['Price']+"'><div class='card mb-2 rounded-3 shadow-sm'><img src='"+baseurl+"assets/images/product/"+response.Data[x]['Image']+"' class='card-img-top' alt=''><div class='card-body'><p class='card-text'>"+response.Data[x]['Name']+"</p></div></div></div>";
                    }
                    else
                    {
                        html_data += "<div class='col col-4' data-id='"+response.Data[x]['ID']+"' data-name='"+response.Data[x]['Name']+"' data-price='"+response.Data[x]['Price']+"'><div class='card mb-2 rounded-3 shadow-sm'><img src='"+baseurl+"assets/images/product/"+response.Data[x]['Image']+"' class='card-img-top' alt=''><div class='card-body'><p class='card-text danger'>"+response.Data[x]['Name']+" (Not Ready)</p></div></div></div>";
                    }
                }
                $(".list-product-frame").empty();
                $(".list-product-frame").append(html_data);
                $(".spinner-product-frame").hide();
                $(".list-product-frame").show();
            }
            else
            {
                var html_alert = "<div class='alert alert-danger' role='alert'>"+Message+"</div>"
                $(".list-product-frame").empty();
                $(".list-product-frame").append(html_alert);
                $(".spinner-product-frame").hide();
                $(".list-product-frame").show();
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) 
        {
            var html_alert = "<div class='alert alert-danger' role='alert'>Terjadi kesalahan, silakan coba lagi</div>"
            $(".list-product-frame").empty();
            $(".list-product-frame").append(html_alert);
            $(".spinner-product-frame").hide();
            $(".list-product-frame").show();
            console.error(XMLHttpRequest.status + "\n" + textStatus + "\n" + errorThrown);
        }
    });
}

function choose_product(obj)
{
    var ID = $(obj).attr("data-id");
    var Name = $(obj).attr("data-name");
    var Price = $(obj).attr("data-price");

    $("#ModalDetailProduct #From").val('New');
    $("#ModalDetailProduct #ProductID").val(ID);
    $("#ModalDetailProduct #ProductName").val(Name);
    $("#ModalDetailProduct #ProductPrice").val(Price);
    $("#ModalDetailProduct #ProductQty").val(1);
    $("#ModalDetailProduct #ProductNotes").val('');

    var myModal = new bootstrap.Modal(document.getElementById('ModalDetailProduct'));
    myModal.show();
}

function save_temp_product()
{
    var counter = $('#counter').val();
    var newCounter = parseInt(counter)+1;

    var From = $("#ModalDetailProduct #From").val();
    var CounterExisting = $("#ModalDetailProduct #CounterExisting").val();
    var ID = $("#ModalDetailProduct #ProductID").val();
    var Name = $("#ModalDetailProduct #ProductName").val();
    var Price =  $("#ModalDetailProduct #ProductPrice").val();
    var Qty = $("#ModalDetailProduct #ProductQty").val();
    var Notes = $("#ModalDetailProduct #ProductNotes").val();
    var Total = parseFloat(parseFloat(Qty)*parseFloat(Price));

    if(From == 'New')
    {
        var html_data = "<li class='list-group-item d-flex justify-content-between align-items-start saved-item-row' id='saved-item-"+newCounter+"'>";
        html_data += "<div class='ms-2 me-auto'>";
        html_data += "<div class='fw-bold'>"+Name+"</div>";
        html_data += "<div id='Price_text"+newCounter+"'>"+Price+" x "+Qty+" = "+Total+"</div><div><i id='Notes_text"+newCounter+"'>Notes: "+Notes+"</i></div>";
        html_data += "</div>";
        html_data += "<button class='btn-warning btn btn-sm' onclick='edit_temp_product(this);' data-id='"+newCounter+"'>Ubah</button>";
        html_data += "&nbsp;<button class='btn-danger btn btn-sm' onclick='delete_temp_product(this);' data-id='"+newCounter+"'>Hapus</button>";

        html_data += "<input type='hidden' readonly class='form-control-plaintext' id='ID"+newCounter+"' value='"+ID+"'></input>";
        html_data += "<input type='hidden' readonly class='form-control-plaintext' id='Name"+newCounter+"' value='"+Name+"'></input>";
        html_data += "<input type='hidden' readonly class='form-control-plaintext' id='Price"+newCounter+"' value='"+Price+"'></input>";
        html_data += "<input type='hidden' readonly class='form-control-plaintext' id='Qty"+newCounter+"' value='"+Qty+"'></input>";
        html_data += "<input type='hidden' readonly class='form-control-plaintext' id='Notes"+newCounter+"' value='"+Notes+"'></input>";
        html_data += "<input type='hidden' readonly class='form-control-plaintext' id='Total"+newCounter+"' value='"+Total+"'></input>";

        html_data += "</li>";
        $(".list-ordered-item-frame").append(html_data);
        $('#counter').val(newCounter);
    }
    else
    {
        $("#ID"+CounterExisting).val(ID);
        $("#Name"+CounterExisting).val(Name);
        $("#Price"+CounterExisting).val(Price);
        $("#Qty"+CounterExisting).val(Qty);
        $("#Total"+CounterExisting).val(Total);
        $("#Notes"+CounterExisting).val(Notes);

        $("#Price_text"+CounterExisting).text(Price+" x "+Qty+" = "+Total);
        $("#Notes_text"+CounterExisting).text("Notes: "+Notes);
    }

    $(".spinner-ordered-item-frame").hide();
    $(".list-ordered-item-frame").show();
    hitung_total();
    $('.btn-close').click();
}

function hitung_total()
{
    var counter = $("#counter").val();
    var GrandTotal = 0;
    for(x=0;x<=counter;x++)
    {
        if($('#ID'+x).length)
        {
            var Total = parseFloat($("#Total"+x).val());
            GrandTotal += Total;
        }
    }
    $("#TotalOrder").val(GrandTotal);
}

function edit_temp_product(obj)
{
    var CounterExisting = $(obj).attr("data-id");

    var ID = $("#ID"+CounterExisting).val();
    var Name = $("#Name"+CounterExisting).val();
    var Price = $("#Price"+CounterExisting).val();
    var Qty = $("#Qty"+CounterExisting).val();
    var Total = $("#Total"+CounterExisting).val();
    var Notes = $("#Notes"+CounterExisting).val();

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

function delete_temp_product(obj)
{
    var ID = $(obj).attr("data-id");
    $("#saved-item-"+ID).remove();
    hitung_total();
}

function confirm_save()
{
    var baseurl = $("#base_url").val();
    var totalData = document.getElementsByClassName('saved-item-row').length;
    if(totalData > 0)
    {
        var conf = confirm('Simpan pesanan ini?');
        if(conf == true)
        {
            var tempArray = [];
            var totalCounter = $("#counter").val();
            for(x=0;x<=totalCounter;x++)
            {
                if($('#ID'+x).length)
                {
                    var ID_Product = $('#ID'+x).val();
                    var Name = $('#Name'+x).val();
                    var Price = $('#Price'+x).val();
                    var Qty = $('#Qty'+x).val();
                    var Total = $('#Total'+x).val();
                    var Notes = $('#Notes'+x).val();

                    tempArray.push({ID_Product: ID_Product, Name: Name, Price: Price, Qty:Qty, Total:Total, Notes:Notes});
                }
            }

            var ID_User = $("#ID_User").val();
            var ID_Table = $("#ID_Table").val();
            var GrandTotal = $("#TotalOrder").val();

            $("#btn-commit").attr("disabled",true);

            $.ajax({
                type: 'POST',
                cache: false,
                timeout: 5000,
                url: baseurl+'index.php/order/post',
                dataType: 'json',
                data:{ID_User:ID_User,ID_Table:ID_Table,Total:GrandTotal,Detail:JSON.stringify(tempArray)},
                success: function(response)
                {
                    var Success = response.Success;
                    var Message = response.Message;
                    
                    if(Success == true)
                    {
                        alert('Sukses menyimpan data');
                        window.location.href = baseurl+"index.php/order";
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
        alert('Pesanan masih kosong!');
    }
}