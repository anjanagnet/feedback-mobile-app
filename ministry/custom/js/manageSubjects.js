/**
 * Created by anjana on 4/3/17.
 */
// $(document).ready(function(){
var baseurl = document.getElementById('baseurl').getAttribute('value');
function addSubject() {
    $("#newSubject").unbind('submit').bind('submit', function () {
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success == true) {
                    $("#messageSub").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                        + response.messages +
                        '</div>');
                    $("#newSubject")[0].reset();
                    $(".text-danger").remove();
                    $(".form-group").removeClass('has-error').removeClass('has-success');
                    // hideme('#needtohide')
                    // $("#quizeName").html('<div class="alert alert-info">' +
                    //     '<strong>Quize Name: ' + response.quizeName + '</strong> ' +
                    //     '</div>')
                    // $('#last_id').val(response.last_id);
                    // $('#qNumber').val(1);
                    // $('#Qnum').html(1);

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
    $("#allSubs").hide();
    $("#newSub").hide();
    $("div#updateSub").removeClass("hidden");
//                alert(baseurl)
    $.ajax(
        {
            type:    'post',
            url:     baseurl+'index.php/articles/getSubject',
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






function hideme(con) {
    $(con).hide();
    $("div#neestoshow").removeClass("hidden");
}