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
        ?>
</head>
<body>

<div class="wrapper">
    

    <div class="main-panel">
		


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Requests</h4>
                                <p class="category">Accept / Reject New User Requests</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>User ID</th>
                                        <th>Username</th>
                                    	<th>First Name</th>
                                    	<th>Last Name</th>
                                    	<th>Email</th>
                                    	<th>Mobile Number</th>
                                        <th>Accept/Reject</th>
                                    </thead>
                                    <tbody>
                                        <?php for ($i=0; $i < count($userReq) ; $i++){ ?>
                                            <td><?php echo $userReq[$i]->id?></td>

                                            <td><?php echo $userReq[$i]->username ?></td>
                                            <td><?php echo $userReq[$i]->fname ?></td>
                                            <td><?php echo $userReq[$i]->lname ?></td>
                                            <td><?php echo $userReq[$i]->email ?></td>
                                            <td><?php echo $userReq[$i]->contact ?></td>
                                            <td><a class="btn btn-primary btn-sm" href="users/acceptUser/<?php echo $userReq[$i]->username ;?>" role="button">Accept</a>
                                                <a class="btn btn-primary btn-sm" href="users/rejectUser/<?php echo $userReq[$i]->username ;?>" role="button">Reject</a>
                                            </td>
                                        </tr>
                                        <?php } ?>  
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                    


                </div>
            </div>
        </div>

<!--        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
				
            </div>
        </footer>-->


    </div>
</div>


</body>
<?php }?>

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


</html>
