var baseurl = document.getElementById('baseurl').getAttribute('value');
            function getDetail(id){
                $("#content").hide();
                $("div#content2").removeClass("hidden");
//                alert(baseurl)
                $.ajax(
                    {     
                     type:    'post',
                     url:     baseurl+'index.php/articles/getArticle',
                     data:    {'id':id},
                     dataType: 'json',
                     
                     success: function(data) 
                     {
                       
//                     alert(data['path'].length)
//                     alert(data['description'])
                     if (typeof data['path'] !== 'undefined'){
                     var res = data['path'].split(","); }
                     $('#Aid').val(data['postID']);
                     $('#datetime').val(data['date']);
                     $('#title').val(data['title']);
                     $('#titleS').val(data['titleS']);
                     $('#titleT').val(data['titleT']);                     
                     $('#category').val(data['category']);
                     
                     if (typeof data['path'] !== 'undefined'){
                        $("div#imgs").removeClass("hidden");
                        $('#dltBtn').append('<button class="btn btn-primary btn-sm" onclick="deleteImages('+data['postID']+')" name="button">Delete Images</button>');
                        for(i=0 ; i< res.length ; i++){
                        $('#imgs').append('<div class="img-wrap"><span class="close">&times;</span> <img src="' + '../'+res[i] + '" class="img-thumbnail" width="304" height="236" /> </div>')}
                     }
                     
//                     delete button on the image
                     $('.img-wrap .close').on('click', function() {
                    //var id = $(this).closest('.img-wrap').find('img').data('id');
                    alert('remove picture: ' );
});
                     $('#video').val(data['video']);
                     $(tinymce.get('description').getBody()).html(data['description']);
                     $(tinymce.get('descriptionS').getBody()).html(data['descriptionS']);
                     $(tinymce.get('descriptionT').getBody()).html(data['descriptionT']);
                     $('#status').val(data['status']);
                     $('#articleID').val(data['postID']);
                     },
                     error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                     }   
                    });
            }
            
            function deleteImages(id){
                var result = confirm("Are you sure?");
                if(result){
                $.ajax(
                    {    
                        type:    'post',
                        url:     baseurl+'index.php/articles/deleteImages',
                        data:    {'postID':id},
                        dataType: 'json',
                        success: function(data){

                        },error: function (jXHR, textStatus, errorThrown) {
    //                        alert(errorThrown);
                        }
                    });  
                }
            }
            
