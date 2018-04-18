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
    <!--for clearing the input field-->
    <link href="../custom/css/common.css" rel="stylesheet">
    <!--For date time picker-->
    <link rel="stylesheet" href="../node_modules/flatpickr/dist/flatpickr.min.css">
    <script src="../node_modules/flatpickr/dist/flatpickr.min.js"></script>
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
</head>
<body>

<div class="wrapper">
    

    <div class="main-panel">
		


        <div class="content" id="content" name="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Pending Articles</h4>
                                <p class="category">Publish/Edit Pending Articles</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>ArticleID</th>
                                    	<th>Date/Time</th>
                                    	<th>Title</th>
                                        <th>Category</th>
                                    	<th>Creator</th>
                                        <th>Modified</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach($draftArticles as $draft) {  ?>
                                            <tr>
                                                <td><?php echo "0".$i ?></td>
                                                <td><?php echo $draft->postID ?></td>
                                                <td><?php echo $draft->date ?></td>
                                                <td><?php echo $draft->title ?></td>
                                                <td><?php echo $draft->category ?></td>
                                                <td><?php echo $draft->auther ?></td>
                                                <td><?php echo $draft->modified ?></td>
                                                <td><button onclick="getDetail(<?php echo $draft->postID ?>)" class="btn btn-primary btn-sm" name="button">Edit</button></td>
                                                <!--<td><button onclick="getDetail(<?php echo $draft->postID ?>)" class="btn btn-primary btn-sm" name="button">Edit</button></td>-->
                                                <!--<td><button onclick="publishArticle(<?php echo $draft->postID ?>)" class="btn btn-primary btn-sm" name="button">Publish</button></td>-->
                                                <td><?php echo "<a class='btn btn-primary btn-sm' onClick=\"javascript: return confirm('Please confirm Publish');\" href='articles/publishArticle/".$draft->postID."/1' role='button'>Publish</a></td> " ?>
                                                <td><?php echo "<a class='btn btn-primary btn-sm' onClick=\"javascript: return confirm('Please confirm deletion');\" href='articles/deleteArticle/".$draft->postID."/1'role='button'>Delete</a></td> " ?>                                               
                                                
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
                                    <!--this is to identify redirect page 1 for pending Articles-->
                                    <input type="hidden" name="pageToRedirect" value="1" >
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
                                                <label for="title">Article Title <span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="title" id="title" required maxlength="100">
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="titleS">Article Title (In Sinhala)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable"  name="titleS" id="titleS" required maxlength="100">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="titleT">Article Title (In Tamil)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable"  name="titleT" id="titleT" required maxlength="100">
                                                
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
                                                <label for="image">Add Images</label>
                                                <input type="file"  name="image[]" id="image" multiple>
                                                
                                                <div class="container hidden" id="imgs"></div>
                                                    <div id="dltBtn"></div>
                                                
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
                                                <label for="description" name="description">Description (In English)</label>
                                                <textarea  id="description" name="description"></textarea>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="descriptionS" name="descriptionS" >Description (In Sinahala)</label>
                                                <textarea  id="descriptionS" name="descriptionS" ></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="descriptionT" name="descriptionT" >Description (In Tamil)</label>
                                                <textarea  id="descriptionT" name="descriptionT" ></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control border-input" id="status" name="status">
                                                    <option value="0">Draft</option>
                                                    <option value="1">Publish</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="articleID" id="articleID"/>
                                    <div class="text-right">
                                        <!--<button  name="cancel" id="cancel" class="btn btn-danger btn-fill btn-wd" >Cancel</button>-->
                                        <a class='btn btn-danger btn-fill btn-wd' href=''role='button'>Cancel</a>
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
        <script src="../custom/js/adminDashboard.js"></script>
        <script type="text/javascript" src="../custom/js/common.js"></script>
<script>
//        for date time picker
        flatpickr(".flatpickr", {
            enableTime: true
        });
        
        $("#image").on('change',function() {
        $("div#imgs").removeClass("hidden");    
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
        //        prevent spaces at first
        $(function() {
            $('body').on('keydown', '#title,#titleS,#titleT', function(e) {
              console.log(this.value);
              if (e.which === 32 &&  e.target.selectionStart === 0) {
                return false;
              }  
            });
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
        
        
            <?php }
                else{
                    include('errors/index.html');
                }
            ?>

</html>
