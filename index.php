<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS.CARTRO</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
    </head>
    <?php
  		include 'header.php';
  		include 'functionsphp.php';
  		session_start();
  		if(isset($_SESSION['loggedin']) && isset($_SESSION['rol'])){
  			checkRol($_SESSION['rol']);
  		}
  		if(isset($_SESSION['fake']) && $_SESSION['fake'] == true){
  			session_destroy();
  		}
  	?>
    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<img src="assets/logo.svg" style="margin-top:15%"><br>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="checklogin.php" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label style="color:#FFFFFF; font-weight:400"><span class="glyphicon glyphicon-user" >&nbsp;</span>Nombre usuario:</label><br>
                              <label class="sr-only" for="username">Username</label>
			                        	<input type="text" name="username" placeholder="Usuario..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
                                <label style="color:#FFFFFF; font-weight:400"><span class="glyphicon glyphicon-lock">&nbsp;</span>Contraseña:</label><br>
			                        	<label class="sr-only" for="password">Password</label>
			                        	<input type="password" name="password" placeholder="Contraseña..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn">Ingresar!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

			<footer class="footer myFooter text-center navbar-fixed-bottom" style="z-index:99;background-color:#000">
				<h4><a href="http://www.swaplicado.com.mx" target="_blank"> ©Copyright Software Aplicado S.A. de C.V.</a><br><span> Derechos reservados SMS Web®</span></h4><h3><a href="assets/pdf/triptico.pdf" target="_blank">Manual de instrucciones</a></h3>		</footer>

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
