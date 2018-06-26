<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<div class="outer">
				<div class="middle">
					<div class="inner">
						<?php include 'logo.php';?>
					</div>
				</div>
			</div>

		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class=""><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Inicio</a></li>
				<?php
					switch ($_SESSION['rol']){
						case ROL_ADMIN:
							echo "<li class=''><a href='registry.php' class='navbar-brand btnMenu' >|Nuevo registro|</a></li>";
						break;
						case ROL_CREDIT:
						echo "<li class='dropdown'>";
							echo "<a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class='glyphicon glyphicon-filter'></span>&nbsp;Órdenes de embarque:";
							echo "<span class='caret'></span></a>";
							echo "<ul class='dropdown-menu'>";
								echo "<li><a href='eviFolios.php?bf1dc=1'>Por aprobar</a></li>";
								echo "<li><a href='eviFolios.php?bf1dc=2'>Aprobadas</a></li>";
								echo "<li><a href='eviFolios.php?bf1dc=3'>Todas las órdenes</a></li>";
							echo "</ul>";
						echo "</li>";
						break;
						case ROL_TRANS:
							echo "<li class='dropdown'>";
							echo "<a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class='glyphicon glyphicon-filter'></span>&nbsp;Órdenes de Embarque:";
							echo "<span class='caret'></span></a>";
							echo "<ul class='dropdown-menu'>";
								echo "<li><a href='filterTrans.php?bf1dc=" . FILTER_POR_SUBIR . "'>Por subir</a></li>";
								echo "<li><a href='filterTrans.php?bf1dc=" . FILTER_POR_ACEPTAR . "'>Por aceptar</a></li>";
								echo "<li><a href='filterTrans.php?bf1dc=" . FILTER_POR_ACEPTADAS . "'>Aceptadas</a></li>";
								echo "<li><a href='filterTrans.php?bf1dc=" . FILTER_POR_ALL . "'>Todas las órdenes</a></li>";
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
				<li class=""><a><?php echo $_SESSION['name'];?></a></li>
				<li class="active"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="vacio"></div>
<br>
<br>
<br>
<br>
