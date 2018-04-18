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

        <title><?php echo ucfirst($title) ?></title>

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

                    <div class="col-lg-10 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add new Clinic</h4>
                            </div>
                            <div class="content">
                                <div id="messages"></div>
                                <form action="Articles/addClinic" method="post" id="newClinicForm">
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="datetimepicker">Clinic Date & Time</label>
                                                <input name="date" id="date" class="flatpickr form-control border-input" type="text" placeholder="Select Date.." required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="datetimepicker">Clinic Finishing Time</label>
                                                <input name="dateFinish" id="dateFinish" class="flatpickr form-control border-input" type="text" placeholder="Select Date.." required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="venueE">Venue Address (In English)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="venueE" id="venueE" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="venueS">Venue Address (In Sinahala)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="venueS" id="venueS" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="venueT">Venue Address (In Tamil)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="venueT" id="venueT" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="contact">Venue Contact<span style="color:red">*</span></label>
                                                <input type="number"  min=0 oninput="validity.valid||(value='');" class="form-control border-input clearable" name="contact" id="contact" requied>                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="clinicNameE">Clinic Name(In English)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="clinicNameE" id="clinicNameE" requied>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="clinicNameS">Clinic Name(In Sinhala)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="clinicNameS" id="clinicNameS" requied>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="clinicNameT">Clinic Name(In Tamil)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="clinicNameT" id="clinicNameT" requied>
                                                
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
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <select onchange="changeDistrict(this.value)" class="form-control border-input" id="district" name="district" required>
                                                    <?php 
                                                      foreach($locationsDistrict as $district) {?>
                                                          <option value="<?php echo $district->id ?>"><?php echo $district->districtName ?></option>
                                                      <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row hidden" id="MOH" name="MOH">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="category">Click to Add MOHS</label>
                                                <div id="MO" name="MO">
                                                </div>   
                                            </div>
                                        </div>    
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="descriptionE">Description(In English)</label>
                                                <textarea  id="descriptionE" name="descriptionE" ></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="descriptionS">Description(In Sinhala)</label>
                                                <textarea  id="descriptionS" name="descriptionS" ></textarea>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="descriptionT" >Description(In Tamil)</label>
                                                <textarea  id="descriptionT" name="descriptionT" ></textarea>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    <?php if($level==1){  ?>
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
                                    <?php } ?>  
                                   
                                                                                                       
                                    <div class="text-right">
                                        <a class='btn btn-danger btn-fill btn-wd' href='<?php echo base_url() ?>'role='button'>Cancel</a>
                                        <button type="submit" name="submit" id="submit" class="btn btn-info btn-fill btn-wd" >Submit</button>
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
        <script type="text/javascript" src="../custom/js/common.js"></script>
        <script>
//        for date time picker            
        flatpickr(".flatpickr", {
            enableTime: true,
            minDate: new Date()
        });
        
//        alert($('#district').val());
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
                         document.getElementById("MO").innerHTML =""
//                         $("#MOH").append("<input value="+data[0]['name']+"type='checkbox')>";
                        for(i=0 ; i<data.length ; i++){
                            $('#MO').append('<div class="checkbox"><input type="checkbox" name="myCheckbox[]" id="myCheckbox" value='+data[i]['name']+","+data[i]['id']+' />' + data[i]['name'] + "</div>")

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
        
//      prevent spaces at first
        $(function() {
            $('body').on('keydown', '#venueE,#venueS,#venueT,#clinicNameE,#clinicNameS,#clinicNameT', function(e) {
              console.log(this.value);
              if (e.which === 32 &&  e.target.selectionStart === 0) {
                return false;
              }  
            });
          });   
        </script>

</html>
