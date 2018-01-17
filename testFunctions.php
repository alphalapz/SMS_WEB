<html>
<head>
  <!-- ... -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/moment.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/daterangepicker.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="css/daterangepicker.css" />
 
  <style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 99; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
  
  
</head>
<body>
<?php
// $fecha = date('Y-m-j');
echo "<br>Fecha Original: " .$fecha = "2018-05-24";
echo "<br>Fecha en formato: " .$fecha = strtotime ( '+15 day' , strtotime ( $fecha ) ) ;
echo "<br>Fecha final: " .$fecha = date ( 'Y-m-d' , $fecha )."<br><br>";


		$starDate="2018-01-11";
		$endDate="2018-01-11";
		echo "$starDate <-1<br>";
		echo "$endDate <-1<br>";
		
		echo "<br>" .$starDate = strtotime ( '-1 day' , strtotime ( $starDate ) ) ;
		echo "<br>" .$starDate = date ( 'Y-m-d' , $starDate );
		echo "<br>" .$endDate = strtotime ( '+1 day' , strtotime ( $endDate ) ) ;
		echo "<br>" .$endDate = date ( 'Y-m-d' , $endDate );
		echo "<br>$starDate <-2<br>";
		echo "$endDate <-2<br>";
?>
<div class="container-fluid">
	<div class="row">
		<h2>Modal Login Form</h2>

		<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

		<div id="id01" class="modal">
		  
		  <form class="modal-content animate" action="/action_page.php">
			<div class="imgcontainer">
			  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
			  <img src="img_avatar2.png" alt="Avatar" class="avatar">
			</div>

			<div class="container">
			  <label><b>Username</b></label>
			  <input type="text" placeholder="Enter Username" name="uname" required>

			  <label><b>Password</b></label>
			  <input type="password" placeholder="Enter Password" name="psw" required>
				
			  <button type="submit">Login</button>
			  <label>
				<input type="checkbox" checked="checked"> Remember me
			  </label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
			  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
			  <span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		  </form>
		</div>
	</div>
	<div class="row">
		<form action="ja.php" method="POST">
			<div class='col-md-5'>
				<div class="form-group">
					<div class='input-group date' id='datetimepicker01'>
						<input name="dateStart" type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>
			<div class='col-md-5'>
				<div class="form-group">
					<div class='input-group date' id='datetimepicker02'>
						<input name ="dateEnd" type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>
			<input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
			<input type="submit" class="btn btn-success">
		</form>
	</div>
</div>




<script type="text/javascript">
    $(function () {
        $('#datetimepicker01').datetimepicker({
			format: "DD-MM-YYYY"
		});
        $('#datetimepicker02').datetimepicker({
			useCurrent: false, //Important! See issue #1075
			format: "DD-MM-YYYY"	
        });
        $("#datetimepicker01").on("dp.change", function (e) {
            $('#datetimepicker02').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker02").on("dp.change", function (e) {
            $('#datetimepicker01').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>