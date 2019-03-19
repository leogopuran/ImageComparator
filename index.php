<?php
session_start();
?>
<?php

if(isset($_POST['submit']))
{ 
	$img1 = $_POST['image1'];
	$img2 = $_POST['image2'];
	$_SESSION["img1"]=$img1;
	$_SESSION["img2"]=$img2;
	include_once 'scripts/functions.php';

if ($img1 != '' && $img2 != '') {
    $diff = imageCompare($img1, $img2);
	//  $ans=neat_r($diff);
   $_SESSION["diff"]=$diff;
header("Location: /new.php");

}

}

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MatchUp</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>MatchUp</strong></h1>
                            <div class="description">
                            	<p>
	                            	
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>IMAGE COMPARISON</h3>
                            		<p>Insert Links of two PNG images to compare</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-image"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form  action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		
			                        	<input type="text" name="image2" placeholder="Insert Link for image 1" class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	
			                        	<input type="text" name="image1" placeholder="Insert Link for image 2" class="form-password form-control" id="form-password">
			                        </div>
			                        <button class="btn" type="submit" name="submit" value="submit" class="btn">Compare Now</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 text">
                    <div class="description">
                            	<strong><h1 style="color:#FFF"> Work by</h1></strong>
                                <b><h4 style="color:#FF6">
	                            	A N Sreeram<br/>
  									Abhilash C V<br/>
                                    Aravind Bhaskar<br/>
                                    Leo Varghese<br/>
                                    Rony Jacob Samuel<br/>  
                            	</h4></b>
                                
                                <strong><h2 style="color:#FFF"> Adi Shankara Institute of Engineering and Technology</h2>
                                <h3 style="color:#FFF"> Kalady</h3></strong>
                            </div>
                    </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
