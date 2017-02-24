<?php

require_once('model/Connection.class.php');
require_once('model/Manager.class.php');

$manager = new Manager();


$music = $manager->findMusic($_GET['id']);

$bands = $manager->listTables("bands", "ORDER BY name_band");

$categories = $manager->listTables("categories", "ORDER BY name_category");

$levels = $manager->listTables("levels", "ORDER BY flag");


if($music == null){
	header("location: http://localhost/projeto_list_music/index.php");
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Editar Música</title>

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
          <li><a href="insert_band.php">Bandas</a></li>
         

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

			<legend>Editar Música</legend>

  				<form method="POST" action="controller/control_update_music.php">
  					<div class="form-group">
  						<label for="name">Nome</label>
  						<input type="text" class="form-control" name="name" value="<?php echo $music[0]['name_music']; ?>" >
  					</div>
  					<div class="form-group">
  						<select class="form-control" name="band">
  							<!-- se a banda atual do loop foreach for igual a banda que a musica ja esta ligada, colocar atributo 'selected' para deixar essa banda como a primeira marcada -->
  							<?php foreach($bands as $band){ ?>
  							<option value="<?php echo $band['id_band']; ?>"  <?php if($music[0]['name_band'] == $band['name_band']){echo "selected";}  ?> > <?php echo $band['name_band']; ?></option>  

  							<?php } ?>

  						</select>
  					</div>
  					<div class="form-group">
  						<select class="form-control" name="category">
  							<?php foreach($categories as $category){ ?>
  							<option value="<?php echo $category['id_category']; ?>"  <?php if($music[0]['name_category'] == $category['name_category']){echo "selected";}  ?> > <?php echo $category['name_category']; ?></option>  

  							<?php } ?>
  						</select>

  						<input type="hidden" value="<?php echo $music[0]['id_music']; ?>" name="id">
  					</div>
  					<div class="form-group">
  					

  					<?php foreach($levels as $level){ ?>
  					<div class="radio">
  						<label>
  							<input type="radio" name="level" <?php if($music[0]['name_level'] == $level['name_level']){echo "checked";}  ?> value="<?php echo $level['id_level']; ?>"> <?php echo $level['name_level']; ?>  <img src="public/<?php echo $level['name_level']; ?>.png" class="img-responsive center-block">   
  						</label>
  					</div>
  					<?php } ?>

  				</div>
  				<div class="form-group">
  					<label for="name">Comentário</label>
  					<textarea class="form-control" rows="3" name="comment"><?php echo $music[0]['comment_music']; ?></textarea>
  				</div>


  				<button type="submit" class="btn btn-success">Confirmar Alteração</button>
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

