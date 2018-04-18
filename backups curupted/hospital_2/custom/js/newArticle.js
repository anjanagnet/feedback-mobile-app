// $(document).ready(function(){
var baseurl = document.getElementById('baseurl').getAttribute('value');
function addQuestionaire() {

    $("#newQuestionnaire").unbind('submit').bind('submit', function () {
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success == true) {
                    $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                        + response.messages +
                        '</div>');
                    $("#newQuestionnaire")[0].reset();
                    $(".text-danger").remove();
                    $(".form-group").removeClass('has-error').removeClass('has-success');
                    hideme('#needtohide')
                    $("#quizeName").html('<div class="alert alert-info">' +
                        '<strong>Quize Name: ' + response.quizeName + '</strong> ' +
                        '</div>')
                    $('#last_id').val(response.last_id);
                    $('#qNumber').val(1);
                    $('#Qnum').html(1);

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


    function addQuestion() {
        $("#newQForm").unbind('submit').bind('submit', function () {
            var form = $(this);
            var qcount = document.getElementById("qNumber").value;
            $.ajax({
                url: baseurl+'index.php/articles/addQuestion',
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function (response) {
                    if (response.success == true) {
                        $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                            + response.messages +'<b>'+ qcount+'</b>'+ ' Added.' +
                            '</div>');
                        $("#newQForm")[0].reset();
                        $(".text-danger").remove();
                        $(".form-group").removeClass('has-error').removeClass('has-success');
                        hideme('#needtohide')
                        $("#questionaireName").html('<div class="alert alert-info">' +
                            '<strong>Quize Name: ' + response.quizeName + '</strong> ' +
                            '</div>')
                        $('#last_id').val(response.last_id);
                        $('#questionaireName').val(response.quizeName);
                        var q = parseInt(qcount)
                        q = q+1
                        $('#qNumber').val(q);
                        $('#Qnum').html(q);

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






function hideme(con) {
    $(con).hide();
    $("div#neestoshow").removeClass("hidden");
}
