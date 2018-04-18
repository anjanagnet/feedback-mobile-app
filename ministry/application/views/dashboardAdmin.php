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

    <!--For the table pagination-->

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link media="all" rel="stylesheet" type="text/css" href="../assets/css/pagination.css">
    <script type="text/javascript" src="../assets/js/pagination.js"></script>
    <!--for the chart-->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    <!--For date time picker-->
    <link rel="stylesheet" href="../node_modules/flatpickr/dist/flatpickr.min.css">
    <script src="../node_modules/flatpickr/dist/flatpickr.min.js"></script>

    <!--for clearing the input field-->
    <link href="../custom/css/common.css" rel="stylesheet">

<!--    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {




        var data = google.visualization.arrayToDataTable([
          ['Task', 'Donors'],
          ['Availble',  <?php // echo $available  ?>],
          ['Dead',  <?php // echo $dead  ?>],
          ['Donated', <?php // echo $donated  ?>],
          ['Transfer', <?php // echo $transfer  ?>],
          ['Pending Accptance',  <?php // echo $pending  ?>]
        ]);

        var options = {

          is3D: true,
        };


        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);

      }
    </script>-->



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

    </style>
</head
<body>

<div class="wrapper">


    <div class="main-panel">
<!--        <a href="home">press</a>-->


        <div class="content" id="content" name="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Add new Quize</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="newArticle"<i class="ti-calendar"></i> Click to Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Pending Articles</p>
                                            <font color="red">
                                            <?php echo count($draftArticles); ?>
                                            </font>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="pendingPublish"<i class="ti-calendar"></i> Click to View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>User Requests</p>
                                            <font color="red">
                                            <?php echo count($userReq); ?>
                                            </font>

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="request"><i class="ti-reload"></i><b>Click to Accept/Reject</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Register Student</p>
                                            <font color="red">
                                            <?php // echo count($userReq); ?>
                                            </font>

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="newStudent"><i class="ti-reload"></i><b>Click to Register</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-settings"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Manage Subjects</p>
                                            <font color="red">
                                                <?php // echo count($userReq); ?>
                                            </font>

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="manageSubjects"><i class="ti-reload"></i><b>Click Manage</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-announcement"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>View Clinics</p>
                                            <font color="red">
                                            <?php // echo count($userReq); ?>
                                            </font>

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="viewClinics"><i class="ti-reload"></i><b>Click to view list</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-more"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Pending Clinics</p>
                                            <font color="red">
                                            <?php // echo count($draftClinics); ?>
                                            </font>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="pendingClinics"<i class="ti-calendar"></i> Click to View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
-->

                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Recent Questionnaires (Published/Draft)<b><?php // echo $tot ?></b></i></h4>
                                <!--<p class="category">Pie chart</p>-->
                            </div>

                            <div class=" content table-responsive table-full-width">

                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <th><b>#</b></th>
                                        <th><b><font size="2">ArticleID </font></b></th>
                                        <th><b><font size="2">Date/Time</font></b></th>
                                        <th><b><font size="2">Questionnaire Name</font></b></th>
                                        <th><b><font size="2">Creator</font></b></th>
                                        <th><b><font size="2">Modified</font></b></th>
                                        <th><b><font size="2">Status</font></b></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach($recentQuestionnaires as $Questionnaire) {  ?>
                                            <tr>
                                                <td><?php echo "0".$i ?></td>
                                                <td><?php echo $Questionnaire->qID ?></td>
                                                <td><?php echo $Questionnaire->SubmittedDate ?></td>
                                                <td><?php echo $Questionnaire->seriesName ?></td>
                                                <td><?php echo $Questionnaire->Author ?></td>
<!--                                                <td>--><?php //echo $Questionnaire->modified ?><!--</td>-->
                                                <td><?php echo "Modified" ?></td>
                                                <td><?php if($Questionnaire->active ==1){echo "Published";} else{echo "Draft";} ?></td>
                                                <?php
                                                $id = $Questionnaire->qID;
                                                $name = $Questionnaire->seriesName;

                                                ?>
                                                <td><button onclick="showQuestions('<?php echo $id?>','<?php echo $name?>')" class="btn btn-primary btn-sm" name="button">Edit</button></td>
                                                <?php if($Questionnaire->active == 0){?>
                                                <td><?php echo "<a class='btn btn-primary btn-sm' onClick=\"javascript: return confirm('Please confirm Publish');\" href='articles/publishArticle/".$Questionnaire->qID."/0'role='button'>Publish</a></td> " ?></td>
                                                <?php }else if($Questionnaire->active == 1){ ?>
                                                <td><button class="btn btn-primary btn-sm" disabled>Publish</button></td>
                                                <?php } ?>
                                                <td><?php echo "<a class='btn btn-primary btn-sm' onClick=\"javascript: return confirm('Please confirm deletion');\" href='articles/deleteArticle/".$Questionnaire->qID."/0'role='button'>Delete</a></td> " ?>
                                            </tr>
                                        <?php $i++; }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

    </div>
</div>
        <div id="quizeName"></div>
        <div class="hidden content" id="content3" name="content2">
            <div class="container-fluid">
                <div class="row">



                            <div id="questionsView" class="content">
                                <div id="messages"></div>

                            </div>

                </div>
            </div>
        </div>

        <div class="hidden content" id="content2" name="content2">
<!--            <div id="quizeName"></div>-->
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-10 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Question</h4>
                            </div>
                            <div class="content">
                                <div id="messages"></div>
                                <form action="" method="post" id="updateQForm" name="updateQForm" enctype="multipart/form-data">

                                    <input class="hidden" id="questionID" name="questionID">
                                    <input class="hidden" id="questionaireName" name="questionaireName">
                                    <input class="hidden" id="qNumber" name="qNumber" value="">

                                    <input class="hidden" id="aid1" name="aid1" value="">
                                    <input class="hidden" id="aid2" name="aid2" value="">
                                    <input class="hidden" id="aid3" name="aid3" value="">
                                    <input class="hidden" id="aid4" name="aid4" value="">
                                    <input class="hidden" id="aid5" name="aid5" value="">

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
                                                <div id="correctAns"></div>
                                                <div class="item">
                                                    <label for="title">  Select the correct Answer </label>
                                                    <br/>

                                                    <div class="checkbox">
                                                        <label for="a1">Answer 1</label>
                                                        <input id="a1"  name="a1" type="checkbox" value="true">
                                                    </div>

                                                    <div class="checkbox">
                                                        <label for="a2">Answer 2</label>
                                                        <input id="a2"  name="a2" type="checkbox" value="true">
                                                    </div>

                                                    <div class="checkbox">
                                                        <label for="a3">Answer 3</label>
                                                        <input id="a3"  name="a3" type="checkbox" value="true">
                                                    </div>

                                                    <div class="checkbox">
                                                        <label for="a4">Answer 4</label>
                                                        <input id="a4"  name="a4" type="checkbox" value="true">
                                                    </div>

                                                    <div class="checkbox">
                                                        <label for="a5">Answer 5</label>
                                                        <input id="a5"  name="a5" type="checkbox" value="true">
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>




                                    <div class="text-right">
                                        <a class='btn btn-danger btn-fill btn-wd' href='<?php echo base_url() ?>'role='button'>Cancel</a>
                                        <!--                                        <button type="submit" name="submit" id="submit" class="btn btn-info btn-fill btn-wd" >Add next</button>-->
                                        <button onclick="updateQuestion()" class="btn btn-info btn-fill btn-wd" name="button">Save</button>
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

    <div id="baseurl" name="baseurl" value="<?php echo base_url(); ?>"></div>

        <script src="../custom/js/adminDashboard.js"></script>
        <script type="text/javascript" src="../custom/js/common.js"></script>


        <script>
//        for date time picker
        flatpickr(".flatpickr", {
            enableTime: true
        });
        $("#image").on('change',function() {
        $("div#imgs").removeClass("hidden");
        document.getElementById("imgs").innerHTML = "";
        var fileList = this.files;
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
        </script>

        <script type="text/javaScript">

        </script>


            <?php }
            else{
                include('errors/index.html');
            }

            ?>
</html>
