$(document).ready(function(){
    $("#btn_login").click(function(){
        var x = $("#login").serializeArray();
        $.get('request/auth/login.php', x, function(data) {
                    $.each(data['data'],function(i,field){
                      //  console.log(field.name + ":" + field.value + " ");
                      window.location.href = "home.php?id_user="+ field.id;
                  });
            }, "json").fail(function(data) {
              alert( data['responseJSON']['status_message'] );
            });
          });
    });
