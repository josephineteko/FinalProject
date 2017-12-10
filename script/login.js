// $(function() {
//       $.get('request/typeArticle/getTypeArticle.php', function(data) {
//           $.each(data['data'],function(i,field){
//             $('#type_article').append($('<option>', {
//               value: field.id,
//               text : field.name
//             }));
//         });
//     }, "json");
//   });

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
        //alert(x[name]+ " is empty.");
        // $.each(x, function(i, field){
        //   if (field.value == "") {
        //     alert(field.name+ " is empty.");
        //   }
        //     console.log(field.name + ":" + field.value + " ");
        // });
    });
