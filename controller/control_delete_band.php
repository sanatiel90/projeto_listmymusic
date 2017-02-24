<?php

require_once('../model/Connection.class.php');
require_once('../model/Manager.class.php');



$manager = new Manager();


$confirm = $manager->deleteBand($_POST['id']);

if($confirm){
	header("location: http://localhost/projeto_list_music/list.php?band_deleted");

}else{
	header("location: http://localhost/projeto_list_music/list.php?error_delete_band");
}


?>