<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">SMS_WEB</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
		<li class=""><a class="navbar-brand" ><?php echo strtoupper($_SESSION['username']);?></a></li>
      <!--  <li class=""><a href="logout.php"><span class="glyphicon glyphicon-filter"></span> Pendientes de subir</a></li>
        <li class=""><a href="logout.php"><span class="glyphicon glyphicon-filter"></span> pendientes de aprobar</a></li>
        <li class=""><a href="logout.php"><span class="glyphicon glyphicon-filter"></span> Evidencias aprobadas</a></li>
        <li class=""><a href="logout.php"><span class="glyphicon glyphicon-filter"></span> TODAS las evidencias</a></li>
		-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="vacio"></div>