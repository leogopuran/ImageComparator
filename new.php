<?php
session_start();
?>
<?php
	$img1 = $_SESSION["img1"];
	$img2 = $_SESSION["img2"];
include "scripts/functions.php";
	$diff=$_SESSION["diff"];
	$_SESSION["diff"]=$diff;
	//neat_r($diff);


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
        <style type="text/css">
        .row .col-sm-6.col-sm-offset-3.form-box .form-bottom .login-form {
	text-align: center;
}
        </style>
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>MatchUp</strong></h1>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h2  style="color:#C00"><strong>Result</strong></h2>
                            	
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-image"></i>
                        		</div>
                            </div>
                            <div class="form-bottom" >
                            <div align="center"><img  src="<?php echo $img1; ?>" width="195" height="195" class="preview" id="image1prev"/>&nbsp;&nbsp;&nbsp;
                            <img src="<?php echo $img2; ?>" width="195" height="195" class="preview" id="image1prev"/>
							</div>
			                    <form  action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		
			                        	<h3 style="color:#063"><strong><?php neat_r($diff); ?></strong></h3>
			                    </form>
		                    </div>
                        </div>
                        </div>
						
			                    
                        <div class="col-sm-8 col-sm-offset-2 text">
						
                         <div class="description">
						 <form class="login-form" action="index.php">
						 <button  class="btn" type="submit" name="submit">Match Again</button>
						 </form>
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