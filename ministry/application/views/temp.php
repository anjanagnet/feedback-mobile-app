<!doctype html>
<html lang="en">
<?php
$level = $this->session->userdata('user_level');
?>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php echo $title ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" type="text/css" href="custom/css/style.css">
    <!-- Bootstrap core CSS     -->
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/bootstrap/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="../assets/bootstrap/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!--<link href="../assets/bootstrap/demo.css" rel="stylesheet" />-->

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="../assets/bootstrap/themify-icons.css" rel="stylesheet">

    <!--for clearing the input field-->
    <link href="../custom/css/common.css" rel="stylesheet">

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>


    <?php
    if($level == 1){
        include("adminSlideBar.php");
        include("adminHeader.php");

    }
    else{
        include("header.php");
        include("slideBar.php");
    }
    ?>

    <style>
        #imgs {
            white-space: nowrap;
            height: 250px;
            width: 750px;
            overflow: auto;
        }
    </style>
</head>
<body>

<div class="wrapper">


    <div class="main-panel">



        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <!--                    <div class="col-lg-10 col-md-7">-->
                    <!--                        <div class="card">-->
                    <!--                            <div class="header">-->
                    <!--                                <h4 class="title">Add new Article</h4>-->
                    <!--                            </div>-->
                    <div class="content">
                        <div id="messages"></div>
                        <div id="quizeName"></div>

                        <div id="needtohide">
                            <div class="col-lg-5 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-success text-left">
                                                    <i class="ti-plus"></i>
                                                    <p>Please Enter Quize Name</p>
                                                </div>
                                            </div>



                                            <div class="col-xs-10">
                                                <div class="numbers">
                                                    <form action="Articles/addNewQuestionnaire" method="post" id="newQuestionnaire" name="newQuestionnaire" enctype="multipart/form-data">

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control border-input clearable"  name="qName" id="qName" placeholder="Name of the Quize">

                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="footer">
                                            <hr />
                                            <div class="stats">
                                                <!--                                                    <a href="newArticle"<i class="ti-calendar"></i> Click to Add Questions</a>-->
                                                <button type="submit" name="submit" id="submit" class="btn btn-info btn-fill btn-wd" >Save</button>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                        </div>-->
                    <!--                    </div>-->

                    <div id="neestoshow" class="hidden">
                        <div class="col-lg-10 col-md-7">
                            <div class="card">

                                <div class="content">
                                    <div id="messages"></div>

                                    <form action="Articles/addQuestion" method="post" id="questionAnswerForm" name="questionAnswerForm" enctype="multipart/form-data">

                                        <input class="hidden" id="last_id" name="last_id">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label for="question">  <span style="color:red">Question 1 *</span></label>
                                                    <input type="text" class="form-control border-input clearable"  name="question" id="question" >

                                                    <br/>
                                                    <hr>
                                                    <div class="item">
                                                        <label for="title">  <b>Answers</b> </label>
                                                        <br/>

                                                        <label for="qa1">1. <span style="color:red"> *</span></label>
                                                        <input type="text" class="form-control border-input clearable" id="qa1" name="qa1">

                                                        <label for="qa2">2. <span style="color:red"> *</span></label>
                                                        <input type="text" class="form-control border-input clearable" id="qa2" name="qa2">

                                                        <label for="qa3">3. <span style="color:red"> *</span></label>
                                                        <input type="text" class="form-control border-input clearable" id="qa3" name="qa3">

                                                        <label for="qa4">4. <span style="color:red"> *</span></label>
                                                        <input type="text" class="form-control border-input clearable" id="qa4" name="qa4">

                                                        <label for="qa5">5. </label>
                                                        <input type="text" class="form-control border-input clearable" id="qa5" name="qa5">
                                                    </div class="item">

                                                    <br/>
                                                    <hr>
                                                    <div class="item">
                                                        <label for="title">  Select the correct Answer </label>
                                                        <br/>

                                                        <div class="checkbox">
                                                            <label for="a1">Answer 1</label>
                                                            <input id="a1"  name="a1" type="checkbox" value="1">
                                                        </div>

                                                        <div class="checkbox">
                                                            <label for="a2">Answer 2</label>
                                                            <input id="a2"  name="a2" type="checkbox" value="1">
                                                        </div>

                                                        <div class="checkbox">
                                                            <label for="a3">Answer 3</label>
                                                            <input id="a3"  name="a3" type="checkbox" value="1">
                                                        </div>

                                                        <div class="checkbox">
                                                            <label for="a4">Answer 4</label>
                                                            <input id="a4"  name="a4" type="checkbox" value="1">
                                                        </div>

                                                        <div class="checkbox">
                                                            <label for="a5">Answer 5</label>
                                                            <input id="a5"  name="a5" type="checkbox" value="1">
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>




                                        <div class="text-right">
                                            <a class='btn btn-danger btn-fill btn-wd' href='<?php echo base_url() ?>'role='button'>Cancel</a>
                                            <button type="submit" name="submit" id="submit" class="btn btn-info btn-fill btn-wd" >Add next</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>




    </div>
</div>



</body>

<!--   Core JS Files   -->
<script src="../assets/jquery/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/jquery/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="../assets/jquery/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="../assets/jquery/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../assets/jquery/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="../assets/jquery/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<!--<script src="../assets/jquery/demo.js"></script>-->

<!--Validations-->

<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="../custom/js/newArticle.js"></script>

<!--        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('preview').src=e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
}
        </script>-->

<!--new article-->
<!--<script type="text/javascript" src="../custom/js/newArticle.js"></script>-->


<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
        width: "100%",
        height: "400"
    });

    function updateTinyMCE(){
        tinyMCE.triggerSave();
        console.log('save');
        //alert($('#elm1').html());return false;
        $("textarea")
            .show()
            .css("visibility","visible")
            .height('0')
            .width('0');
    }

    $(document).ready(function(){
        $(window).bind('keydown',function(e){
            var buttonCode=e.charCode||e.keyCode;
            if (buttonCode==13){
                $(document).trigger('preSubmitTinyMCE');
            }
        });

        $('input').bind('mousedown',function(){
            $(document).trigger('preSubmitTinyMCE');
        });


    });

    $(document).bind('preSubmitTinyMCE',function(){
        updateTinyMCE();
    });

</script>

<script>
    $("#image").on('change',function() {
        document.getElementById("imgs").innerHTML = "";
        var fileList = this.files;
        $("div#imgs").removeClass("hidden");
        for(var i = 0; i < fileList.length; i++)
        {
            //get a blob
            var t = window.URL || window.webkitURL;
            var objectUrl = t.createObjectURL(fileList[i]);

            $('#imgs').append('<img src="' + objectUrl + '" class="img-thumbnail" width="304" height="236" />');

            j = i+1;
            if(j % 3 == 0)
            {
                $('#imgs').append('<br>');
            }

        }
    });

    //        prevent spaces at first
    $(function() {
        $('body').on('keydown', '#title,#titleS,#titleT,#video', function(e) {
            console.log(this.value);
            if (e.which === 32 &&  e.target.selectionStart === 0) {
                return false;
            }
        });
    });




</script>

</html>









































<!doctype html>
<html lang="en">
<?php
$level = $this->session->userdata('user_level');
?>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php echo $title ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" type="text/css" href="custom/css/style.css">
    <!-- Bootstrap core CSS     -->
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/bootstrap/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="../assets/bootstrap/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!--<link href="../assets/bootstrap/demo.css" rel="stylesheet" />-->

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="../assets/bootstrap/themify-icons.css" rel="stylesheet">

    <!--for clearing the input field-->
    <link href="../custom/css/common.css" rel="stylesheet">

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>


    <?php
    if($level == 1){
        include("adminSlideBar.php");
        include("adminHeader.php");

    }
    else{
        include("header.php");
        include("slideBar.php");
    }
    ?>

    <style>
        #imgs {
            white-space: nowrap;
            height: 250px;
            width: 750px;
            overflow: auto;
        }
    </style>
</head>
<body>
<div id="baseurl" name="baseurl" value="<?php echo base_url(); ?>"></div>
<div class="wrapper">


    <div class="main-panel">



        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <!--                    <div class="col-lg-10 col-md-7">-->
                    <!--                        <div class="card">-->
                    <!--                            <div class="header">-->
                    <!--                                <h4 class="title">Add new Article</h4>-->
                    <!--                            </div>-->
                    <div class="content">
                        <div id="quizeName"></div>
                        <div id="messages"></div>


                        <div id="needtohide">
                            <div class="col-lg-5 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form action="Articles/addNewQuestionnaire" method="post" id="newQuestionnaire" name="newQuestionnaire" >
                                                    <div class="icon-big icon-success text-left">
                                                        <i class="ti-plus"></i>
                                                        <p>Please Enter Quize Name</p>
                                                        <input type="text" class="form-control border-input clearable"  name="qName" id="qName" placeholder="Name of the Quize">
                                                    </div>
                                                    </br>
                                                    <div class="icon-big icon-success text-left">
                                                        <p>Please Select Subject Name</p>
                                                        <select class="form-control border-input" id="subject" name="subject">
                                                            <?php
                                                            foreach($subjects as $subject) {?>
                                                                <option value="<?php echo $subject->SID ?>"><?php echo $subject->SubjectName." ( ".$subject->SubjectCode.")" ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </form>











                                            </div>
                                        </div>

                                        <div class="footer">
                                            <hr />
                                            <div class="stats">
                                                <!--                                                    <a href="newArticle"<i class="ti-calendar"></i> Click to Add Questions</a>-->
                                                <!--                                                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-fill btn-wd" >Save</button>-->
                                                <button onclick="addQuestionaire()" class="btn btn-primary btn-sm" name="button">Save</button>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                        </div>-->
                    <!--                    </div>-->

                    <div id="neestoshow" class="hidden">
                        <div class="col-lg-10 col-md-7">
                            <div class="card">

                                <div class="content">
                                    <div id="messages"></div>

                                    <form action="" method="post" id="newQForm" name="newQForm" enctype="multipart/form-data">

                                        <input class="hidden" id="last_id" name="last_id">
                                        <input class="hidden" id="questionaireName" name="questionaireName">
                                        <input class="hidden" id="qNumber" name="qNumber" value="">

                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label for="question">  <span style="color:red">Question <div id="Qnum" style="display: inline;"></div> *</span></label>
                                                    <input type="text" class="form-control border-input clearable"  name="question" id="question" >

                                                    <br/>
                                                    <hr>
                                                    <div class="item">
                                                        <label for="title">  <b>Answers</b> </label>
                                                        <br/>

                                                        <label for="qa1">1. <span style="color:red"> *</span></label>
                                                        <input type="text" class="form-control border-input clearable" id="qa1" name="qa1">

                                                        <label for="qa2">2. <span style="color:red"> *</span></label>
                                                        <input type="text" class="form-control border-input clearable" id="qa2" name="qa2">

                                                        <label for="qa3">3. <span style="color:red"> *</span></label>
                                                        <input type="text" class="form-control border-input clearable" id="qa3" name="qa3">

                                                        <label for="qa4">4. <span style="color:red"> *</span></label>
                                                        <input type="text" class="form-control border-input clearable" id="qa4" name="qa4">

                                                        <label for="qa5">5. </label>
                                                        <input type="text" class="form-control border-input clearable" id="qa5" name="qa5">
                                                    </div class="item">

                                                    <br/>
                                                    <hr>
                                                    <div class="item">
                                                        <label for="title">  Select the correct Answer </label>
                                                        <br/>

                                                        <div class="checkbox">
                                                            <label for="a1">Answer 1</label>
                                                            <input id="a1"  name="a1" type="checkbox" value="1">
                                                        </div>

                                                        <div class="checkbox">
                                                            <label for="a2">Answer 2</label>
                                                            <input id="a2"  name="a2" type="checkbox" value="1">
                                                        </div>

                                                        <div class="checkbox">
                                                            <label for="a3">Answer 3</label>
                                                            <input id="a3"  name="a3" type="checkbox" value="1">
                                                        </div>

                                                        <div class="checkbox">
                                                            <label for="a4">Answer 4</label>
                                                            <input id="a4"  name="a4" type="checkbox" value="1">
                                                        </div>

                                                        <div class="checkbox">
                                                            <label for="a5">Answer 5</label>
                                                            <input id="a5"  name="a5" type="checkbox" value="1">
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>




                                        <div class="text-right">
                                            <a class='btn btn-danger btn-fill btn-wd' href='<?php echo base_url() ?>'role='button'>Cancel</a>
                                            <!--                                        <button type="submit" name="submit" id="submit" class="btn btn-info btn-fill btn-wd" >Add next</button>-->
                                            <button onclick="addQuestion()" class="btn btn-info btn-fill btn-wd" name="button">Save</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>




    </div>
</div>



</body>

<!--   Core JS Files   -->
<script src="../assets/jquery/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/jquery/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="../assets/jquery/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="../assets/jquery/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../assets/jquery/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="../assets/jquery/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<!--<script src="../assets/jquery/demo.js"></script>-->

<!--Validations-->

<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../assets/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="../custom/js/newArticle.js"></script>

<!--        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('preview').src=e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
}
        </script>-->

<!--new article-->
<!--<script type="text/javascript" src="../custom/js/newArticle.js"></script>-->


<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
        width: "100%",
        height: "400"
    });

    function updateTinyMCE(){
        tinyMCE.triggerSave();
        console.log('save');
        //alert($('#elm1').html());return false;
        $("textarea")
            .show()
            .css("visibility","visible")
            .height('0')
            .width('0');
    }

    $(document).ready(function(){
        $(window).bind('keydown',function(e){
            var buttonCode=e.charCode||e.keyCode;
            if (buttonCode==13){
                $(document).trigger('preSubmitTinyMCE');
            }
        });

        $('input').bind('mousedown',function(){
            $(document).trigger('preSubmitTinyMCE');
        });


    });

    $(document).bind('preSubmitTinyMCE',function(){
        updateTinyMCE();
    });

</script>

<script>
    $("#image").on('change',function() {
        document.getElementById("imgs").innerHTML = "";
        var fileList = this.files;
        $("div#imgs").removeClass("hidden");
        for(var i = 0; i < fileList.length; i++)
        {
            //get a blob
            var t = window.URL || window.webkitURL;
            var objectUrl = t.createObjectURL(fileList[i]);

            $('#imgs').append('<img src="' + objectUrl + '" class="img-thumbnail" width="304" height="236" />');

            j = i+1;
            if(j % 3 == 0)
            {
                $('#imgs').append('<br>');
            }

        }
    });

    //        prevent spaces at first
    $(function() {
        $('body').on('keydown', '#title,#titleS,#titleT,#video', function(e) {
            console.log(this.value);
            if (e.which === 32 &&  e.target.selectionStart === 0) {
                return false;
            }
        });
    });




</script>

</html>
