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
                                <h4 class="title">All Clinics</h4>
                                <p class="category">Publish/Edit/Delete Clinics</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>ClinicID</th>
                                    	<th>Clinic Date/Time</th>
                                    	<th>Name</th>
                                        <th>MOH</th>
                                    	<th>Creator</th>
                                        <th>Modified</th>
                                        <th>Status</th>
                                        <th></th>
                                        

                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach($allClinics as $clinic) {  ?>
                                            <tr>
                                                <td><?php echo "0".$i ?></td>
                                                <td><?php echo $clinic->clinicID ?></td>
                                                <td><?php echo $clinic->datetime ?></td>
                                                <td><?php echo $clinic->nameE ?></td>
                                                <td><?php echo $clinic->MOH ?></td>
                                                <td><?php echo $clinic->auther ?></td>
                                                <td><?php echo $clinic->modified ?></td>
                                                <td><?php if($clinic->status ==1){echo "Published";} else{echo "Draft";} ?></td>                                                
                                                <td><button onclick="getDetail(<?php echo $clinic->clinicID ?>)" class="btn btn-primary btn-sm" name="button">Edit</button></td>
                                                <!--<td><button onclick="publishArticle(<?php // echo $draft->postID ?>)" class="btn btn-primary btn-sm" name="button">Publish</button></td>-->
                                                <td><?php echo "<a class='btn btn-primary btn-sm' onClick=\"javascript: return confirm('Please confirm Deletion');\" href='articles/deleteClinic/".$clinic->clinicID."/0'role='button'>Delete</a></td> " ?></td>
                                                <?php if($clinic->status == 0){?>
                                                <td><?php echo "<a class='btn btn-primary btn-sm' onClick=\"javascript: return confirm('Please confirm Publish');\" href='articles/publishClinic/".$clinic->clinicID."/0'role='button'>Publish</a></td> " ?></td>
                                                <?php }else if($clinic->status == 1){ ?>  
                                                <td><button class="btn btn-primary btn-sm" disabled>Publish</button></td>
                                                <?php } ?>
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
                                <h4 class="title">Edit Clinic</h4>
                            </div>
                            <div class="content">
                                <div id="messages"></div>
                                <form action="Articles/updateClinic" method="post" name="newClinicForm"id="newClinicForm" onsubmit="return confirm('Are you sure to submit this clinic?');">
                                    <!--this is to identify redirect page 0 for view clinics-->
                                    <input type="hidden" name="pageToRedirect" value="0" >
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="Cid">Clinic ID</label>
                                                <input type="number" class="form-control border-input" name="Cid" id="Cid" disabled>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="nameE">Clinic Name (In English)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="nameE" id="nameE" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="nameS">Clinic Name (In Sinhala)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="nameS" id="nameS" required>
                                                
                                            </div>
                                        </div>
                                    </div><div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="nameT">Clinic Name (In Tamil)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control border-input clearable" name="nameT" id="nameT" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="datetimepicker">Clinic Date/Time</label>
                                                <input type="text" class="flatpickr form-control border-input" name="datetime" id="datetime" placeholder="Select Date..">
                                                
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
                                                <label for="venueS">Venue Address (In Sinhala)<span style="color:red">*</span></label>
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
                                                <input type="number" min=0 oninput="validity.valid||(value='');" class="form-control border-input clearable" name="contact" id="contact" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="form-control border-input" id="category" name="category">
                                                    <option value="1">Category 1</option>
                                                    <option value="2">Category 2</option>
                                                    <option value="3">Category 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="selectedMOH">Selected MOH</label>
                                                <input type="text" class="form-control border-input" name="selectedMOH" id="selectedMOH" readonly>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <div class="checkbox"><input type="checkbox" onchange="showMOH()"> Click to change MOH</div>
                                                <!--<input type="checkbox" class="form-control border-input" name="changeSelectedMOH" id="changeSelectedMOH" >Click to change MOH-->                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden" id="showBelow" name="showBelow">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <select onchange="changeDistrict(this.value)" class="form-control border-input" id="district" name="district">
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
                                                <label for="changeMOH">Click to change MOH</label>
                                                
                                                    <select onchange="changeMOHS(this.value)" class="form-control border-input" id="changeMOH" name="changeMOH">
                                                    
                                                    </select>
                                                   
                                            </div>
                                        </div>    
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="descriptionE"required>Description (In English)</label>
                                                <textarea  id="descriptionE" name="descriptionE"></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="descriptionS"  required>Description (In Sinhala)</label>
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

                                    <input type="hidden" name="clinicID" id="clinicID"/>
                                    <div class="text-right">
                                        <!--<button  name="cancel" id="cancel" class="btn btn-danger btn-fill btn-wd" >Cancel</button>-->
                                        <a class='btn btn-danger btn-fill btn-wd' href=''role='button'>Cancel</a>
                                        <button type="submit" name="submit" id="submit" class="btn btn-success btn-fill btn-wd"  >Submit</button>
                                        
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
        <script src="../custom/js/viewClinics.js"></script>
        
        <script type="text/javascript" src="../custom/js/common.js"></script>
        
<script>
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
        
          //        prevent spaces at first
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
