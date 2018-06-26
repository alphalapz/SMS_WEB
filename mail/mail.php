<?php
// require_once 'PHPMailer/class.php';
require_once 'PHPMailer/PHPMailerAutoload.php';

function sendMail($destiny){
	// if (isset($_POST['send'])) {
	// if (isset($_REQUEST['toid'])) {
		// Fetching data that is entered by the user
		
		// $email    = $_POST['email'];
		$email    = "soporte.cartro@gmail.com";
		// $password = $_POST['password'];
		$password = "Cambio18!";
		$to_id    = $destiny;
		// $to_id    = "alfredo.lapz@gmail.com";
		// $message  = $_POST['message'];
		$message  = "Gracias por usar el portal de CARTRÓ. Tu evidencia se ha subido con éxito. A partir del 1° de Julio es obligatorio subir tu evidencia para poder cobrar tu viaje. Saludos";
		// $subject  = $_POST['subject'];
		$subject  = "SMS CARTRÓ";
		
		// Configuring SMTP server settings
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->Port       = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth   = true;
		$mail->Username   = $email;
		$mail->Password   = $password;
		$mail->FromName   = "Cartró";
		$mail->CharSet 	  = "UTF-8";
		
		// Email Sending Details
		$mail->addAddress($to_id);
		$mail->Subject = $subject;
		$mail->msgHTML($message);
		
		// Success or Failure
		if (!$mail->send()) {
			$error = "Error: " . $mail->ErrorInfo;
			echo '<p>' . $error . '</p>';
		} else {
			echo '<p>Mensaje enviado de manera correcta!</p>';
		}
	// } else {
		// echo '<p>No tienes permiso de estar aquí!</p>';
	// }
}
?>