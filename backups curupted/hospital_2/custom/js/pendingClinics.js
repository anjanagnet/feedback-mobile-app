var baseurl = document.getElementById('baseurl').getAttribute('value');
            function getDetail(id){
                $("#content").hide();
                $("div#content2").removeClass("hidden");
//                alert(baseurl)
                $.ajax(
                    {     
                     type:    'post',
                     url:     baseurl+'index.php/articles/getClinic',
                     data:    {'id':id},
                     dataType: 'json',
                     
                     success: function(data) 
                     {
                     $('#Cid').val(data['clinicID']);
                     $('#nameE').val(data['nameE']);
                     $('#nameS').val(data['nameS']);
                     $('#nameT').val(data['nameT']);
                     $('#datetime').val(data['datetime']);
                     $('#dateFinish').val(data['finishingTime']);
                     $('#venueE').val(data['venueE']);
                     $('#venueS').val(data['venueS']);
                     $('#venueT').val(data['venueT']);
                     $('#category').val(data['category']);
                     $('#contact').val(data['contact']);
                     $('#selectedMOH').val(data['MOH']);
                     $(tinymce.get('descriptionE').getBody()).html(data['descriptionE']);
                     $(tinymce.get('descriptionS').getBody()).html(data['descriptionS']);
                     $(tinymce.get('descriptionT').getBody()).html(data['descriptionT']);
                     $('#status').val(data['status']);
                     $('#clinicID').val(data['clinicID']);
                     },
                     error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                     }   
                    });
            }
            
            
            
