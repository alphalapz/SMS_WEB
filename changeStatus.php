<?php
	session_start();
	require 'database.php';
	require 'functionsphp.php';
	include 'header.php';
	canAccess($_SESSION['loggedin'], 'changeStatus.php', $_SESSION['rol']);
	$id_Selected = $_POST['evidence'];

	$sql = "UPDATE `S_EVIDENCE` SET `b_accept` = '1', `fk_usr_accept` =" . $_SESSION['user_id'] . " WHERE `id_evidence` = $id_Selected;";

	$result = $conexion->query($sql);
	ifNecesaryChangeStatus($id_Selected);
	include 'logo.php';
?>

<div class="Myouter">
	<div class="Mymiddle">
		<div class="Myinner">
			<h3>Cargando</h3>
			<div class="progress text-center">
				<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:85%">
					<p> Aprobando evidencia:</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	redirectjs("filterCredit.php?btn1=1");
</script>
<?php include 'footer.php'; ?>