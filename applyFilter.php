<?php 
	## include 'applyFilter.php';
?>
<script>
	// Receive the $col for apply filter on this column 
	//	THE FIRST COLUMN IS ZERO
	function filterTable(col) {
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput01");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[col];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}       
		}
	}

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