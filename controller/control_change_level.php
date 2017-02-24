<?php

require_once('../model/Connection.class.php');
require_once('../model/Manager.class.php');


$manager = new Manager();

$data["id"] = $_GET['id'];


$confirm = $manager->updateLevel($data);


if($confirm){
	header("location: http://localhost/projeto_list_music/index.php?music_playable");

}else{
	header("location: http://localhost/projeto_list_music/index.php?error_change_level");
}

?>