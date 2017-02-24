<?php 

require_once('model/Connection.class.php');
require_once('model/Manager.class.php');

$manager = new Manager();

$musics = $manager->listMusics("WHERE levels.name_level <> 'lista' ORDER BY musics.id_music DESC");

$musics_wait = $manager->listMusics("WHERE levels.name_level = 'lista' ORDER BY musics.id_music DESC");


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Página Inicial</title>

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

    <?php if(isset($_GET['music_deleted'])){ ?>
    <div class="alert alert-success" role="alert">
      Música deletada
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>

   <?php } ?>

   <?php if(isset($_GET['music_updated'])){ ?>
   <div class="alert alert-success" role="alert">
    Música atualizada
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>

 <?php } ?>

 <?php if(isset($_GET['music_added'])){ ?>
 <div class="alert alert-success" role="alert">
  Música adicionada
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>

<?php } ?>


<?php if(isset($_GET['band_added'])){ ?>
<div class="alert alert-success" role="alert">
  Banda adicionada
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>

<?php } ?>



<?php if(isset($_GET['music_playable'])){ ?>
<div class="alert alert-success" role="alert">
  Música adicionada às tocáveis
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>

<?php } ?>





<!-- tabs de menu -->
<ul class="nav nav-pills nav-justified" role="tablist">
  <li role="presentation" class="active"><a href="#playable" aria-controls="playable" role="tab" data-toggle="pill">Tocando</a></li>
  <li role="presentation"><a href="#onwaitlist" aria-controls="onwaitlist" role="tab" data-toggle="pill" >Lista de Espera</a></li>

</ul>


<!-- conteudo das tabs -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="playable">

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">


        <div class="form-inline" >
          <a href="insert_music.php" class="btn btn-xs btn-success">+Adicionar Música</a>
          <a href="insert_band.php" class="btn btn-xs btn-warning">+Adicionar Banda</a>

        </div>
        
        <div class="form-inline" style="margin-top:10px">
         <label>Ordenar por</label>
         <select name="order" id="ordenation" class="form-control">
           <option value="id_music_desc" >Mais Recentes</option>
           <option value="id_music" >Id</option>
           <option value="name_music" >Nome</option>            
           <option value="name_band" >Banda</option>
           <option value="flag" >Nível</option>
           <option value="name_category" >Categoria</option>

         </select>



       </div>


     </div>
      <!--<div class="panel-body">
      <p>..alguma coisa aq.</p>
    </div>-->

    <div class="table-responsive">

     <?php if($musics != null) { ?>

     <table class="table table-striped table-bordered" id="data-table-music">
       <thead>
        <tr>
          <th class="text-center">Nível</th>
          <th class="text-center">Música</th>
          <th class="text-center">Banda</th>
          <th class="text-center">Categoria</th>
          <th class="text-center">Comentário</th>
          <th class="text-center">Ações</th>
        </tr>
      </thead>

      <tbody>

        <?php foreach($musics as $key){ ?>

        <tr>
         <td class="text-center"> <img src="public/<?php echo $key["name_level"]; ?>.png" class="img-responsive center-block"> </td>
         <td class="text-center"><?php echo $key["name_music"]; ?></td>
         <td class="text-center"><?php echo $key["name_band"]; ?></td>
         <td class="text-center"><?php echo $key["name_category"]; ?></td>
         <td class="text-center"><?php echo $key["comment_music"]; ?></td>
         <td class="text-center">

          <a href="edit_music.php?id=<?php echo $key["id_music"]; ?>" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
          <button data-toggle="modal" data-target="#delete-music" value="<?php echo $key["id_music"]; ?>"  type="button" class="bt-delete btn btn-md btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
          <a href="https://www.youtube.com/results?search_query=<?php echo $key["name_band"]; ?>+<?php echo $key["name_music"]; ?>" target="_blank" class="btn btn-md btn-default" style="background-color:#9932CC; color:white"><span class="glyphicon glyphicon-play"></span></a>

        </td>					
      </tr>

      <?php } ?>

    </tbody>
  </table>

  <?php }else{ ?>

  <h4 class="text-center">Não foram encontrados resultados</h4>

  <?php } ?>

</div>	


</div>


</div>

<div  role="tabpanel" class="tab-pane fade" id="onwaitlist">

 <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">

    <div class="form-inline">
      <a href="insert_music.php" class="btn btn-xs btn-success">+Adicionar Música</a>
      <a href="insert_band.php" class="btn btn-xs btn-warning">+Adicionar Banda</a>
    </div>

    <div class="form-inline" style="margin-top:10px">
     <label>Ordenar por</label>
     <select name="order" id="ordenation-wait" class="form-control">
       <option value="id_music_desc" >Mais Recentes</option>
       <option value="id_music" >Id</option>
       <option value="name_music" >Nome</option>            
       <option value="name_band" >Banda</option>
       <option value="name_category" >Categoria</option>

     </select>

   </div>

 </div>
      <!--<div class="panel-body">
      <p>..alguma coisa aq.</p>
    </div>-->

    <div class="table-responsive">

     <?php if($musics_wait != null) { ?>

     <table class="table table-striped table-bordered" id="data-table-music-wait">
      <thead>
        <tr>
          <th class="text-center">Nível</th>
          <th class="text-center">Música</th>
          <th class="text-center">Banda</th>
          <th class="text-center">Categoria</th>
          <th class="text-center">Comentário</th>
          <th class="text-center">Ações</th>
        </tr>
      </thead>

      <tbody>

        <?php foreach($musics_wait as $key){ ?>

        <tr>
          <td class="text-center"> <img src="public/<?php echo $key["name_level"]; ?>.png" class="img-responsive center-block"> </td>
          <td class="text-center"><?php echo $key["name_music"]; ?></td>
          <td class="text-center"><?php echo $key["name_band"]; ?></td>
          <td class="text-center"><?php echo $key["name_category"]; ?></td>
          <td class="text-center"><?php echo $key["comment_music"]; ?></td>
          <td class="text-center">
           <a href="controller/control_change_level.php?id=<?php echo $key["id_music"]; ?>" class="btn btn-md btn-warning"><span class="glyphicon glyphicon-cd"></span></a>

           <a href="edit_music.php?id=<?php echo $key["id_music"]; ?>" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
           <button data-toggle="modal" data-target="#delete-music" value="<?php echo $key["id_music"]; ?>"  type="button" class="bt-delete btn btn-md btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
           <a href="https://www.youtube.com/results?search_query=<?php echo $key["name_band"]; ?>+<?php echo $key["name_music"]; ?>" target="_blank" class="btn btn-md btn-default" style="background-color:#9932CC; color:white"><span class="glyphicon glyphicon-play"></span></a>

         </td>         
       </tr>

       <?php } ?>

     </tbody>
   </table>

   <?php }else{ ?>

   <h4 class="text-center">Não foram encontrados resultados</h4>

   <?php } ?>


 </div>	

</div>

</div>




</div> <!-- table content -->


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
<script src="myscript.js"></script>
</body>
</html>

<script>

  $('.bt-delete').on('click',function(){

  	var id = $(this).val();
  	
  	$('#confdelete').val(id);


  });



</script>



<!-- MODAL-->
<div class="modal fade text-center" id="delete-music">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
       <h4 class="modal-title" > Deseja deletar a música? </h4>
     </div>  

     <div class="modal-body text-center">

      <form action="controller/control_delete_music.php" method="POST">

        <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>
        

        <input value="" type="hidden" id="confdelete" name="id"/>

        <button  class="btn btn-danger"> Confirmar</button>
      </form> 

    </div>

    
  </div> <!-- content -->
</div> <!-- dialog -->
</div> <!-- modal fade-->