$(function() {
      $.get('request/article/getListArticle.php', function(data) {
          $.each(data['data'],function(i,field){

            $('#body').append($('<div>', {
              id: field.id,
              class : 'article'
              }));
            $('#'+field.id).append($('<h3>', {
                text:  "Sylviane",
                id : field.id_user,
              }));
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
                    $( "<p>"+comment.content+"</p>" ).insertBefore( ".id_article" )
                    // $('#'+field.id).append("<p>"+comment.content+"</p>");
                  });
                }, "json");
            $('#'+field.id).append($('<input>', {
              type: "text",
              placeholder: "Add comment",
              name: "id_article",
              class: "id_article",
              id: field.id,
              onkeypress:"addComment(this)"
            }));

            $('#body').append('<br/>');
        });
    }, "json");
  });

  function addComment(elem) {
      if(event.key === 'Enter') {
        console.log("id : "+ elem.id);
        $.post('request/comment/addComment.php',
        { "id_article": elem.id,
          "id_user": "1",
          "content": elem.value
        } ,function(data) {
            //console.log(data["status"]);
            if (data["status"] == "200") {
              $( "<p>"+elem.value+"</p>" ).insertBefore( ".id_article" );
            }
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
