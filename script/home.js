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
            $('#body').append('<br/>');
        });
    }, "json");
  });
