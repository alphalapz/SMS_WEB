<?php
	//error_reporting(1);
	date_default_timezone_set('America/Monterrey');
?>
<html lang="es">
<head>
	<title></title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validate.js"></script>
	<script src="js/myJs.js"></script>
	<script type="text/javascript" src="js/moment.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/myCss.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="css/daterangepicker.css" />
	<link rel="icon" type="image/png" sizes="96x96" href="assets/favicon.png">
	<script>
		$(document).ready(function() {
			/* This is basic - uses default settings */

			$("a#single_image").fancybox();

			/* Using custom settings */

			$("a#inline").fancybox({
				'hideOnContentClick': true
			});

			/* Apply fancybox to multiple items */

			$("a.group").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600,
				'speedOut'		:	200,
				'overlayShow'	:	false
			});

		});
	</script>
</head>
