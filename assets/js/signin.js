$( document ).ready(function() {
    console.log( "jquery ready!" );

    $("#btn-login").click(function(){
        prosesLogin();
    })
});


function prosesLogin()
{
    var baseurl = $("#base_url").val();
    var Username = $("#Username").val();
    var Password = $("#Password").val();

    if(Username!='' && Password!='')
    {
        $("#btn-login").attr("disabled",true);
        var html_alert = "<div class='alert alert-info' role='alert'>Silakan tunggu...</div>"
        $("#alert_frame").empty();
        $("#alert_frame").append(html_alert);

        $.ajax({
			type: 'POST',
			cache: false,
			timeout: 5000,
			url: baseurl+'index.php/signin/post',
			dataType: 'json',
			data: {Username:Username,Password:Password},
			success: function(response)
			{
				var Success = response.Success;
				var Message = response.Message;
				
				if(Success == true)
				{
                    var html_alert = "<div class='alert alert-success' role='alert'>"+Message+"</div>"
                    $("#alert_frame").empty();
                    $("#alert_frame").append(html_alert);
                    setTimeout(function(){
                        window.location.href = baseurl+'index.php/home';
                    }, 1000);
				}
				else
				{
					$("#btn-login").attr("disabled",false);
                    var html_alert = "<div class='alert alert-danger' role='alert'>"+Message+"</div>"
                    $("#alert_frame").empty();
                    $("#alert_frame").append(html_alert);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) 
			{
                $("#btn-login").attr("disabled",false);
                var html_alert = "<div class='alert alert-danger' role='alert'>Terjadi kesalahan, silakan coba lagi</div>"
                $("#alert_frame").empty();
                $("#alert_frame").append(html_alert);
                console.error(XMLHttpRequest.status + "\n" + textStatus + "\n" + errorThrown);
			}
		});
    }
    else
    {
        $("#btn-login").attr("disabled",false);
        var html_alert = "<div class='alert alert-danger' role='alert'>Nama Pengguna dan Kata Sandi tidak boleh kosong!</div>"
        $("#alert_frame").empty();
        $("#alert_frame").append(html_alert);
        
    }
}