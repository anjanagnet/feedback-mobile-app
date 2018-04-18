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


    <!-- Bootstrap core CSS     -->
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/bootstrap/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="../assets/bootstrap/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/bootstrap/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="../assets/bootstrap/themify-icons.css" rel="stylesheet">
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    <!--For date time picker-->
    <link rel="stylesheet" href="../node_modules/flatpickr/dist/flatpickr.min.css">
    <script src="../node_modules/flatpickr/dist/flatpickr.min.js"></script>

    <!--for clearing the input field-->
    <link href="../custom/css/common.css" rel="stylesheet">

    <?php
    if($level == 1){
    include("adminSlideBar.php");
    include("adminHeader.php");



    ?>

    <style>
        #imgs {
            white-space: nowrap;
            height: 250px;
            width: 750px;
            overflow: auto;
        }
        .sameline input{
            float:left;
        }
    </style>
</head>
    <body>

    <div class="wrapper">


        <div class="main-panel">



            <div class="content">

                <div class="container-fluid">
                    <div id="messageQues"></div>
                    <div class="row">
                        <div class="col-md-6" id="newSub">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Add new Question</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-12 form-group sameline">
                                            <form action="Questions/addQuestion" method="post" id="newQuestion" name="newQuestion" >

                                            <!--                                            <div class="form-group">-->
<!--                                                <label>Subject Name</label>-->
                                                <input type="text" class="form-control border-input clearable"  name="questionE" id="questionE" placeholder="Question in English">
                                                <input type="text" class="form-control border-input clearable"  name="questionS" id="questionS" placeholder="Question in Sinhala">
                                                <input type="text" class="form-control border-input clearable"  name="questionT" id="questionT" placeholder="Question in Tamil">
                                                <select class="form-control border-input" id="active" name="active">
                                                    <option value="1">Active</option>
                                                    <option value="0">In-active</option>
                                                </select><br>
<!--                                                <button class="btn btn-primary btn-sm" >Add</button>-->
                                                <button onclick="addQuestion()" class="btn btn-primary btn-sm" name="button">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="allSubs" class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">All Subjects</h4>
                                    <p class="category">Active/In-active Subjects</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                        <th>#</th>
                                        <th>Subject ID</th>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Status</th>
                                        <th></th>

                                        </thead>
                                        <tbody>
                                        <?php $i = 1;
                                        foreach($subjects_all as $subject) {  ?>
                                            <tr>
                                                <td><?php echo "0".$i ?></td>
                                                <td><?php echo $subject->subID ?></td>
                                                <td><?php echo $subject->subCode ?></td>
                                                <td><?php echo $subject->subName ?></td>
                                                <td><?php echo ($subject->active == 1) ?  "Active" : "In-active" ?></td>
                                                <td><button onclick="getDetail(<?php echo $subject->subID ?>)" class="btn btn-primary btn-sm" name="button">Edit</button></td>
                                                <!--<td><button onclick="getDetail(<?php //echo $clinic->clinicID ?>)" class="btn btn-primary btn-sm" name="button">Edit</button></td>-->
                                                <!--<td><button onclick="publishArticle(<?php //$clinic->clinicID ?>)" class="btn btn-primary btn-sm" name="button">Publish</button></td>-->
<!--                                                <td>--><?php //echo "<a class='btn btn-primary btn-sm' onClick=\"javascript: return confirm('Please confirm Deletion');\" href='articles/deleteClinic/".$clinic->clinicID."/1'role='button'>Delete</a></td> " ?><!--</td>-->
<!--                                                <td>--><?php //echo "<a class='btn btn-primary btn-sm' onClick=\"javascript: return confirm('Please confirm Publish');\" href='articles/publishClinic/".$clinic->clinicID."/1'role='button'>Publish</a></td> " ?>

                                            </tr>
                                            <?php $i++; }
                                        ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

<!--                        Update form-->
                        <div class="hidden" id="updateSub" id="updateSub">
                            <div class="col-md-6" >
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Update Subject</h4>
                                        <p class="category"></p>
                                    </div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-sm-12 form-group sameline">
                                                <form action="Articles/updateSubject" method="post" id="newSubject" name="newSubject" >
                                                    <input type="text" class="form-control border-input clearable"  name="updateSubCode" id="updateSubCode" placeholder="Subject Code">
                                                    <input type="text" class="form-control border-input clearable"  name="updateSubName" id="updateSubName" placeholder="Subject Name">
                                                    <select class="form-control border-input" id="level" name="level">
                                                        <?php
                                                        foreach($levels as $level) {?>
                                                            <option value="<?php echo $level->levelID ?>"><?php echo $level->levelName ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <select class="form-control border-input" id="status" name="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">In-active</option>
                                                    </select><br>
                                                    <button onclick="addSubject()" class="btn btn-primary btn-sm" name="button">Add</button>
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
        </div>
    </div>


    </body>
    <div id="baseurl" name="baseurl" value="<?php echo base_url(); ?>"></div>

<!--   Core JS Files   -->
    <script src="../assets/jquery/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

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
    <script type="text/javascript" src="../custom/js/manageQuestions.js"></script>

    <script type="text/javascript" src="../custom/js/common.js"></script>
    <script>
        //        for date time picker
        flatpickr(".flatpickr", {
            enableTime: true,
            minDate: new Date()
        });

        function showMOH(){
            $("div#showBelow").removeClass("hidden");
        }

        function changeDistrict(district) {
            var baseurl = document.getElementById('baseurl').getAttribute('value');
//            var element = document.getElementById("MOH");
//            element.value = district;
//            element.innerHTML = district;


//            alert(district)
            $.ajax(
                {
                    type:    'post',
                    url:     baseurl+'index.php/articles/getMOH',
                    data:    {'district':district},
                    dataType: 'json',

                    success: function(data)
                    {

                        txt = "<div class='row'>"+"<div class='col-md-10'>"

                        $("div#MOH").removeClass("hidden");
                        if(data){
                            document.getElementById("changeMOH").innerHTML =""
//                         $("#MOH").append("<input value="+data[0]['name']+"type='checkbox')>";
                            for(i=0 ; i<data.length ; i++){
                                $('#changeMOH').append('<option value='+data[i]['name']+","+data[i]['id']+'>' + data[i]['name'] + '</option>')

                            }
                        }

//                     $(tinymce.get('description').getBody()).html(data['description']);
//                     $('#status').val(data['status']);
//                     $('#articleID').val(data['postID']);
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });

        }

        function changeMOHS(MOH) {

            $('#selectedMOH').val(MOH);
        }

        $(function() {
            $('body').on('keydown', '#nameE,#nameS,#nameT,#venueE,#venueS,#venueT', function(e) {
                console.log(this.value);
                if (e.which === 32 &&  e.target.selectionStart === 0) {
                    return false;
                }
            });
        });
    </script>
<?php
}
else{
    include('errors/index.html');
}
?>
</html>
