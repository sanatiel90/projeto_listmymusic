<?php

require_once('../model/Connection.class.php');
require_once('../model/Manager.class.php');



$manager = new Manager();

$confirm = $manager->deleteMusic($_POST['id']);

if($confirm){
	header("location: http://localhost/projeto_list_music/index.php?music_deleted");

}else{
	header("location: http://localhost/projeto_list_music/index.php?error_delete");
}


?>