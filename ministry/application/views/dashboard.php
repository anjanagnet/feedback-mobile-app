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
    
    <!--for the text area-->
          
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    
    <!--For expand/collapses-->
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
            if($level != 1){ 
            include("slideBar.php");
            include("header.php");
            
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
                                            <p>Add Article</p>
                                            
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
                    
<!--                    <div class="col-lg-4 col-sm-6">
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
                                            <?php // echo count($draftArticles); ?>
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
                    </div>-->
<!--                    <div class="col-lg-4 col-sm-6">
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
                                            <?php // echo count($userReq); ?>
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
                    </div>-->
                    
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
                                            <p>Add Clinics</p>
                                            <font color="red">
                                            <?php // echo count($userReq); ?>
                                            </font>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="addClinic"><i class="ti-reload"></i><b>Click to Add</b></a>
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
                                            <p>Pending Clinics submitted by you</p>
                                            <font color="red">
                                            <?php // echo count($userReq); ?>
                                            </font>
                                            
                                        </div>     
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="yourPendingClinics"><i class="ti-reload"></i><b>Click to view list</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    
<!--                    <div class="col-lg-4 col-sm-6">
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
                                            <p>Pending Clinics</p>
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
                    </div>-->

                </div>
                
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <?php         
                                    $name = $this->session->userdata('user_id');        
                                ?>
                                <h4 class="title">Recently Drafted Articles by You</h4>
                                <!--<p class="category">Pie chart</p>-->
                            </div>
                            
                            <div  class=" content table-responsive table-full-width">
                                
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <th><b>#</b></th>
                                        <th><b><font size="2">ArticleID </font></b></th>
                                        <th><b><font size="2">Date/Time</font></b></th>
                                        <th><b><font size="2">Title</font></b></th>
                                        <th><b><font size="2">Category</font></b></th>
                                        <th><b><font size="2">Modified</font></b></th>
                                        <th></th>  
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach($draftArticlesByUser as $draft) {  ?>
                                            <tr>
                                                <td><?php echo "0".$i ?></td>
                                                <td><?php echo $draft->postID ?></td>
                                                <td><?php echo $draft->date ?></td>
                                                <td><?php echo $draft->title ?></td>
                                                <td><?php echo $draft->category ?></td>
                                                <td><?php echo $draft->modified ?></td>
                                                
                                                <td><?php // if($draft->status ==1){echo "Published";} else{echo "Draft";} ?></td>
                                                <td><button onclick="getDetail(<?php echo $draft->postID ?>)" class="btn btn-primary btn-sm" name="button">Edit</button></td>
                                                <!--<td><button onclick="deleteArticle(<?php echo $article->postID ?>)" class="btn btn-primary btn-sm" name="button">Delete</button></td>-->
                                                <!--<td><a class="btn btn-primary btn-sm" href="articles/deleteArticle/<?php echo  $article->postID ;?>" role="button">Delete</a></td>-->
                                                <td><?php echo "<a class='btn btn-primary btn-sm' onClick=\"javascript: return confirm('Please confirm deletion');\" href='articles/deleteArticle/".$draft->postID."'role='button'>Delete</a></td> " ?>                                               
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
        <div class="hidden content" id="content2" name="content2">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-10 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Article</h4>
                            </div>
                            <div class="content">
                                <div id="messages"></div>
                                <form action="Articles/updateArticle" method="post" name="newArticleForm"id="newArticleForm" enctype="multipart/form-data">
                                    <input type="hidden" name="pageToRedirect" value="0" >
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="Aid">Article ID</label>
                                                <input disabled type="number" class="form-control border-input" name="Aid" id="Aid" >
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="datetimepicker">Displaying Date</label>
                                                <input name="datetime" id="datetime" class="flatpickr form-control border-input" type="text" placeholder="Select Date.." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="title">Article Title (In English)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="title" id="title"required >
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="titleS">Article Title (In Sinhala)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="titleS" id="titleS" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="titleT">Article Title (In Tamil)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="titleT" id="titleT" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="form-control border-input" id="category" name="category">
                                                    <option value="cat1">Category 1</option>
                                                    <option value="cat2">Category 2</option>
                                                    <option value="cat3">Category 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="image">Add Images
                                                <input type="file"  name="image[]" id="image" multiple></label>
                                                <!--<a onclick='removeNew()' class='btn btn-danger btn-fill btn-wd' href=''role='button'>Remove New Images</a>-->
                                                <div class="container hidden" id="imgs">
                                                    <div id="dltBtn"></div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="video">Add Video</label>
                                                <input type="url" class="form-control border-input clearable" placeholder="Please enter Video URL" name="video" id="video" >
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="description" required>Description (In English)</label>
                                                <textarea  id="description" name="description" ></textarea>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="descriptionS" required>Description (In Sinhala)</label>
                                                <textarea  id="descriptionS" name="descriptionS" ></textarea>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="descriptionT" required>Description (In Tamil)</label>
                                                <textarea  id="descriptionT" name="descriptionT" ></textarea>
                                            </div>
                                        </div>
                                    </div> 


                                    <input type="hidden" name="articleID" id="articleID"/>
                                    <div class="text-right">
                                        <a class='btn btn-danger btn-fill btn-wd' href=''role='button'>Cancel</a>
                                        <!--<button  name="cancel" id="cancel" class="btn btn-danger btn-fill btn-wd" >Cancel</button>-->
                                        <button type="submit" name="submit" id="submit" class="btn btn-success btn-fill btn-wd" >Submit</button>
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
        
        <script src="../custom/js/dashboard.js"></script>
        
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
        
        <script>
            $( function() {
                $( "#accordion" ).accordion(
//                        collapsible: true
                        );
            } );
        </script>
  </head>
        
	
            <?php } 
            else{
                include('errors/index.html');
            }
            ?>
</html>
