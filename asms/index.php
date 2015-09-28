<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/config/config.php");
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/classes/classes.php");
	require_once ("includes/functions.php");
		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Active Service Management System</title>
<!-- Google Fonts Api -->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open Sans">
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<link href="css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>
<?php search_location(); ?>
<script type="text/javascript" src="js/map.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript">	window.setInterval(function() {updateMarkers()}, 10000);</script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body onload="init()" style="padding-top: 70px">
<div class="container-fluid">
	<div class="row">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid"> 
				
				<!-- Brand and toggle get grouped for better mobile display -->
				
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					<a class="navbar-brand" href="www.roamingtechs.com"><img src="images/RT-logo-02.png" alt="" width="96" height="40" title="Roaming Techs Logo"/></a></div>
				<h3><!-- Collect the nav links, forms, and other content for toggling --> 
					
				</h3>
				<div class="collapse navbar-collapse" id="topFixedNavbar1">
					<ul class="nav navbar-nav">
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Home</a></li>
								<li class="divider"></li>
								<li><a href="#">My Account</a></li>
								<li class="divider"></li>
								<li><a href="#">Settings</a></li>
								<li class="divider"></li>
								<li><a href="logout.php">Log Out</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="/rtest/index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
				
				<!-- /.navbar-collapse --> 
				
			</div>
			
			<!-- /.container-fluid --> 
			
		</nav>
	</div>
</div>
<div class="container-fluid">
<div class="col-md-12"></div>
<div class="row">
	<div class="col-lg-3 col-md-4 col-sm-5 pro_box" style="background-color:lavenderblush;">
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">Find Professionals</div>
				<div class="panel-body">
					<form role="form" method="post" action="" id="form1">
						<div class="form-group">
							<input name="street" type="text" class="form-control" id="street" placeholder="street">
						</div>
						<div class="form-group">
							<input name="street_2" type="text" class="form-control" id="street_2" placeholder="street 1">
						</div>
						<div class="form-group">
							<input name="city" type="text" class="form-control" id="city" placeholder="City">
						</div>
						<div class="form-group">
							<input name="province" type="text" class="form-control" id="province" placeholder="State/Province">
						</div>
						<div class="form-group">
							<input name="postal_code" type="text" class="form-control" id="postal_code" placeholder="Zip / Post Code">
						</div>
						<div class="form-group">
							<select name="country" class="form-control" id="country">
								<option value="">Select Country</option>
								<option value="Canada">Canada</option>
								<option value="United States">United States</option>
							</select>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox">
								Remember me</label>
						</div>
						<button name="submit" value="Edit Location" type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<div id="details">
			<div class="summary">
				<h4>Results Summary</h4>
				<br>
				<ul>
					<span id="itp_found"></span> Professionals found
				</ul>
				<ul>
					Minimum ETA 15 mins
				</ul>
				<ul>
					Maximum ETA 56 minutes
				</ul>
				ETA based on current traffic conditions to your registered location
				</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-7">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-md-7 col-xs-11">
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li class="active"><a href="#" onClick="javascript:changeTab('#mapCanvas','#contentList');">Map View</a> </li>
						<li><a href="#" onClick="javascript:changeTab('#contentList','#mapCanvas');">List View</a></li>
					</ul>
				</div>
				<div class="col-md-8"></div>
			</div>
			<div class="row">
				<div id="content_map" class="active">
					<div class="col-md-12 col-sm-12">
						<div id="mapCanvas"></div>
					</div>
				</div>
				<div id="contentList" class="hidden">
					<?php include('includes/pro_list.php'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script> 

<!-- <script src="js/bootstrap.js" type="text/javascript"></script> --> 

<script src="js/bootstrap-3.3.4.js" type="text/javascript"></script>
</body>
</html>
