<html>

<head>
<title>Paginate</title>
</head>
<body>
<form method='get'>
<?php
require 'database.php';
require 'functionsphp.php';
include 'header.php';
//THIS 2 LINES FOR INCLUDE THE PAGER
$startrow = pagerStartrow();
$numOfrows = pagerNumOfRows();

$sql = "SELECT * FROM erp.bpsu_bpb LIMIT $startrow, $numOfrows;";
		$result = $conexion->query($sql);
		$num = $result->num_rows;
        if($num>0)
        {
			printTable($result);
		}
echo "--------------------<br>";
//if (($startrow - $numOfrows) > 0){
		echo "<button type='button' onclick='prev()'><span class='glyphicon glyphicon-backward'>
				</span> Mostrar los $numOfrows registros posteriores</button>";
// }
		echo "<button type='button' onclick='next()'>Mostrar los siguientes $numOfrows registros
		<span class='glyphicon glyphicon-forward'></span></button>";

//print select
echo "<select id='range' name='range' class='pagesize'>";
for ($i=1;$i<=5;$i++){
	$value = $i * 10;

	if($numOfrows==$value){
		echo "<option selected='selected' value=".$value.">".$value."</option>";
	}else{
		echo "<option value=".$value.">".$value."</option>";
	}
}
echo "</select>";
?>

</form>

<script>
	function next(){
			<?php $url = $_SERVER['PHP_SELF'] . "?30fe55df3ab2abce7ba2dd920344c1a2&startrow=" . ($startrow + $numOfrows) . "&30fe55df3ab2abce7ba2dd920344c1a2&range="?>
			var val = document.getElementById("range").value;
			window.location.replace('<?php echo $url;?>' + val);
	}
	function prev(){
			<?php 
			$sum = $startrow - $numOfrows;
				if ($sum<0){
					$sum=0;
				}
			?>
			alert('<?php echo $num; ?>');
			<?php $url = $_SERVER['PHP_SELF'] . "?30fe55df3ab2abce7ba2dd920344c1a2&startrow=" . ($sum) . "&30fe55df3ab2abce7ba2dd920344c1a2&range="?>
			var val = document.getElementById("range").value;
			window.location.replace('<?php echo $url;?>' + val);
	}
</script>
</body>
</html>