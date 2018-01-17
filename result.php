<?php
include 'header.php';
require 'functionsphp.php';
session_start();
if(isset($_SESSION['CONTENT'])){
	
    include 'menuChofer.php';
	include 'footer.php';
	echo $_SESSION['CONTENT'];
	unset($_SESSION['CONTENT']);
}
else{
	redirectPHP('index.php');
}
?>	