<?php 
	session_start();
	include 'header.php';
	require 'functionsphp.php';
	echo "<br>";
	echo "<br>";
	
	canAccess($_SESSION['loggedin'], 'indexCredito.php', $_SESSION['rol']);
?>
<body>
<?php
include 'menuCredit.php';
?>
<div class="container-fluid">
	<?php include 'logo.php'; ?>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
		<p><h2>Evidencias:</h2></p>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-4">
		<form action="filterCredit.php" method="POST"> 
			<input type="submit" class="btn btn-danger3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Por Aprobar">
				<input type="text" class="hidden" value="1" name="btn1"/>
			</input>
		</form>
	  </div>
		<div class="col-md-4">
		  <form action="filterCredit.php" method="POST"> 
			<input type="submit" class="btn btn-success3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Aprobadas">
				<input type="text" class="hidden" value="2" name="btn1"/>
			</input>
		  </form>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4 text-center">
		<form action="filterCredit.php" method="POST"> 
			<input type="submit" class="btn btn-primary3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Mostrar todas">
				<input type="text" class="hidden" value="3" name="btn1"/>
			</input>
		</form>
	  </div>
		<div class="col-md-4"></div>
	</div>
		<?php include 'footer.php'; ?>
</div>
</body>