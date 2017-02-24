<?php

require_once('../model/Connection.class.php');
require_once('../model/Manager.class.php');
require_once('../model/Validate.class.php');


$manager = new Manager();

$data["name"] = $_POST['name'];
$data["comment"] = $_POST['comment'];

$data = Validate::validateData($data);


$data["band"] = $_POST['band'];
$data["category"] = $_POST['category'];
$data["level"] = $_POST['level'];

$confirm = $manager->addMusic($data);

if($confirm){
	header("location: http://localhost/projeto_list_music/index.php?music_added");

}else{
	header("location: http://localhost/projeto_list_music/index.php?error_add");
}


?>