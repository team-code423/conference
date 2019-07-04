<?php

session_start();

?>

<?php require "database.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>conference</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700,900" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <script src="js/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <style>
    .topmain1{

    	width: 100%;
    	height: 51px;
    	background-color: #f9f9f9;
    }

.dropbtn 
{
  
	 height: auto;
	 width: 100%;
	 padding: 13px; 
	 font-size: 18px;
	 font-family: sans-serif;
	 cursor: pointer;
	 border: none;
	 color: #0b0f28;
	 text-transform: capitalize;
}

.dropdown {
  position: relative;
  display: inline-block;
  background-color: #4F50; 
  height: auto;
  width: 20%;
  float: right;
}

.dropdown-content {
  display: none;
  width: 100%;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: center;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #f9f9f9;
}
</style>
    
</head>

<body>


<?php 

    if(!isset($_SESSION['id']) and !isset($_SESSION['attendee']))
    {
        echo '<div class="topmain1">
        <div class="dropdown">
       	 <button class="dropbtn">Log In</button>
	  		<div class="dropdown-content">
	 		 <a href="login.php"> Log in As Auther </a>
	 		 <a href="attende/login.php"> Log in As attendee </a>
             <a href="reviewer/"> Log in As Reviewer </a>
	 		 <a href="committee/p"> Log in As Committee </a>
             
	  </div>
	</div>';
    }
    elseif (!isset($_SESSION['id']) and isset($_SESSION['attendee']))
    {
        echo '<div class="topmain1">
        <div class="dropdown">
       	 <button class="dropbtn" >  Welcome ' . $_SESSION['name'] . '   </button>


	  		<div class="dropdown-content">
        <a href="attende/attendee.php">Back to Your profile </a>
        <a href="attende/logout.php">Log Out </a>
        


	  		 </div>
	</div>
	</div>';
    }
    elseif (isset($_SESSION['id']) and !isset($_SESSION['attendee']))
    {
    	echo '<div class="topmain1">
        <div class="dropdown">
       	 <button class="dropbtn"> Welcome ' . $_SESSION['fullname'] . '</button>
	  		<div class="dropdown-content">
        <a href="auther/profile.php">Back to Your profile </a>
        <a href="auther/logout.php">Log Out </a>
	  		 </div>
	</div>
	</div>';
        
    }
?>



 <!-- Home -->
 <div id="home" >
        <!-- background image -->
        <div class="fullBackground"></div>
        <!-- /background image -->

        <!-- home wrapper -->
        <div class="home-wrapper">
            <!-- container-fluid -->
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <!-- home content -->
                    <div class="col-md-12">
                        <div class="home-content">

                        <?php
                         $i = mysqli_query($connect,"SELECT `conf-id` FROM `conferance years` ORDER BY `conf-id` DESC LIMIT 1 ");
                         $res = mysqli_fetch_assoc($i);
                         $n= $res['conf-id'];
                         $sql = "SELECT `conf-title` , `conf-year` , `location`, `conf-abstract` FROM `conferance years`  WHERE `conf-id`='$n' "; 
                         $query = mysqli_query($connect,$sql);
                         ?>
                         <?php if($query): ?>
                         <?php $result = mysqli_fetch_assoc($query); ?>
                         <?php echo "<h1>".  $result['conf-title']; "</h1>"; ?>
                         <h4 class="lead"> starting from <?= $result['conf-year']; ?>  </h4>
                         <a href="venue.php" class="main-btn"> <?= $result['location'] ?> </a>
                         <?php  ENDIF; ?>
                        </div>
                    </div>
                    <!-- /home content -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container-fluid -->
        </div>
        <!-- /home wrapper -->
    </div>
    <!-- /Home -->