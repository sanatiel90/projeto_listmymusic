<?php

require_once('../model/Connection.class.php');
require_once('../model/Manager.class.php');
require_once('../model/Validate.class.php');


$manager = new Manager();

$data["id"] = $_POST['id'];
$data["name"] = $_POST['name'];

$data = Validate::validateData($data);


$confirm = $manager->updateBand($data);


if($confirm){
	header("location: http://localhost/projeto_list_music/list.php?band_updated");

}else{
	header("location: http://localhost/projeto_list_music/list.php?error_update_band");
}

?>