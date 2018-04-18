var baseurl = document.getElementById('baseurl').getAttribute('value');

            function showQuestions(id,name) {
                $("#content").hide();
                $("div#content3").removeClass("hidden");
                $.ajax(
                    {
                        type:    'post',
                        url:     baseurl+'index.php/articles/loadQuestions',
                        data:    {'id':id},
                        dataType: 'json',

                        success: function(data)
                        {
                            $("#quizeName").html('<div class="alert alert-info">' +
                                '<strong>Quize Name: ' + name + '</strong> ' +
                                '</div>')
                            i=0
                            out=''
                            out += '<div class="col-md-8">'+
                                        '<div class="card">'+
                                            '<div class="header">'+
                                                '<h4 class="title">Questions<b></h4>'+
                                            '</div>'

                            out += '<div class=" content table-responsive table-full-width">'+
                                        '<table id="myTable" class="table table-striped">'+
                                            '<thead>'+
                                                '<th><b>#</b></th>'+
                                                '<th><b><font size="2">Question</font></b></th>'+
                                                '<th><b></b></th>'+
                                            '</thead>'+
                                            '<tbody>'

                            out2=''
                            data.result.forEach(function(entry) {
                                i++;
                                // $("#questionsView").append('<a onclick="showQA()">'+ i+')&nbsp &nbsp'+entry['question']+'</br></a>')
                                out2 += '<tr>'
                                out2 += '<td>'+i+'</td>'+
                                        '<td>'+entry['question']+'</td>'+
                                        '<td><button onclick="showQA('+entry["questionID"]+')">View/Edit</button></td>'
                                out2 += '</tr>'
                            });
                            out  +=  out2
                            out  +=          '</tbody>'
                            out  +=      '</table>'
                            out  +=    '</div>'
                            out  +=  '</div>'
                            out  +='</div>'


                            $("#questionsView").html(out)

                        },
                        error: function (jXHR, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });

            }

            function showQA(id,name) {
                $("#content3").hide();
                $("div#content2").removeClass("hidden");

                $.ajax(
                    {
                        type: 'post',
                        url: baseurl + 'index.php/articles/getQuestionAnswers',
                        data: {'id': id},
                        dataType: 'json',

                        success: function(data)
                        {
                            $('#questionID').val(data['question'][0].questionID);
                            $('#question').val(data['question'][0].question);

                            $('#qa1').val(data['answers'][0].Answer)
                            $('#aid1').val(data['answers'][0].AID)

                            $('#qa2').val(data['answers'][1].Answer)
                            $('#aid2').val(data['answers'][1].AID)

                            $('#qa3').val(data['answers'][2].Answer)
                            $('#aid3').val(data['answers'][2].AID)

                            $('#qa4').val(data['answers'][3].Answer)
                            $('#aid4').val(data['answers'][3].AID)

                            if(data['answers'][4].Answer){
                                $('#qa5').val(data['answers'][4].Answer)
                                $('#aid5').val(data['answers'][4].AID)

                            }

                            ans1 = "Answer 1 Wrong"
                            ans2 = "Answer 2 Wrong"
                            ans3 = "Answer 3 Wrong"
                            ans4 = "Answer 4 Wrong"
                            ans5 = "Answer 5 Wrong"

                            if(data['answers'][0].Correct == "checked"){
                                ans1 = "Answer 1 Correct"
                            }
                            if(data['answers'][1].Correct == "checked"){
                                ans2 = "Answer 2 Correct"
                            }
                            if(data['answers'][2].Correct == "checked"){
                                ans3 = "Answer 3 Correct"
                            }
                            if(data['answers'][3].Correct == "checked"){
                                ans4 = "Answer 4 Correct"
                            }
                            if(data['answers'][4].Correct == "checked"){
                                ans5 = "Answer 5 Correct"
                            }

                            output = ans1+'</br>'+ans2+'</br>'+ans3+'</br>'+ans4+'</br>'+ans5+'</br>'
                            $("#correctAns").html(output)

                        },
                        error: function (jXHR, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    })
            }


            function updateQuestion() {
                $("#updateQForm").unbind('submit').bind('submit', function () {
                    var form = $(this);
                    var qcount = document.getElementById("qNumber").value;
                    // alert("done")
                    $.ajax({
                        url: baseurl+'index.php/articles/updateQuestion',
                        type: form.attr('method'),
                        data: form.serialize(),
                        dataType: 'json',
                        success: function (response) {
                            alert("done")
                            if (response.success == true) {
                                // $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                //     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                                //     + response.messages +'<b>'+ qcount+'</b>'+ ' Added.' +
                                //     '</div>');
                                $("#newQForm")[0].reset();
                                $(".text-danger").remove();
                                $(".form-group").removeClass('has-error').removeClass('has-success');
                                $("#content2").hide();
                                $("div#content3").removeClass("hidden");
                                // $("#questionaireName").html('<div class="alert alert-info">' +
                                    // '<strong>Quize Name: ' + response.quizeName + '</strong> ' +
                                    // '</div>')
                                $('#last_id').val(response.last_id)
                                $('#questionaireName').val(response.quizeName);


                            }
                            else {
                                $.each(response.messages, function (index, value) {
                                    var element = $("#" + index);

                                    $(element)
                                        .closest('.form-group')
                                        .removeClass('has-error')
                                        .removeClass('has-success')
                                        .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                        .find('.text-danger').remove();

                                    $(element).after(value);
                                });
                            }
                        }

                    });
                    return false;
                });

            }


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
                            $('#imgs').append('<div class="img-wrap"><span class="close"></span> <img src="' + '../'+res[i] + '" class="img-thumbnail" width="304" height="236" /> </div>')
                        }
                     }
                     
//                     delete button on the image
                     $('.img-wrap .close').on('click', function() {
                        //var id = $(this).closest('.img-wrap').find('img').data('id');
//                        alert('remove picture: ' );
                        confirm('Please confirm deletion')
                        
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
            
//            function deleteArticle(id){
//                var result = confirm("Are you sure?");
//                if(result){
//                   
//                $.ajax(
//                    {    
//                    type:    'post',
//                    url:     baseurl+'index.php/articles/deleteArticle',
//                    data:    {'postID':id},
//                    dataType: 'json',
//                    success: function(data){
//                        
//                    },error: function (jXHR, textStatus, errorThrown) {
////                        alert(errorThrown);
//                    }
//                    });  
//                }
//            }
            
//            function publishArticle(id){
//                var result = confirm("Are you sure?");
//                if(result){
//                    $.ajax(
//                    {    
//                    type:    'post',
//                    url:     baseurl+'index.php/articles/publishArticle',
//                    data:    {'postID':id},
//                    dataType: 'json',
//                    success: function(data){
//                        
//                    },error: function (jXHR, textStatus, errorThrown) {
////                        alert(errorThrown);
//                    }
//                    }); 
//                }
//            }