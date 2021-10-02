$( document ).ready(function() {
    console.log( "jquery ready!" );
});

function search()
{
    var baseurl = $("#base_url").val();
	var keyword = $("#search").val().trim();
	
	if(keyword != "")
	{
		window.location.href = baseurl+'index.php/product/index/search/'+keyword+'/0/';
	}
}

function reset_search()
{
    var baseurl = $("#base_url").val();
	window.location.href = baseurl+'index.php/product/index/main/NULL/0/';
}

function popup_new()
{
    $("#ModalDetailProduct #ID").hide();
    $("#ModalDetailProduct #btn-delete").hide();
    $("#ModalDetailProduct #Name").val('');
    $("#ModalDetailProduct #ID_Category").val('');
    $("#ModalDetailProduct #ID_Subcategory").empty();
    $("#ModalDetailProduct #ID_Subcategory").append('<option>Pilih Kategori Telebih Dahulu</option>');
    $("#ModalDetailProduct #ID_Unit").val('');
    $("#ModalDetailProduct #Price").val('');
    $("#ModalDetailProduct #Image").val('');
    $("#ModalDetailProduct #FlagReady").val('1');
    $("#ModalDetailProduct #btn-confirm").attr('onclick','save_new()');

    var myModal = new bootstrap.Modal(document.getElementById('ModalDetailProduct'));
    myModal.show();
}

function change_category()
{
    var ID_Category = $("#ID_Category").val();
    var baseurl = $("#base_url").val();
    $.ajax({
        type: 'POST',
        cache: false,
        timeout: 5000,
        url: baseurl+'index.php/product/get_subcategory',
        dataType: 'json',
        data:{ID_Category:ID_Category},
        success: function(response)
        {
            var Success = response.Success;
            var Message = response.Message;
            
            if(Success == true)
            {
                
                var html_data = "";
                for(x=0;x<response.Data.length;x++)
                {
                    html_data += "<option value='"+response.Data[x]['ID']+"'>"+response.Data[x]['Name']+"</option>";
                }

                $("#ID_Subcategory").empty();
                $("#ID_Subcategory").append(html_data);
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

function save_new()
{
    var Name = $("#Name").val();
    var ID_User = $("#ID_User").val();
    var ID_Category = $("#ID_Category").val();
    var ID_Subcategory = $("#ID_Subcategory").val();
    var ID_Unit = $("#ID_Unit").val();
    var Price = $("#Price").val();
    var FlagReady = $("#FlagReady").val();
    var Image = $("#Image").val();
    var baseurl = $("#base_url").val();

    if(Name != '' && ID_Category != '' && ID_Subcategory != '' && ID_Unit != '' && Price != '' && FlagReady != '' && Image != '')
    {
        $.ajax({
            type: 'POST',
            cache: false,
            timeout: 5000,
            url: baseurl+'index.php/product/post',
            dataType: 'json',
            data:{Name:Name,ID_Category:ID_Category,ID_Subcategory:ID_Subcategory,ID_Unit:ID_Unit,Price:Price,FlagReady:FlagReady,Image:Image,ID_User:ID_User},
            success: function(response)
            {
                var Success = response.Success;
                var Message = response.Message;
                
                if(Success == true)
                {
                    alert(Message);
                    window.location.href = baseurl+'index.php/product';
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
    else
    {
        alert('Seluruh form harus diisi');
    }
}

function choose_product(obj)
{
    var baseurl = $("#base_url").val();
    var ID = $(obj).attr("data-id");

    $("#selected_ID").val(ID);

    $.ajax({
        type: 'POST',
        cache: false,
        timeout: 5000,
        url: baseurl+'index.php/product/get_detail',
        dataType: 'json',
        data:{ID:ID},
        success: function(response)
        {
            var Success = response.Success;
            var Message = response.Message;
            
            if(Success == true)
            {
                $("#ModalDetailProduct #ID").show();
                $("#ModalDetailProduct #btn-delete").show();
                $("#ModalDetailProduct #ID").val(response.Data['ID']);
                $("#ModalDetailProduct #Name").val(response.Data['Name']);
                $("#ModalDetailProduct #ID_Category").val(response.Data['ID_Category']);
                $("#ModalDetailProduct #ID_Subcategory").empty();
                $("#ModalDetailProduct #ID_Subcategory").append("<option value='"+response.Data['ID_Subcategory']+"'>"+response.Data['NameSubcategory']+"</option>");
                $("#ModalDetailProduct #ID_Unit").val(response.Data['ID_Unit']);
                $("#ModalDetailProduct #Price").val(response.Data['Price']);
                $("#ModalDetailProduct #Image").val(response.Data['Image']);
                $("#ModalDetailProduct #FlagReady").val(response.Data['FlagReady']);
                $("#ModalDetailProduct #btn-confirm").attr('onclick','save_edit()');

                var myModal = new bootstrap.Modal(document.getElementById('ModalDetailProduct'));
                myModal.show();
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

function save_edit()
{
    var ID = $("#ID").val();
    var Name = $("#Name").val();
    var ID_User = $("#ID_User").val();
    var ID_Category = $("#ID_Category").val();
    var ID_Subcategory = $("#ID_Subcategory").val();
    var ID_Unit = $("#ID_Unit").val();
    var Price = $("#Price").val();
    var FlagReady = $("#FlagReady").val();
    var Image = $("#Image").val();
    var baseurl = $("#base_url").val();

    if(ID!='' && Name != '' && ID_Category != '' && ID_Subcategory != '' && ID_Unit != '' && Price != '' && FlagReady != '' && Image != '')
    {
        $.ajax({
            type: 'POST',
            cache: false,
            timeout: 5000,
            url: baseurl+'index.php/product/update_data',
            dataType: 'json',
            data:{ID:ID, Name:Name,ID_Category:ID_Category,ID_Subcategory:ID_Subcategory,ID_Unit:ID_Unit,Price:Price,FlagReady:FlagReady,Image:Image,ID_User:ID_User},
            success: function(response)
            {
                var Success = response.Success;
                var Message = response.Message;
                
                if(Success == true)
                {
                    alert(Message);
                    window.location.href = baseurl+'index.php/product';
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
    else
    {
        alert('Seluruh form harus diisi');
    }
}

function delete_data()
{
    var baseurl = $("#base_url").val();
    var ID = $("#ID").val();
    var ID_User = $("#ID_User").val();

    var conf = confirm('Hapus produk ini?');
    if(conf == true)
    {


        $("#btn-confirm").attr("disabled",true);
        $("#btn-delete").attr("disabled",true);

        $.ajax({
            type: 'POST',
            cache: false,
            timeout: 5000,
            url: baseurl+'index.php/product/delete_data',
            dataType: 'json',
            data:{ID_User:ID_User,ID:ID},
            success: function(response)
            {
                var Success = response.Success;
                var Message = response.Message;
                
                if(Success == true)
                {
                    alert('Sukses menghapus data');
                    window.location.href = baseurl+"index.php/product/index";
                }
                else
                {
                    alert(Message);
                    $("#btn-confirm").attr("disabled",false);
                    $("#btn-delete").attr("disabled",false);
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) 
            {
                alert('Terjadi kesalahan, silakan coba lagi');
                console.error(XMLHttpRequest.status + "\n" + textStatus + "\n" + errorThrown);
                $("#btn-confirm").attr("disabled",false);
                $("#btn-delete").attr("disabled",false);
            }
        });
    }
}