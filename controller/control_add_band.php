<?php

require_once('../model/Connection.class.php');
require_once('../model/Manager.class.php');
require_once('../model/Validate.class.php');

$manager = new Manager();

$data["name"] = $_POST['name'];

$data = Validate::validateData($data);

$confirm = $manager->addBand($data);

if($confirm){
	header("location: http://localhost/projeto_list_music/index.php?band_added");

}else{
	header("location: http://localhost/projeto_list_music/index.php?error_add");
}


?>