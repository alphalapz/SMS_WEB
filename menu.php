<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">SMS_WEB</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
				<?php 
					switch ($_SESSION['rol']){
						case ROL_ADMIN:
							echo "<li class=''><a href='registry.php' class='navbar-brand btnMenu' >|NUEVO REGISTRO|</a></li>";
						break;
						case ROL_CREDIT:
						echo "<li class='dropdown'>";
							echo "<a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class='glyphicon glyphicon-filter'></span>&nbsp;Filtros:";
							echo "<span class='caret'></span></a>";
							echo "<ul class='dropdown-menu'>";
								echo "<li><a href='eviFolios.php?bf1dc=1'>Por Aprobar</a></li>";
								echo "<li><a href='eviFolios.php?bf1dc=2'>Aprobadas</a></li>";
								echo "<li><a href='eviFolios.php?bf1dc=3'>Mostrar Todas</a></li>";
							echo "</ul>";
						echo "</li>";
						break;
						case ROL_TRANS:
							echo "<li class='dropdown'>";
							echo "<a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class='glyphicon glyphicon-filter'></span>&nbsp;Filtros:";
							echo "<span class='caret'></span></a>";
							echo "<ul class='dropdown-menu'>";
								echo "<li><a href='filterTrans.php?bf1dc=1'>Por Subir</a></li>";
								echo "<li><a href='filterTrans.php?bf1dc=2'>Por Aceptar</a></li>";
								echo "<li><a href='filterTrans.php?bf1dc=3'>Aceptadas</a></li>";
								echo "<li><a href='filterTrans.php?bf1dc=4'>Mostrar Todas</a></li>";
							echo "</ul>";
						echo "</li>";
						break;
						case ROL_CHOFER:
							echo "<li class=''><a href='folios.php' class='navbar-brand btnMenu' >|Remisiones|</a></li>";
						break;
					}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class=""><a><?php echo strtoupper($_SESSION['name']);?></a></li>
				<li class="active"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="vacio"></div>