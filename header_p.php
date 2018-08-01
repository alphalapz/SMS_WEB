<?php
	error_reporting(E_ALL);
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
	<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="js/daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/myCss.css">
	<script type="text/javascript" src="js/table/jquery-latest.js"></script>
	<script type="text/javascript" src="js/table/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="js/table/jquery.tablesorter.pager.js"></script>
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="css/daterangepicker.css" />
	<link rel="icon" type="image/png" sizes="96x96" href="assets/favicon.png">
	<script>
$(document).ready(function() {
    $("table")
    .tablesorter({widthFixed: true, widgets: ['zebra']})
    .tablesorterPager({container: $("#pager")});
});
	</script>
</head>
