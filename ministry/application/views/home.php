
<!DOCTYPE html>
<html lang="en">
<head>
<title>News Feed</title>

<!--image slider-->
<link href="../assets/css/w3.css" type="text/css" rel="stylesheet" media="all">
<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Revived Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free Web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta tags -->
<!-- Custom Theme files -->
<link href="../assets/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="../assets/css/style.css" type="text/css" rel="stylesheet" media="all">


<!-- //Custom Theme files -->
<!-- js -->
<script src="../assets/js/jquery-1.11.1.min.js"></script> 
<!-- //js -->
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Stint+Ultra+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!-- //web-fonts -->
<!-- animate -->  
<script src="../assets/js/wow.min.js"></script>
<!--	<script>
		 new WOW().init();
	</script>-->
<!-- //end-animate --> 
</head>
<body>
	<!-- banner -->
	<div id="home" class="agileits-banner">
		<div class="bnr-agileinfo">
			<div class="banner-top">
				<div class="container">
					<div class="col-md-6 banner-top-left wow slideInDown animated" data-wow-delay=".5s">
						<ul class="w3layouts-icons">
							<li><a href="#"> </a></li>
							<li><a href="#" class="fb"> </a></li>
							<li><a href="#" class="in"> </a></li>
							<li><a href="#" class="dott"> </a></li>
						</ul>
					</div>
<!--					<div class="col-md-6 banner-top-right wow slideInDown animated" data-wow-delay=".5s">
						<p><span class="glyphicon glyphicon-earphone"></span> +11 999 8888 7777 </p>
					</div>-->
					<div class="clearfix"> </div>
				</div>
			</div>
<!--			<div class="banner-w3text">
				<h1 class="wow slideInRight animated" data-wow-delay=".5s"><a href="home.php">Revived</a></h1>
				<p class="wow slideInLeft animated" data-wow-delay=".5s">Lorem Ipsum was popularised </p>
			</div>-->
			<!-- navigation -->
			<div class="top-nav wow">
				<div class="container">
					<div class="navbar-header w3llogo">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							Menu
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="menu">
							<ul class="nav navbar">
								<li class="menu-item menu-item-current"><a href="#home" class="menu-link scroll">Home</a></li>
								<li class="menu-item"><a href="#about" class="menu-link scroll" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">About</a></li>
								<li class="menu-item"><a href="#services" class="menu-link scroll" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Services</a></li>
								<li class="menu-item"><a href="#work" class="menu-link scroll" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Works</a></li>
								<li class="menu-item"><a href="#gallery" class="menu-link scroll" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Gallery</a></li>
								<li class="menu-item"><a href="#contact" class="menu-link scroll" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Contact</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
						<script src="../assets/js/classie.js"></script>
						<script>
							(function() {
								[].slice.call(document.querySelectorAll('.menu')).forEach(function(menu) {
									var menuItems = menu.querySelectorAll('.menu-link'),
										setCurrent = function(ev) {
											ev.preventDefault();

											var item = ev.target.parentNode; // li
											
											// return if already current
											if( classie.has(item, 'menu-item-current') ) {
												return false;
											}
											// remove current
											classie.remove(menu.querySelector('.menu-item-current'), 'menu-item-current');
											// set current
											classie.add(item, 'menu-item-current');
										};
									
									[].slice.call(menuItems).forEach(function(el) {
										el.addEventListener('click', setCurrent);
									});
								});
							})(window);
						</script>
					</div>
					<!-- script-for sticky-nav -->
					<script>
					$(document).ready(function() {
						 var navoffeset=$(".top-nav").offset().top;
						 $(window).scroll(function(){
							var scrollpos=$(window).scrollTop(); 
							if(scrollpos >=navoffeset){
								$(".top-nav").addClass("fixed");
							}else{
								$(".top-nav").removeClass("fixed");
							}
						 });
						 
					});
					</script>
					<!-- //script-for sticky-nav -->
				</div>
			</div>	
			<!-- //navigation -->
		</div>
	</div>
	<!-- //banner -->
	<!-- welcome -->
	<div class="welcome" id="about">
            <div id="articlecontainer" name="articlecontainer" class="container">
			<h2 class="title wow bounceIn animated" data-wow-delay=".5s">Welcome e-Health Application</h2>
                        <?php foreach($recentArticles as $article){ ?>
                        <div >
                            <h4>&nbsp; <?php echo $article->title?>    <h1>&nbsp;&nbsp;&nbsp;Published on : <?php echo $article->date ?> </h1></h4>
                            <div class="col-md-4 welcome-left wow slideInLeft animated" data-wow-delay=".5s">
				<?php  $a  = explode(',', $article->path );
//                                       echo strlen($a[0]);
                                       if(strlen($a[0]) > 0){
                                ?>
                                       <img src="<?php  echo '../'.$a[0] ?>" alt="image"/> <?php } ?>
                            </div>
                            <div class="col-md-8 welcome-right wow slideInRight animated" data-wow-delay=".5s">
				<?php 
                                $dscription= $article->description;
                                $description = (strlen($dscription) > 500) ? substr($dscription,0,500).'...' : $dscription;
                                echo $description;
                                ?> 
                                <a href="#portfolioModal<?php echo $article->postID ?>" class="b-link-stripe b-animate-go wow zoomIn animated" data-wow-delay=".5s" data-toggle="modal"><h3>View more..</h3></a>
                                <!--<a href="javascript:showContent(<?php // echo $article->postID; ?>)"><h3>View more..</h3></a>-->
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="modal fade" id="portfolioModal<?php echo $article->postID ?>" tabindex="-1" aria-hidden="true">
					<div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><center><b><?php echo $article->title?></b></center></h4>
                                        </div>
                                        <div class="modal-content">
                                            <div align="right">
                                                <img style="width: 5%; height: 5%" src="../assets/images/cross.png" class="" data-dismiss="modal"/>
                                            </div> 
						
						<div class="portfolio-container" >
                                                    <div class="container-fluid">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="modal-body">
										
										
										<!--<img src="../assets/images/g2.jpg" class="img-responsive img-centered" alt="">-->
                                                                                <!--added clause 'embed' to the original path of the video-->
                                                                                
                                                                                
                                                                                    <div class="w3-content w3-display-container">
                                                                                            <?php for($i=0 ; $i<count($a); $i++){ 
                                                                                                    if(strlen($a[$i])>10) {?>
                                                                                                        <img class="mySlides img-responsive img-centered" src="<?php echo '../'.$a[$i] ?>" style="width:100%">
                                                                                            <?php }}?>

                                                                                        <a class="w3-btn-floating w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
                                                                                        <a class="w3-btn-floating w3-display-right" onclick="plusDivs(1)">&#10095;</a>        
                                                                                    </div>
                                                                                <script>
                                                                                    var slideIndex = 1;
                                                                                    showDivs(slideIndex);

                                                                                    function plusDivs(n) {
                                                                                      showDivs(slideIndex += n);
                                                                                    }

                                                                                    function showDivs(n) {
                                                                                      var i;
                                                                                      var x = document.getElementsByClassName("mySlides");
                                                                                      if (n > x.length) {slideIndex = 1}    
                                                                                      if (n < 1) {slideIndex = x.length}
                                                                                      for (i = 0; i < x.length; i++) {
                                                                                         x[i].style.display = "none";  
                                                                                      }
                                                                                      x[slideIndex-1].style.display = "block";  
                                                                                    }
                                                                                </script>
                                                                                <hr>     
                                                                                <?php echo $article->description ?>   
                                                                                    
                                                                                                                                                                     
                                                                                
                                                                        </div>
								</div>
							</div>
                                                    </div>    
						</div>
					</div>
			</div>
                        
                        <?php } ?>

	    </div>
	</div>
        <a href="#"><h3>Load more..</h3></a>
	<!-- //welcome -->
	<!-- services -->
	<div class="welcome wthree-services" id="services">
		<div class="container">
			<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">Our Services</h3>
			<div class="services-info w3-agile">
				<div class="col-md-4 services-grids wow zoomIn animated" data-wow-delay=".5s">
					<div class="seragile-info">
						<div class="icon-holder">
							<span class="glyphicon glyphicon-briefcase"></span>
						</div> 
						<h4 class="heading">Duis euismod mass</h4> 
						<p class="text">Vestibulum velit dolor pulvinar ut tempus sit amet, congue eget velit</p>
					</div>
				</div>
				<div class="col-md-4 services-grids wow zoomIn animated" data-wow-delay=".5s">
					<div class="seragile-info">
						<div class="icon-holder">
							<span class="glyphicon glyphicon-check"></span>
						</div> 
						<h4 class="heading">Etiam pharetraame</h4>
						<p class="text">Tibulumves velit dolor pulvinar ut tempus sit amet, congue eget velit</p>
					</div>
				</div>
				<div class="col-md-4 services-grids wow zoomIn animated" data-wow-delay=".5s">
					<div class="seragile-info">
						<div class="icon-holder">
							<span class="glyphicon glyphicon-globe"></span>
						</div>
						<h4 class="heading">Sed tincidunt lore</h4>
						<p class="text">Dolor vestibulum velit pulvinar ut tempus sit amet, congue eget velit</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //services -->
	<!-- work -->
	<div class="welcome work-w3-agileits" id="work">
		<div class="container">
			<div class="work-info">
				<div class="col-md-3 work-grids work-grd1 wow slideInLeft animated" data-wow-delay=".5s">
					<h3 class="title">Work</h3>
					<p>Aenean sed euismod sem ac iaculis metus congue eget velit, Nulla pharetra lacus sed ac iaculis metus auctor sollicitudin. Donec molestie augue a eros auctor aliquam. In vitae posuere massa. </p>
					<ul>
						<li><span class="glyphicon glyphicon-ok-circle"></span> Lorem ipsum dolor sit </li>
						<li><span class="glyphicon glyphicon-ok-circle"></span> Morbi pretium lacus neque</li>
						<li><span class="glyphicon glyphicon-ok-circle"></span> Phasellus posuere nisi ve</li>
						<li><span class="glyphicon glyphicon-ok-circle"></span> Etiam blandit orci blandit</li>
					</ul>
				</div>
				<div class="col-md-3 work-grids agileits-w3layouts wow zoomIn animated" data-wow-delay=".5s">
					<img src="../assets/images/img4.jpg" alt=""/>
					<div class="img-caption">
						<div class="img-text">
							<h4>Lorem ipsum</h4>
							<p>Etiam pellentesque felis dolor quis efficitur eros </p>
						</div>
					</div>
				</div>
				<div class="col-md-3 work-grids agileits-w3layouts wow zoomIn animated" data-wow-delay=".5s">
					<img src="../assets/images/img5.jpg" alt=""/>
					<div class="img-caption">
						<div class="img-text">
							<h4>Euismod sem </h4>
							<p>Vestibulum celit dolor pulvinar ut tempus sit </p>
						</div>
					</div>
				</div>
				<div class="col-md-3 agileits-w3layouts work-grids wow zoomIn animated" data-wow-delay=".5s">
					<img src="../assets/images/img6.jpg" alt=""/>
					<div class="img-caption">
						<div class="img-text">
							<h4>Cras maximus</h4>
							<p>Suspendi ipsum magna ut luctus eget condimentum </p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //work -->
	<!-- slid -->
	<div class="slid-w3-agile">
		<div class="container">
			<h5 class="wow bounceIn animated" data-wow-delay=".5s">Office Hours:</h5>
			<h3 class="wow slideInDown animated" data-wow-delay=".6s">Monday – Saturday 8:00 a.m – 9:00 p.m <br>  
				Sunday 10 a.m – 4 p.m </h3>
			<p class="agileits wow fadeInUp animated" data-wow-delay=".5s">Pellentesque ultrices erat ut quam mattis, sed tempus lorem lacinia. Etiam ut diam rhoncus, viverra ipsum eu, semper metus. Quisque commodo maximus sagittis.
			 Praesent efficitur quam metus. Duis ac tempor risus. Nulla facilisi. Fusce eget neque bibendum, gravida nibh eget, dignissim erat.</p>
		</div>
	</div>
	<!-- //slid -->
	<!-- gallery -->
	<div id="gallery" class="welcome gallery">
		<div class="container">
			<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">Gallery</h3>
			<div class="gallery-info agile">
				<div class="col-md-6 gallery-grids glry-grid1">
					<div class="gallery-grids-top">
						<div class="col-md-6 bottom-grids2 ">
							<a href="#portfolioModal2" class="b-link-stripe b-animate-go wow zoomIn animated" data-wow-delay=".5s" data-toggle="modal">
								<img src="../assets/images/g2.jpg" class="img-responsive" alt=""/>
								<div class="b-wrapper">
									<span class="b-animate b-from-left">
										<img class="img-responsive" src="../assets/images/e.png" alt=""/>
									</span>					
								</div>
							</a>
						</div>
						<div class="col-md-6 bottom-grids2">
							<a href="#portfolioModal3" class="b-link-stripe b-animate-go wow zoomIn animated" data-wow-delay=".5s" data-toggle="modal">
								<img src="../assets/images/g3.jpg" class="img-responsive" alt=""/>
								<div class="b-wrapper">
									<span class="b-animate b-from-left">
										<img class="img-responsive" src="../assets/images/e.png" alt=""/>
									</span>					
								</div>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="gallery-grids-top ">
						<a href="#portfolioModal1" class="b-link-stripe b-animate-go wow zoomIn animated" data-wow-delay=".5s" data-toggle="modal">
							<img src="../assets/images/g1.jpg" class="img-responsive" alt=""/>
							<div class="b-wrapper">
								<span class="b-animate b-from-left">
									<img class="img-responsive" src="../assets/images/e.png" alt=""/>
								</span>					
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-6 gallery-grids glry-grid1">
					<div class="gallery-grids-top">
						<a href="#portfolioModal6" class="b-link-stripe b-animate-go wow zoomIn animated" data-wow-delay=".5s" data-toggle="modal">
							<img src="../assets/images/g6.jpg" class="img-responsive" alt=""/>
							<div class="b-wrapper">
								<span class="b-animate b-from-left">
									<img class="img-responsive" src="../assets/images/e.png" alt=""/>
								</span>					
							</div>
						</a>
					</div>
					<div class="gallery-grids-top">
						<div class="col-md-6 bottom-grids">
							<a href="#portfolioModal4" class="b-link-stripe b-animate-go wow zoomIn animated" data-wow-delay=".5s" data-toggle="modal">
								<img src="../assets/images/g4.jpg" class="img-responsive" alt=""/>
								<div class="b-wrapper">
									<span class="b-animate b-from-left">
										<img class="img-responsive" src="../assets/images/e.png" alt=""/>
									</span>					
								</div>
							</a>
						</div>
						<div class="col-md-6 bottom-grids">
							<a href="#portfolioModal5" class="b-link-stripe b-animate-go wow zoomIn animated" data-wow-delay=".5s" data-toggle="modal">
								<img src="../assets/images/g5.jpg" class="img-responsive" alt=""/>
								<div class="b-wrapper">
									<span class="b-animate b-from-left">
										<img class="img-responsive" src="../assets/images/e.png" alt=""/>
									</span>					
								</div>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div> 
				<div class="clearfix"></div>
				<!-- gallery Modals -->
				<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-hidden="true">
					<div class="modal-content">
						<div class="close-modal" data-dismiss="modal">
							<div class="lr">
								<div class="rl"></div>
							</div>
						</div>
						<div class="portfolio-container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="modal-body">
										<h3>Our Gallery</h3>
										<hr>
										<img src="../assets/images/g1.jpg" class="img-responsive img-centered" alt="">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
<!--				<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-hidden="true">
					<div class="modal-content">
						<div class="close-modal" data-dismiss="modal">
							<div class="lr">
								<div class="rl"></div>
							</div>
						</div>
						<div class="portfolio-container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="modal-body">
										<h3>Our Gallery</h3>
										<hr>
										<img src="../assets/images/g2.jpg" class="img-responsive img-centered" alt="">
                                                                                <div style="height:100px;width:300px;border:solid 2px orange;overflow:scroll;overflow-x:hidden;overflow-y:scroll;">
                                                                                    
                                                                                    down vote In terms of javascript, one difference is that the this keyword in the onclick handler will refer to the DOM element whose onclick attribute it is (in this case the element), whereas this in the  attribute will refer to the window object.
                                                                                    In terms of presentation, if an href attribute is absent from a link  then, by default, browsers will display the text cursor (and not the often-desired pointer cursor) since it is treating the  as an anchor, and not a link.
                                                                                    In terms of behavior, when specifying an action by navigation via href, the browser will typically support opening that href in a separate window using either a shortcut or context menu. This is not possible when specifying an action only via onclick.
                                                                                    However, if you're asking what is the best way to get dynamic action from the click of a DOM object, then attaching an event using javascript separate from the content of the document is the best way to go. You could do this in a number of ways. A common way is to use a javascript library like jQuery to bind an event
                                                                                    
                                                                                </div>
                                                                        </div>
								</div>
							</div>
						</div>
					</div>
				</div>-->
				<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-hidden="true">
					<div class="modal-content">
						<div class="close-modal" data-dismiss="modal">
							<div class="lr">
								<div class="rl"></div>
							</div>
						</div>
						<div class="portfolio-container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="modal-body">
										<h3>Our Gallery</h3>
										<hr>
										<img src="../assets/images/g3.jpg" class="img-responsive img-centered" alt="">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-hidden="true">
					<div class="modal-content">
						<div class="close-modal" data-dismiss="modal">
							<div class="lr">
								<div class="rl"></div>
							</div>
						</div>
						<div class="portfolio-container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="modal-body">
										<h3>Our Gallery</h3>
										<hr>
										<img src="../assets/images/g4.jpg" class="img-responsive img-centered" alt="">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" aria-hidden="true">
					<div class="modal-content">
						<div class="close-modal" data-dismiss="modal">
							<div class="lr">
								<div class="rl"></div>
							</div>
						</div>
						<div class="portfolio-container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="modal-body">
										<h3>Our Gallery</h3>
										<hr>
										<img src="../assets/images/g5.jpg" class="img-responsive img-centered" alt="">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" aria-hidden="true">
					<div class="modal-content">
						<div class="close-modal" data-dismiss="modal">
							<div class="lr">
								<div class="rl"></div>
							</div>
						</div>
						<div class="portfolio-container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="modal-body">
										<h3>Our Gallery</h3>
										<hr>
										<img src="../assets/images/g6.jpg" class="img-responsive img-centered" alt="">
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--//gallery Modals -->
			</div>
		</div>
	</div>
	<!--//gallery-->
	<!-- contact -->
	<div class="welcome contact" id="contact">
		<div class="container">
			<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">Contact Us</h3>
			<div class="agileits-w3layouts-row">
				<div class="col-md-6 contact-left">
					<iframe class="wow slideInLeft animated" data-wow-delay=".5s" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.9503398796587!2d-73.9940307!3d40.719109700000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1441710758555" allowfullscreen></iframe>
				</div>
				<div class="col-md-6 contact-right agile wow slideInRight animated" data-wow-delay=".5s">
					<h4>Address:</h4>
					<div class="address-left">
						<p>Lorem ipsum dolor sit amet conse adipiscing elit. Proin in justo tortoroin consectetur lorem id massa luctus</p>
					</div>
					<div class="address-right">
						<p>Call us : +11 222 333 4444</p>
						<p>E-mail : <a href="mailto:info@example.com">mail@example.com</a></p>
					</div>
					<div class="clearfix"></div>
					<!--accordion-->
					<div class="info">
						<h4>Useful Information :</h4>
						<ul class="faq">
							<li class="item1 wow fadeInDown animated" data-wow-delay=".5s"><a href="#"><span class="glyphicon glyphicon-chevron-down"></span> Donec ut quam ligula feugiat</a>
								<ul>
									<li class="subitem1"><p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</p></li>										
								</ul>
							</li>
							<li class="item2 wow fadeInDown animated" data-wow-delay=".5s"><a href="#"><span class="glyphicon glyphicon-chevron-down"></span> The standard Lorem Ipsum passage</a>
								<ul>
									<li class="subitem1"><p> Tincidunt ut laoreet dolore At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p></li>										
								</ul>
							</li>
							<li class="item3 wow fadeInDown animated" data-wow-delay=".5s"><a href="#"><span class="glyphicon glyphicon-chevron-down"></span> Consectetuer adipiscing elit</a>
								<ul>
									<li class="subitem1"><p>Dincidunt ut laoreet dolore At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p></li>										
								</ul>
							</li>
							<li class="item4 wow fadeInDown animated" data-wow-delay=".5s"><a href="#"><span class="glyphicon glyphicon-chevron-down"></span> Sed diam nonummy nibh euismod</a>
								<ul>
									<li class="subitem1"><p>At vero eos et Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod  </p></li>										
								</ul>
							</li> 
						</ul>
						<!-- script for tabs -->
						<script type="text/javascript">
							$(function() {
							
								var menu_ul = $('.faq > li > ul'),
									   menu_a  = $('.faq > li > a');
								
								menu_ul.hide();
							
								menu_a.click(function(e) {
									e.preventDefault();
									if(!$(this).hasClass('active')) {
										menu_a.removeClass('active');
										menu_ul.filter(':visible').slideUp('normal');
										$(this).addClass('active').next().stop(true,true).slideDown('normal');
									} else {
										$(this).removeClass('active');
										$(this).next().stop(true,true).slideUp('normal');
									}
								});
							
							});
						</script>
						<!-- script for tabs -->
					</div>
					<!-- accordion -->
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="contact-form">
				<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">Get In Touch</h3>
				<p>Sed ut turpis elit ullamcorper in auctor non, accumsan vel lacus nulla auctor cursus nunc. Maecenas ultricies dolor in urna tempus, id egestas erat finibus  interdum lectus eget scelerisque.</p>
				<form class="wow fadeInUp animated" data-wow-delay=".5s" action="#" method="post">
					<input type="text" name="Name" placeholder="Name" required="">
					<input type="text" class="email" name="Email" placeholder="Email" required="">
					<input type="text" name="phone" placeholder="Phone" required="">
					<textarea placeholder="Message" required=""></textarea>
					<input type="submit" class="wow zoomIn animated" data-wow-delay=".5s" value="SUBMIT" >
				</form>
			</div>
		</div>
	</div>
	<!-- //contact -->
	<!-- footer -->
	<div class="welcome footer agile">
		<div class="container">
			<div class="col-md-4 footer-grids wow fadeInLeft animated" data-wow-delay=".5s">
				<h3>Review</h3>
				<p>Sed ut turpis elit ullamcorper in auctor non, accumsan vel lacus nulla auctor cursus nunc. Maecenas ultricies dolor in urna tempus, id egestas erat finibus  interdum lectus eget scelerisque.</p>
			</div>
			<div class="col-md-3 footer-grids wow fadeInLeft animated" data-wow-delay=".5s">
				<h3>Contact Us</h3>
				<p>111-2nd Avenue Canada.<br>
					New York City USA.<br>
					Office : +00 111 1111 111<br>
					Support to : <a href="mailto:info@example.com">mail@example.com</a>
				</p>
			</div>
			<div class="col-md-5 footer-grids wow fadeInRight animated" data-wow-delay=".5s">
				<h3>Newsletter</h3>
				<form action="#" method="post">
					<input type="text" class="email" name="Email" placeholder="Email" required="">
					<input type="submit" value="Submit">
				</form>
			</div>
			<div class="clearfix"> </div>
			<div class="footer-copy wow slideInUp animated" data-wow-delay=".5s">
				<p>© 2016 Revived. All rights reserved | Developed by <a href="">ICTA</a></p>
			</div>
		</div>
	</div>
	<!-- //footer -->
	<!-- start-smooth-scrolling -->
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault(); 
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript">
        function showContent(myMessage) {
            alert(myMessage);
        }
    </script>
</body>
</html>







<!-- HTML Example by Way2Tutorial.com -->
<!--<div style="height:100px;width:400px;border:solid 2px orange;overflow:scroll;overflow-x:hidden;overflow-y:scroll;">
<p style="height:200px;">
Scroll box automatic set in scroll in vertical scrollbar....<br /><br />
Scroll box automatic set in scroll in vertical scrollbar....<br /><br />
Scroll box automatic set in scroll in vertical scrollbar....<br /><br />
Scroll box automatic set in scroll in vertical scrollbar....</p>
</div>
<p><a href="http://www.way2tutorial.com/html/example/index.php">HTML Example</a></p>-->
