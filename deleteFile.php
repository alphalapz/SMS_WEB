<?PHP
	require 'functionsphp.php';
	require 'database.php';
	if (isset($_POST['MyFile'])){
		deleteFile($_POST['MyFile'],$_POST['MyFileDir'],$_POST['MyFileFile']);
		changeStatusToPorLiberarOsea2WhenBorrasOneRemisionEvidence($_POST['del_id']);
	}
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>