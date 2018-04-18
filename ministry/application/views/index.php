<!DOCTYPE>
<html>
    <head>
        <title> Login </title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="custom/css/style.css">
        <!--for clearing the input field-->
        <link href="custom/css/common.css" rel="stylesheet"> 
    </head>
    
    <body>
        <br><br><br><br><br><br>

<!--        <div class="center-block"><h3><center><font color="brown"> e-Health Mobile App <br> Admin Panel</font></center></h3></div>-->
        <div class="col-md-4 col-md-offset-4 col-vertical-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="assets/img/0.png" class="img-responsive center-block" alt="donate thumbanail" style="width:200px;height:40px;" >
                </div>
                <div class="panel-body">
                    <div id="messages"></div>
                    <form action="index.php/users/login" method="post" id="loginForm">
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control clearable" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control clearable" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="text-right">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Login</button>
                        <!--<input type="submit" value="Login">-->
                        </div>
                    </form>
                    
                </div>
                <div class="panel-footer">
                    <a href="index.php/register">Sign up</a> for Administrative Access 
                </div>
            </div>
        </div>  
        
        
        
        <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="custom/js/login.js"></script>
        <script type="text/javascript" src="custom/js/common.js"></script>
        <script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: "Welcome to <b>National Kidney Donor Registry</b> "

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>
    </body>
</html>