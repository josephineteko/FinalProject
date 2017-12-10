$(document).ready(function(){
    $("#btn_register").click(function(){
      var x = $("#register").serializeArray();
      $.post('request/auth/register.php', x ,function(data) {
          //console.log(data["status"]);
          if (data["status"] == "200") {
              window.location.href = "home.php?id_user="+ data['data'];
          }
        }, "json").fail(function(data) {
          alert(JSON.stringify(data));
          alert( data['responseJSON']['status_message'] );
        });
          });
    });
