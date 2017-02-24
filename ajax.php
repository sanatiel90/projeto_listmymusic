<?php

require_once('model/Connection.class.php');
require_once('model/Manager.class.php');

$manager = new Manager();

$order = $_POST['data'];
$extra = "";

if($order == "id_music_desc"){
	$order = "id_music";	
	$extra = " DESC";	
}

$musics = $manager->listMusics("WHERE levels.name_level <> 'lista' ORDER BY $order $extra");

echo json_encode($musics);


?>