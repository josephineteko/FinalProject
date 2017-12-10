$(function() {
      $.get('request/typeArticle/getTypeArticle.php', function(data) {
          $.each(data['data'],function(i,field){
            $('#type_article').append($('<option>', {
              value: field.id,
              text : field.name
            }));
        });
    }, "json");
  });
