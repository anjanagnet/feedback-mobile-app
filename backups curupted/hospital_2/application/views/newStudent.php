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
</head>
<body>

<div class="wrapper">
	

    <div class="main-panel">



        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-10 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Register New Student</h4>
                            </div>
                            <div class="content">
                                <div id="messages"></div>
                                <form action="donors/registerStudent" method="post" id="studentRegisterForm">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                               <div class="form-group">
                                                   <li class="list-group-item list-group-item-info"><h5><b>Student's Information</b></h5></li>
                                               </div> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="nic">National Identity Card Number</label>
                                                <input type="text" class="form-control border-input" id="nic" name="nic" placeholder="Eg: 852125456V">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="lname">Password</label>
                                                <input type="password" class="form-control border-input" id="password" name="password" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="rePassword">Re-Password</label>
                                                <input type="password" class="form-control border-input" id="rePassword" name="rePassword" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" class="form-control border-input" id="fname" name="fname" placeholder="Eg: Samantha">                                                                                                                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="mname">Middle Name</label>
                                                <input type="text" class="form-control border-input" id="mname" name="mname" placeholder="Eg: Kumara">   
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="lname">Last Name</label>
                                                <input type="text" class="form-control border-input" id="lname" name="lname" placeholder="Eg: Silva">
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="dob">Date of Birth</label>
                                                <input type="date" class="form-control border-input" id="dob" name="dob" placeholder="Eg: 2016/05/20">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group border-input">
                                                <label for="gender">Gender</label>
                                                <select class="form-control border-input" id="gender" name="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="address1">Address Line 1</label>
                                                <input type="text" class="form-control border-input" id="address1" name="address1" placeholder="Eg: No. 52/1, jaya Mawatha">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="address2">Address Line 2</label>
                                                <input type="text" class="form-control border-input" id="address2" name="address2" placeholder="Eg: wijayapura">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control border-input" id="email" name="email" placeholder="Eg: silva@testmail.com">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="telephone1">Telephone Home</label>
                                                <input type="number" class="form-control border-input" id="telephone1" name="telephone1" placeholder="Eg: 0118526520">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="telephone2">Telephone Mobile</label>
                                                <input type="number" class="form-control border-input" id="telephone2" name="telephone2" placeholder="Eg: 0795258741">
                                            </div>
                                        </div>
                                    </div>
			           
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="courseLevel">Course Level</label>
                                                <select onchange="changeCourseLevel(this.value)" class="form-control border-input" id="courseLevel" name="courseLevel" required>
                                                    <?php 
                                                      foreach($levels as $level) {?>
                                                          <option value="<?php echo $level->levelID ?>"><?php echo $level->levelName ?></option>
                                                      <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="row hidden" id="cLevel" name="cLevel">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="category">Assign subjects</label>
                                                <div id="CL" name="CL">
                                                </div>   
                                            </div>
                                        </div>    
                                    </div>



<!--                                    <div class="row">-->
<!--                                        <div class="col-md-8">-->
<!--                                            <div class="form-group">-->
<!--                                                <label for="division">Division</label>-->
<!--                                                <select class="form-control border-input" id="division" name="division">-->
<!--                                                    --><?php //
//                                                      foreach($locationsDistrict as $district) {?>
<!--                                                          <option value="--><?php //echo $district->districtName ?><!--">--><?php //echo $district->districtName ?><!--</option>-->
<!--                                                      --><?php //} ?>
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-8">-->
<!--                                            <div class="form-group">-->
<!--                                                <label for="province">Province</label>-->
<!--                                                <select class="form-control border-input" id="province" name="province">-->
<!--                                                    --><?php //
//                                                      foreach($locationsProvince as $province) {?>
<!--                                                          <option value="--><?php //echo $province->provinceName ?><!--">--><?php //echo $province->provinceName ?><!--</option>-->
<!--                                                      --><?php //} ?>
<!--                                                </select>  -->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    

                                                                                                       
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" >Register Student</button>
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

<div id="baseurl" name="baseurl" value="<?php echo base_url(); ?>"></div> 
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
        <script type="text/javascript" src="../custom/js/studentRegister.js"></script>

	<script>
		function changeCourseLevel(courseLevel) {
            	var baseurl = document.getElementById('baseurl').getAttribute('value');
//            	var element = document.getElementById("MOH");
//            	element.value = district;
//            	element.innerHTML = district;
            
            
//            	alert(district)
            	$.ajax(
                    {     
                     type:    'post',
                     url:     baseurl+'index.php/articles/getSubjects',
                     data:    {'courseLevel':courseLevel},
                     dataType: 'json',
                     
                     success: function(data) 
                     {
                    
                     txt = "<div class='row'>"+"<div class='col-md-10'>"
                    
                     $("div#cLevel").removeClass("hidden");
                     if(data){
                         document.getElementById("CL").innerHTML =""
//                         $("#MOH").append("<input value="+data[0]['name']+"type='checkbox')>";
                        for(i=0 ; i<data.length ; i++){
                            $('#CL').append('<div class=""><input type="checkbox" name="myCheckbox[]" id="myCheckbox" value='+data[i]['subID']+' />' + data[i]['subName'] + "</div>")

                        }
                     }  
                     
                     $('#video').val(data['video']);
                     $(tinymce.get('description').getBody()).html(data['description']);
                     $('#status').val(data['status']);
                     $('#articleID').val(data['postID']);
                     },
                     error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                     }   
                 });
                 
                   //        prevent spaces at first
                    $(function() {
                        $('body').on('keydown', '#nameE,#nameS,#nameT,#venueE,#venueS,#venueT', function(e) {
                          console.log(this.value);
                          if (e.which === 32 &&  e.target.selectionStart === 0) {
                            return false;
                          }  
                        });
                      });
        }
	</script>

</html>
