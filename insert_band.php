<?php

require_once('model/Connection.class.php');
require_once('model/Manager.class.php');

$manager = new Manager();


$bands = $manager->listTables("bands", "ORDER BY name_band");

$categories = $manager->listTables("categories", "ORDER BY name_category");

$levels = $manager->listTables("levels", "ORDER BY flag");



?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Nova Banda</title>

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>

     <header>
      <nav class="navbar navbar-inverse">
       <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">MyMusic</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">

        <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastrar <span class="caret"></span></a>
         <ul class="dropdown-menu">
          <li><a href="insert_music.php">Músicas</a></li>
          <li><a href="insert_band.php">Bandas</a></li>
          

        </ul>
      </li>


      <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar <span class="caret"></span></a>
         <ul class="dropdown-menu">
          <li><a href="index.php">Músicas</a></li>
          <li><a href="list.php">Bandas</a></li>
          

        </ul>
      </li>
    </ul>


    <ul class="nav navbar-nav navbar-right">


    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->


</nav>

</header>	

<main>

  <div class="container">

      <legend>Nova Banda</legend>

      <form method="POST" action="controller/control_add_band.php">
        <div class="form-group">
         <label for="name">Nome</label>
         <input type="text" class="form-control" name="name" id="name" autofocus required placeholder="Nome da banda" >
       </div>
       
      
    

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <button type="reset" class="btn btn-default">Cancelar</button>
      </form>



     

    </div>

  </main>

  <footer>
    <hr>
    <div class="text-center">
      <strong><p style="font-size:10px"> MyMusic - <?php echo date("Y"); ?></p></strong>
    </div>
  </footer>



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="bootstrap/js/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/myscript.js"></script>
</body>
</html>

