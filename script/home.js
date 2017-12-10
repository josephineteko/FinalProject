$(function() {
      $.get('request/article/getListArticle.php', function(data) {

          $.each(data['data'],function(i,field){

            $('#body').append($('<div>', {
              id: field.id,
              class : 'article'
              }));
            $('#'+field.id).append($('<h3>', {
                id : "h3_"+field.id
              }));
              $('#h3_'+field.id).append($('<img>', {
                  id : field.id_user,
                  class : "type_article",
                  hspace : "20",
                  value : field.username,
                  src : field.path_logo
                }));
            $('#h3_'+field.id).append(field.username);
            $('#'+field.id).append($('<img>', {
              src: 'request/article/'+ field.path_img,
              name : field.id_img
            }));
            $('#'+field.id).append($('<h3>', {
              text : field.title
            }));
            $('#'+field.id).append($('<p>', {
              text: field.content,
            }));
            $('#'+field.id).append('<h4>Comment</h4>');
            //

            $.get('request/comment/getListComment.php',
            { "id_article": field.id } ,function(data_comment) {    //console.log(data["code"]);
                $.each(data_comment['data'],function(i,comment){
                    $( "<p><b>"+ comment.username +"</b> "+comment.content+"</p>" ).insertBefore( "."+field.id )
                    // $('#'+field.id).append("<p>"+comment.content+"</p>");
                  });
                }, "json");
            $('#'+field.id).append($('<input>', {
              type: "text",
              placeholder: "Add comment",
              name: "id_article",
              class: field.id,
              id: field.id,
              onkeypress:"addComment(this)"
            }));

            $('#body').append('<br/>');
        });
    }, "json");
  });

  function addComment(elem) {
    var id_user = document.getElementById('id_user').value;
      if(event.key === 'Enter') {
        $.post('request/comment/addComment.php',
        { "id_article": elem.id,
          "id_user": id_user,
          "content": elem.value
        } ,function(data) {
            //console.log(data["status"]);
            if (data["status"] == "200") {
              $( "<p>"+elem.value+"</p>" ).insertBefore( "."+elem.id );
            }
            elem.value = "";
            // $.each(data['data'],function(i,field){
            //     e
            //   });
            }, "json");
      }
  }

  // $.get('request/article/getListArticle.php', function(data) {
  //     $.each(data['data'],function(i,field){
  //       });
  //     }, "json");
