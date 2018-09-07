<?php
// require_once('db.php');
$pyscript = 'C:\\xampp\\htdocs\\estimasi\\training_SVR.py';
$python = 'C:\\Users\\USER\\Anaconda2\\python.exe';
$cmd = "$python $pyscript";
//echo $cmd;
// echo "test";
// echo "<br>";
//exec("$cmd", $output);
//$input_str = shell_exec("python -c \"import training_SVR; print training_SVR.get_input_data()\"");

// $input = json_decode(shell_exec("python -c \"import training_SVR; print training_SVR.get_input_data()\""), true);
// print_r($input);
//echo "<br>";
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Dinas Tanaman Pangan Holtikultura dan Perkebunan Kabupaten Malang</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dinas Tanam Pangan Holtikultura dan Perkebunan Kabupaten Malang" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta tag Keywords -->

<style media="screen">
	.container {
		font-size: 16px;
		color: black;
		font-weight: bold;
		text-align: center;
	}

</style>
<!-- css files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" type="text/css" href="css/zoomslider.css" /> <!-- banner-slider-css -->
<link rel="stylesheet" href="css/swipebox.css"> <!-- gallery -->
<link href="css/index.css" rel="stylesheet" type="text/css" media="all" /> <!-- filter css -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> <!-- Style-CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->
<!-- css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>
<!-- header -->
<!-- <div id="demo-1" data-zs-src='["images/1.jpg", "images/2.jpeg", "images/3.jpg","images/4.jpg","images/5.png","images/6.jpg"]' data-zs-overlay="dots"> -->
<div id="demo-1">
	<div class="demo-inner-content">
		<div class="header-nav">
			<nav class="navbar navbar-default">
				<div class="header-top">
					<div class="navbar-header logo">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h3>
							<a class="navbar-brand" href="index.html">ESTIMASI PANGAN</a>
						</h3>
					</div>
					<!-- navbar-header -->
					<div class="contact-bnr-w3-agile">
						<ul>
							<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:rahmaiputri@gmail.com">rahmaiputri@gmail.com</a></li>
							<li><i class="fa fa-phone" aria-hidden="true"></i>(0351)888 000</li>
						</ul>
					</div>
				</div>
				<div class="collapse navbar-collapse cl-effect-13" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.html" class="active">Home</a></li>
						<li><a href="#services" class="scroll">Estimasi</a></li>
						<li><a href="#gallery" class="scroll">Gallery</a></li>
						<li><a href="#mail" class="scroll">Mail Us</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</nav>
			<div class="social-wthree-icons bnragile-icons">
				<ul>
					<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
					<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
					<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
					<li><a href="#" class="fa fa-dribbble icon icon-border dribbble"> </a></li>
				</ul>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- banner-info -->
		<div class="agile-baner-info-w3ls">
			<h3>Ready For <span>ESTIMASI</span></h3>
			<p>Dengan estimasi terhadap hasil produksi tanaman, manfaat yang dihasilkan antara lain :<br>
				1. Kecukupan pangan warga terpenuhi,<br>
				2. Memberikan gambaran Dinas untuk melakukan tindakan,<br>
				3. Estimasi produksi untuk memberikan hasil yang optimal. </p>
		<a href="#" data-toggle="modal" data-target="#myModal" class="read">Read More</a>
		</div>
		<!-- //banner-info -->
		<!-- model -->
		<div class="tooltip-content">
			<div class="modal fade features-modal" id="testPadi" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">ESTIMASI PRODUKSI</h4>							
						</div>
						<div class="modal-body">
							<form class="form-horizontal" method="post" action="testing.php">
								<div class="form-group">
									<label class="control-label col-sm-4">Komoditas:</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="komoditas" value="PADI" disabled="true" name="komoditas">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Luas Tanam:</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" placeholder="Luas Tanam" id="tanam_padi" name="luas_tanam">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Jumlah Penduduk:</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" placeholder="Jumlah Penduduk" id="penduduk" name="jml_penduduk">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Luas Lahan (Sawah):</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" placeholder="Luas Lahan (Sawah)" id="luas_lahan" name="luas_lahan">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-6 col-sm-6">
										<button type="submit" class="btn btn-default">ESTIMASI</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //model -->
	</div>
</div>
<!-- //banner-section -->
<!-- services -->
<div class="service-w3l" id="services">
	<div class="container">
		<h3 class="agile-title">MESIN ESTIMASI PANGAN</h3>
		<div class="service-grids">
			<div class="col-xs-4 ser-grid">
				<div class="ser-top">
					<a href="#" data-toggle="modal" data-target="#testPadi"><div class="con hvr-shutter-in-horizontal">
						<i class="fa fa-arrow-down" aria-hidden="true"></i>
					</div></a>
					<h4>PADI</h4>
					<p>Tekan Button PADI untuk Estimasi Hasil PADI.</p>
				</div>
			</div>
			<div class="col-xs-4 ser-grid">
				<div class="ser-top">
					<div class="con hvr-shutter-in-horizontal">
						<i class="fa fa-arrow-down" aria-hidden="true"></i>
					</div>
					<h4>JAGUNG</h4>
					<p>Tekan Button Padi untuk Estimasi Hasil JAGUNG.</p>
				</div>
			</div>
			<div class="col-xs-4 ser-grid">
				<div class="ser-top">
					<div class="con hvr-shutter-in-horizontal">
						<i class="fa fa-arrow-down" aria-hidden="true"></i>
					</div>
					<h4>KEDELAI</h4>
					<p>Tekan Button KEDELAI untuk Estimasi Hasil KEDELAI.</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="service-grids ser2">
			<div class="col-xs-4 ser-grid">
				<div class="ser-top">
					<div class="con hvr-shutter-in-horizontal">
						<i class="fa fa-arrow-down" aria-hidden="true"></i>
					</div>
					<h4>BAWANG MERAH</h4>
					<p>Tekan Button BAWANG MERAH untuk Estimasi Hasil BAWANG MERAH.</p>
				</div>
			</div>
			<div class="col-xs-4 ser-grid">
				<div class="ser-top">
					<div class="con hvr-shutter-in-horizontal">
						<i class="fa fa-arrow-down" aria-hidden="true"></i>
					</div>
					<h4>CABE RAWIT</h4>
					<p>Tekan Button CABE RAWIT untuk Estimasi Hasil CABE RAWIT.</p>
				</div>
			</div>
			<div class="col-xs-4 ser-grid">
				<div class="ser-top">
					<div class="con hvr-shutter-in-horizontal">
						<i class="fa fa-arrow-down" aria-hidden="true"></i>
					</div>
					<h4>CABE BESAR</h4>
					<p>Tekan Button CABE BESAR untuk Estimasi Hasil CABE BESAR.</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //services -->
<!-- isi service -->
<div class="w3layouts-agileinfo" id="isiservice">
	<h3 class="agile-title">MULAI ESTIMASI</h3>
	<div class="container">
		<div class="isiservice-top w3ls-agile">
			<h3 align="center" >INPUT DATA</h3>
			<!-- <table border=0> -->
	  		<form action="output.php" method="post">
				<table border=0>
					<tr>
						<td>Luas Tanam (X1)</td>
						<td>Jumlah Penduduk (X2)</td>
						<td>Luas Lahan (X3)</td>
						<td>Produksi (Y)</td>
					</tr>
					<?php 
					// $x = 1;
					// foreach ($input as $i) {
					// 	mysqli_query($link, "INSERT INTO dataAll VALUES ('".$x."', '".$i[0]."', '".$i[1]."', '".$i[2]."', '".$i[3]."')");
					// 	echo '<tr>';
					// 	echo '<td>'.$i[0].'</td>';
					// 	echo '<td>'.$i[1].'</td>';
					// 	echo '<td>'.$i[2].'</td>';
					// 	echo '<td>'.$i[3].'</td>';
					// 	echo '</tr>';
					// 	$x++;
					// }
					// mysqli_close($link)
					?>											
				</table>
				<button id="button" class="Button" data-toggle="modal" data-target="#myModal">ESTIMASI</button>
       		</form>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--  isi service -->
<!-- gallery -->
<div id="gallery" class="portfolio">
	<div class="container">
		<h3 class="agile-title">Portfolio</h3>
		<div class="gallery_gds agileits-w3layouts">
			<ul class="simplefilter">
				<li class="active" data-filter="all">All</li>
				<li data-filter="1">Indoor Furniture</li>
				<li data-filter="2">Wood Supply</li>
				<li data-filter="3">Repairing</li>
			</ul>
			<div class="filtr-container">
				<div class="col-sm-4 col-xs-6 filtr-item" data-category="1" data-sort="Busy streets">
					<div class="hover ehover14">
						<a href="images/g1.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g1.jpg" alt="" class="img-responsive" />
							<div class="overlay">
								<h4>Wooden Work</h4>
								<div class="info nullbutton button" data-toggle="modal" data-target="#modal14">Full View</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 filtr-item" data-category="2" data-sort="Luminous night">
					<div class="hover ehover14">
						<a href="images/g2.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g2.jpg" alt="" class="img-responsive" />
							<div class="overlay">
								<h4>Wooden Work</h4>
								<div class="info nullbutton button" data-toggle="modal" data-target="#modal14">Full View</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 filtr-item" data-category="3" data-sort="City wonders">
					<div class="hover ehover14">
						<a href="images/g3.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g3.jpg" alt="" class="img-responsive" />
							<div class="overlay">
								<h4>Wooden Work</h4>
								<div class="info nullbutton button" data-toggle="modal" data-target="#modal14">Full View</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 filtr-item" data-category="3" data-sort="Industrial site">
					<div class="hover ehover14">
						<a href="images/g4.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g4.jpg" alt="" class="img-responsive" />
							<div class="overlay">
								<h4>Wooden Work</h4>
								<div class="info nullbutton button" data-toggle="modal" data-target="#modal14">Full View</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 filtr-item" data-category="3" data-sort="In production">
					<div class="hover ehover14">
						<a href="images/g5.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g5.jpg" alt="" class="img-responsive" />
							<div class="overlay">
								<h4>Wooden Work</h4>
								<div class="info nullbutton button" data-toggle="modal" data-target="#modal14">Full View</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 filtr-item" data-category="2" data-sort="Peaceful lake">
					<div class="hover ehover14">
						<a href="images/g6.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g6.jpg" alt="" class="img-responsive" />
							<div class="overlay">
								<h4>Wooden Work</h4>
								<div class="info nullbutton button" data-toggle="modal" data-target="#modal14">Full View</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 filtr-item" data-category="1" data-sort="Industrial site">
					<div class="hover ehover14">
						<a href="images/g7.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g7.jpg" alt="" class="img-responsive" />
							<div class="overlay">
								<h4>Wooden Work</h4>
								<div class="info nullbutton button" data-toggle="modal" data-target="#modal14">Full View</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 filtr-item" data-category="1" data-sort="In production">
					<div class="hover ehover14">
						<a href="images/g3.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g3.jpg" alt="" class="img-responsive" />
							<div class="overlay">
								<h4>Wooden Work</h4>
								<div class="info nullbutton button" data-toggle="modal" data-target="#modal14">Full View</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 col-xs-6 filtr-item" data-category="2, 4" data-sort="Peaceful lake">
					<div class="hover ehover14">
						<a href="images/g4.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g4.jpg" alt="" class="img-responsive" />
							<div class="overlay">
								<h4>Wooden Work</h4>
								<div class="info nullbutton button" data-toggle="modal" data-target="#modal14">Full View</div>
							</div>
						</a>
					</div>
				</div>
			   <div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!-- //gallery -->
<!-- mail -->
<div class="contact" id="mail">
	<div class="container">
		<div class="col-xs-7 mail-grid1-form ">
			<h3 class="heading-agileinfo white">Send a Message</h3>
			<form action="#" method="post">
				<input type="text" name="Name" placeholder="Name" required="" />
				<input type="email" name="Email" placeholder="Email" required="" />
				<textarea name="Message" placeholder="Type Your Text Here...." required=""></textarea>
				<input type="submit" value="Submit">
			</form>
		</div>
		<div class="col-xs-5 agileinfo_footer_grid f3">
			<div class="nav-w3-l">
				<ul>
					<li><a href="index.html" class="active">Home</a></li>
					<li><a href="#about" class="scroll">About</a></li>
					<li><a href="#services" class="scroll">Services</a></li>
					<li><a href="#team" class="scroll">Team</a></li>
					<li><a href="#gallery" class="scroll">Portfolio</a></li>
					<li><a href="#mail" class="scroll">Mail Us</a></li>
				</ul>
			</div>
		</div>
		<div class="address-agileits ">
			<h3>Get In Touch</h3>
			<h4>Company Name</h4>
			<p class="para-w3layouts">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at risus facilisis, semper justo ut, sagittis urna.</p>
			<div class="mail_agileits_w3layouts">
				<div class="mail-w3-agileits">
					<h4>Address</h4>
					<p>9125 Imperial Hwy, Downey, CA 90242, USA.</p>
				</div>
			</div>
			<div class="mail_agileits_w3layouts">
				<div class="mail-w3-agileits">
					<h4>Email</h4>
					<p>
						<a href="mailto:info@example.com">info@example1.com</a>
					</p>
				</div>
			</div>
			<!-- w3agile -->
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //mail -->
<!-- js files -->
<!-- js -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- js -->
<!-- banner-slider -->
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery.zoomslider.min.js"></script>
<!-- //banner-slider -->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
	$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear'
			};
		*/

		$().UItoTop({ easingType: 'easeOutQuart' });

		});
</script>
<!-- //here ends scrolling icon -->
<!-- Include jQuery & Filterizr for gallery -->
<script src="js/jquery.filterizr.js"></script>
<script src="js/controls.js"></script>
<!-- Kick off Filterizr -->
<script type="text/javascript">
	$(function() {
		//Initialize filterizr with default options
		$('.filtr-container').filterizr();
	});
</script>
<!-- //Kick off Filterizr -->
<!-- swipe box js -->
<script src="js/jquery.swipebox.min.js"></script>
<script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
</script>
<!-- //swipe box js -->
<!-- //for gallery js -->
<!-- testimonial-plugin -->
<script src="js/mislider.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(function ($) {
		var slider = $('.mis-stage').miSlider({
			//  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
			stageHeight: 320,
			//  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
			slidesOnStage: false,
			//  The location of the current slide on the stage. Options: 'left', 'right', 'center'. Defualt: 'left'
			slidePosition: 'center',
			//  The slide to start on. Options: 'beg', 'mid', 'end' or slide number starting at 1 - '1','2','3', etc. Defualt: 'beg'
			slideStart: 'mid',
			//  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
			slideScaling: 150,
			//  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
			offsetV: -5,
			//  Center slide contents vertically - Boolean. Default: false
			centerV: true,
			//  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
			navButtonsOpacity: 1,
		});
	});
</script>
<!-- //testimonial-plugin -->
<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
<!-- //js files -->

</body>
</html>
