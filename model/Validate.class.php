<?php

class Validate{


	public static function validateData($data){
		$data["name"] = trim($data["name"]);
		$data["name"] = htmlspecialchars($data["name"]);
		$data["name"] = stripslashes($data["name"]);

		if(isset($data["comment"])){
			$data["comment"] = trim($data["comment"]);
			$data["comment"] = htmlspecialchars($data["comment"]);
			$data["comment"] = stripslashes($data["comment"]);
		}
	
		return $data;
	}


}






?>