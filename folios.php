<?php
	session_start();
	require 'functionsphp.php';
	require 'database.php';
	include 'header.php';
	echo "<br>";
	echo "<br>";
	if(!isset($_SESSION['loggedin'])){
		redirectPHP('noPermission.php');
	}
?>
<body>
	<?php include 'menuChofer.php'; ?>
<div class="container-fluid">
	<?php include 'logo.php'; ?>
	<div class="row">
		<div class="col-xs-1">
		</div>
		<div class="col-xs-10">
		<?PHP
		//THIS 2 LINES FOR INCLUDE THE PAGER $startrow && $numOfrows
		$startrow = pagerStartrow();
		$numOfrows = pagerNumOfRows();
		if (!isset($_SESSION['key'])){
			if (isset($_POST['web_key']))
			$_SESSION['key'] = $_POST['web_key'];
		}
			$sql = "
			SELECT
			  SH.id_shipt AS ID,
			  SHR.delivery_number AS REMISION,
			  SH.shipt_date AS FECHA,
			  DE.name AS DESTINO_EMBARQUE,
			  SHS.name AS ESTATUS,
			  SHR.m2 AS m2,
			  SHR.kg AS kg,
			  SHR.bales AS PACAS
			FROM s_shipt AS SH
			  INNER JOIN ss_shipt_st AS SHS ON SHS.id_shipt_st = SH.fk_shipt_st
			  INNER JOIN s_shipt_row AS SHR ON SHR.id_shipt = SH.id_shipt
			  INNER JOIN au_cus AS cu ON cu.id_cus = SHR.fk_customer
			  INNER JOIN su_destin AS DE ON DE.id_destin = SHR.fk_destin
			  INNER JOIN su_shipper AS SHIP ON SHIP.id_shipper = SH.fk_shipper
			WHERE SH.web_key='" . $_SESSION['key'] . "' ORDER BY SHR.delivery_number;";# LIMIT $startrow, $numOfrows;";

			$result = $conexion->query($sql);
			$buttons = array(
				array('↑', 'btn btn-success',"<span class='glyphicon glyphicon-upload'></span>&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-camera'></span>")
			);
			$index = array(5, 6);
			$form = array('cargar.php','');
			echo "<div class='myScrollH'>";
			echo "Filtrar: <input type='text' id='myInput01' onkeyup='filterTable(0)' placeholder='Buscar folio...' title='Filtrar por folio...'>";
			printTableC($result, $buttons, $form, 1, $index);
			echo "</div>";
			
		?>
		</div>
		<div class="col-xs-1">
		</div>
	</div>
		<div class="row">
			<div class="col-xs-3"></div>
			<div class="col-xs-4 text-right">
			<br>
			<?php if (!isset($_SESSION['fake'])){?>
				<form action="filterTrans.php" method="POST">
					<input type="text" name="btn1" class="hidden" value="<?php if(isset($_SESSION['btn'])){echo $_SESSION['btn'];}else{echo 1;}?>">
					<input type="submit" class="btn btn-primary" value="VOLVER">
				</form>
			<?php }?>
			</div>
			<div class="col-xs-5"></div>
		</div>
	<?php include 'footer.php';?>
</div>
	<?php include 'applyfilter.php';?>
	<script>
		function next(){
				<?php $url = $_SERVER['PHP_SELF'] . "?30fe55df3ab2abce7ba2dd920344c1a2&startrow=" . ($startrow + $numOfrows) . "&30fe55df3ab2abce7ba2dd920344c1a2&range="?>
				var val = document.getElementById("range").value;
				window.location.replace('<?php echo $url;?>' + val);
		}
		function prev(){
				<?php 
				$sum = $startrow - $numOfrows;
					if ($sum < 0){
						$sum = 0;
					}
				?>
				
				<?php $url = $_SERVER['PHP_SELF'] . "?30fe55df3ab2abce7ba2dd920344c1a2&startrow=" . ($sum) . "&30fe55df3ab2abce7ba2dd920344c1a2&range="?>
				var val = document.getElementById("range").value;
				window.location.replace('<?php echo $url;?>' + val);
		}
	</script>
</body>
