<?php
session_start();
include 'header.php';
require 'database.php';
require 'functionsphp.php';
require 'imgFunctions.php';
require_once 'mail/mail.php';

if (!isset($_SESSION['loggedin'])){
	redirectPHP('noPermission.php');
}
else{
	$txtResult = "<body>
	<div class=\"container-fluid\">";
	mysqli_autocommit($conexion, false);
	$flag = false;
	$txtResult = $txtResult . "<div class=\"row\">
			<div class=\"col-md-2\">
			</div>
			<div class=\"col-md-8\">
				<table>";
					// validate $_POST 
					if (isset($_POST['submit'])) {
						//get the delivery_id
						// $sql3 = "SELECT id_row FROM S_SHIPT_ROW WHERE bol_id = " . $_SESSION['Remision'] . " GROUP BY delivery_id;";
						$sql3 = "SELECT id_row, mail FROM s_shipt_row AS shr INNER JOIN s_shipt as sh ON sh.id_shipt = shr.id_shipt INNER JOIN su_shipper as shp  ON shp.id_shipper = sh.fk_shipper WHERE bol_id = " . $_SESSION['Remision'] . " GROUP BY shr.delivery_id;";

						$result3 = $conexion->query($sql3);
						$row3 = $result3->fetch_array(MYSQLI_NUM);
						$_SESSION['delivery_id'] = $row3[0];

						$target_path_dir = "uploads/" . date("Y") . "/" . $_SESSION['Folio'] . "_" . $_SESSION['Remision'] . "/";
						$sql = "SELECT COUNT(*) FROM S_EVIDENCE WHERE fk_ship_ship='" . $_SESSION['Folio'] . "' AND fk_ship_row = '" . $_SESSION['delivery_id'] . "';";
						$result = $conexion->query($sql);

						$row = $result->fetch_array(MYSQLI_NUM);

						if ($row[0] != 0){
							$j = $row[0]; //Variable for indexing uploaded image 
						}
						else{
							$j = 0;
						}

							$txtResult .= "<br>i: <pre><t>" . $_FILES['file']['name'] . "</pre>";
						for ($i = 0; $i < count($_FILES['file']['name']) - 1; $i++) {//loop to get individual element from the array
							$txtResult .= "<br>i: <br><t>" . $i . "<br>";
							$txtResult .= "<br>limit i: <br><t>" . count($_FILES['file']['name']) . "<br>";
							$target_path = "";
							$validextensions = array("jpeg", "jpg", "png", "gif","pdf");  //Extensions which are allowed
							$ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) for get extension file
							$file_extension = end($ext); //store extensions in the variable
							$file_name = $_SESSION['Folio'] . "-000-00" . ($j + 1);
							$target_path = $target_path_dir . $file_name . "." . $ext[count($ext) - 1];//set the target path with a new name of image
							$j = $j + 1;//increment the number of uploaded images according to the files in array       

							$mxFileSize = 1000000 * 12;

							if ($_FILES["file"]["size"][$i] > $mxFileSize) { //12MB aprox files can be uploaded.
								$txtResult = $txtResult . '<span class="error">La imagen excede el tamaño máximo permitido.' . $mxFileSize . '</span><br/><br/>';
								$_SESSION['CONTENT'] = $txtResult;
								redirectPHP('result.php');
							}

							if (!in_array($file_extension, $validextensions)) {
								is_dir($target_path)==false;
								//$txtResult = $txtResult . "<br>Imagen ' .$j. ').<span class=\"error\">El archivo posee una extensión no válida</span><br/><br/>";
								$_SESSION['CONTENT'] = $txtResult;
								redirectPHP('result.php');
							}

							$location = $_SERVER['DOCUMENT_ROOT'] . "/" . basename(__DIR__). "/" . $target_path;

							if(file_exists($location)){
								$txtResult = $txtResult . "<br>El archivo " . $j . " ya existe!";
								$_SESSION['CONTENT'] = $txtResult;
								redirectPHP('result.php');
							}

							$yearFolder = "uploads/" . date("Y") . "/";
							if (!file_exists($yearFolder)) {
								mkdir($yearFolder, 0755);     // Create year directory if it does not exist
							}

							if (!file_exists($target_path_dir)) {
								mkdir($target_path_dir, 0755);     // Create directory if it does not exist
							}
							$CanSave = false;
							if ($file_extension == "pdf"){
								if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
									$canSave = true;
								}
							}
							else{
								$imgTrans = new imageTransform();
								$imgTrans->sourceFile = $_FILES['file']['tmp_name'][$i];
								$imgTrans->targetFile = $target_path;
								$imgTrans->resizeToHeight = 1200;
								// $imgTrans->resizeToWeight = 800;
								$txtResult .= $target_path;
								if ($imgTrans->resize() == true){
									$canSave = true;
								}
							}

							if ($canSave) {//if file moved correctly to uploads folder
								$sql = "SELECT id_evidence as num FROM S_EVIDENCE ORDER BY id_evidence DESC LIMIT 1;";
								$result = $conexion->query($sql);
								$txtResult .= "<br>PRIMERA: <br><t>" . $sql . "<br>";
								
								$row = $result->fetch_array(MYSQLI_ASSOC);
								$max = $row['num'] + 1;
								$sql = "
									INSERT INTO S_EVIDENCE 
										(id_evidence, file_name, file_location, b_accept, b_del, b_sys, 
										fk_ship_ship, fk_ship_row ,fk_usr_upload, fk_usr_accept, fk_usr_ins, fk_usr_upd, 
										ts_usr_upload, ts_usr_accept, ts_usr_ins, ts_usr_upd)
									VALUES
										(" . $max . ", '" . $file_name . "." . $file_extension . "' , '" . $target_path_dir . "' , 0, 0, 0," 
										. $_SESSION['Folio'] . "," . $_SESSION['delivery_id'] . "," . $_SESSION['user_id'] . ", 1, 1, " . $_SESSION['user_id'] . ",
										NOW(),NOW(),NOW(),NOW())";
								$result = $conexion->query($sql);
								
								$txtResult .= '<td><span class="noerror">Evidencia subida de manera correcta!!.</span><br/><br/>';
								$txtResult .= "<a id='single_image' href='" . $target_path . "'><img src=" . $target_path . " class='deleteClass'/></a><br></td>";
								$txtResult .= "<br>Segunda: <br><t>" . $sql . "<br>";
								//Verify if all Remissions had evidences with status B_ACCEPT equal to 1.
								$flag = validateIfAllRemissionsHadEvidence($_SESSION['Folio']);
								//sendMail($row3[1]);
								if ($flag){
									$txtResult .= "<br>Commit: <br><t>TRUE<br>";
									mysqli_commit($conexion);
								}
							} else {//if file was not moved.
							//$txtResult = $txtResult . '<br>Imagen ' . $j . ').<span class="error">Error, por favor intenta de nuevo más tarde.</span><br/><br/>';
							}
						}
					} else {
						$txtResult .= "Ya ha sido cargada una evidencia de manera previa.";
					}
					$txtResult .= "</table>
												</div>
													<div class=\"col-md-2\">
													</div>
													<div class=\"row\">
														<div class=\"col-md-12 text-center\">
														<br><br><a href=\"index.php\"><span class=\"glyphicon glyphicon-home\"></span> -Inicio-</a>
													</div>
												</div>
											</div>
										</div>
									</body>";
	$_SESSION['CONTENT'] = $txtResult;
	redirectPHP('result.php');
}
?>