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
<style type="text/css">

</style>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php 

	search_location();

?>
<script type="text/javascript" src="includes/map.js"></script>
<script type="text/javascript">
	
	window.setInterval(function() {updateMarkers()}, 10000);
	
</script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="padding-top: 70px">
<div class="container">
  <div class="row">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
<a class="navbar-brand" href="www.roamingtechs.com"><img src="RT-logo-02.png" alt="" width="96" height="40" title="Roaming Techs Logo"/></a></div>
        <h3><!-- Collect the nav links, forms, and other content for toggling -->        
        </h3>
        <div class="collapse navbar-collapse" id="topFixedNavbar1">
          <ul class="nav navbar-nav">
            
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">My Account</a></li>
                <li class="divider"></li>
                <li><a href="#">Settings</a></li>
                <li class="divider"></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
            </li>
          </ul>
<ul class="nav navbar-nav navbar-right">
            <li><a href="http://roamingtechs.com/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="http://roamingtechs.com/rtest/index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </div>
</div>
<div class="container">
  <div class="col-md-12" style="background-color:lavenderblush;"></div>
<div class="row">
    <div class="col-md-3" style="background-color:lavenderblush;">
    <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">Find Professionals</div>
      <div class="panel-body"><form role="form">
    <div class="form-group">
      <input type="street" class="form-control" id="street" placeholder="street">
    </div>
    <div class="form-group">
      <input type="street1" class="form-control" id="street1" placeholder="street 1">
    </div>
    <div class="form-group">
      <input type="city" class="form-control" id="city" placeholder="City">
    </div>
    <div class="form-group">
      <input type="state" class="form-control" id="state" placeholder="State/Province">
    </div>
    <div class="form-group">
      <input type="zip" class="form-control" id="zip" placeholder="Zip / Post Code">
    </div>
    <div class="form-group">
      <input type="country" class="form-control" id="country" placeholder="Country">
    </div>
    <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Country
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
      <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
    </ul>
  </div>

<div class="checkbox">
  <label><input type="checkbox"> Remember me</label>
</div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form></div>
    </div>
   </div></div>
    <div class="col-md-9">
      <div class="container"><div class="row"></div>
        <div class="row"><ul class="nav nav-tabs nav-justified" role="tablist">
    <li class="active"><a href="#">Map View</a>
    </li>
    <li><a href="#">List View</a></li>
      
  </ul></div>
      </div>
    </div>
    
  </div>

</div>
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<!-- <script src="js/bootstrap.js" type="text/javascript"></script> -->
<script src="js/bootstrap-3.3.4.js" type="text/javascript"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</div>
</body>
</html>
