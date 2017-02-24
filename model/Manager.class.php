<?php
include_once('Connection.class.php');

class Manager extends Connection{
    

public function listMusics($extra=""){
    $pdo = parent::getCon();

    try{
       
       $stmt = $pdo->prepare("SELECT musics.id_music, musics.name_music, musics.comment_music, bands.name_band, levels.name_level, levels.flag, categories.name_category  FROM musics INNER JOIN bands
                              ON bands.id_band = musics.id_band INNER JOIN categories ON categories.id_category = musics.id_category
                              INNER JOIN levels ON levels.id_level = musics.id_level $extra");


       $stmt->execute();
       $result = array();

       if ($stmt->rowCount()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
        } else {
        return false;
        }

}catch(Exception $e){
    echo $e->getMessage();
}


}


public function deleteMusic($id){

$pdo = parent::getCon();

try{
    $stmt = $pdo->prepare("DELETE FROM musics WHERE id_music = :id");

    $stmt->bindValue(":id", $id);


    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    
}catch(Exception $e){
    echo $e->getMessage();

}

}//fim metodo



public function deleteBand($id){

$pdo = parent::getCon();

try{
    $stmt = $pdo->prepare("DELETE FROM bands WHERE id_band = :id");

    $stmt->bindValue(":id", $id);


    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    
}catch(Exception $e){
    echo $e->getMessage();

}

}//fim metodo




public function findMusic($id){

    $pdo = parent::getCon();

    try{
    $stmt = $pdo->prepare("SELECT musics.id_music, musics.name_music, musics.comment_music, bands.name_band, levels.name_level, levels.flag, categories.name_category  FROM musics INNER JOIN bands
                              ON bands.id_band = musics.id_band INNER JOIN categories ON categories.id_category = musics.id_category
                              INNER JOIN levels ON levels.id_level = musics.id_level WHERE musics.id_music = :id  LIMIT 1");

    $stmt->bindValue(":id", $id);

    $stmt->execute();
    
    $result = array();

     if($stmt->rowCount()){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
           $result[] = $row;

       }
       return $result;
     }else{

     return false;
     
     }
    
}catch(Exception $e){
    echo $e->getMessage();

}


}//fim metodo


public function findBand($id){

    $pdo = parent::getCon();

    try{
    $stmt = $pdo->prepare("SELECT * FROM bands WHERE id_band = :id  LIMIT 1");

    $stmt->bindValue(":id", $id);

    $stmt->execute();
    
    $result = array();

     if($stmt->rowCount()){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
           $result[] = $row;

       }
       return $result;
     }else{

     return false;
     
     }
    
}catch(Exception $e){
    echo $e->getMessage();

}


}//fim metodo



public function listTables($table, $extra=""){
    $pdo = parent::getCon();

    try{

      

       $stmt = $pdo->prepare("SELECT * FROM $table $extra");

       $stmt->execute();
       $result = array();

       if ($stmt->rowCount()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
        } else {
        return false;
        }

}catch(Exception $e){
    echo $e->getMessage();
}


}



public function updateMusic($data){

    $pdo = parent::getCon();

    try {

        $stmt = $pdo->prepare("UPDATE musics SET name_music = :name, comment_music = :comment, id_band = :band, id_category = :category, id_level = :level  WHERE id_music = :id");
        
        $stmt->bindValue(":name", $data["name"]);
        $stmt->bindValue(":comment", $data["comment"]);
        $stmt->bindValue(":band", $data["band"]);
        $stmt->bindValue(":level", $data["level"]);
        $stmt->bindValue(":category", $data["category"]);
        $stmt->bindValue(":id", $data["id"]);



        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}




public function updateBand($data){

    $pdo = parent::getCon();

    try {

        $stmt = $pdo->prepare("UPDATE bands SET name_band = :name  WHERE id_band = :id");
        
        $stmt->bindValue(":name", $data["name"]);
       
        $stmt->bindValue(":id", $data["id"]);



        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}



public function addMusic($data){
    $pdo = parent::getCon();

    try{
        $stmt = $pdo->prepare("INSERT INTO musics(name_music,comment_music,id_band,id_category,id_level) VALUES(:name,:comment,:band,:category,:level)");
        $stmt->bindValue(":name",$data["name"]);
        $stmt->bindValue(":comment",$data["comment"]);
        $stmt->bindValue(":band",$data["band"]);
        $stmt->bindValue(":category",$data["category"]);
        $stmt->bindValue(":level",$data["level"]);

        if ($stmt->execute()) {
            return $pdo->lastInsertId();
        } else {
            return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
}


public function addBand($data){
    $pdo = parent::getCon();

    try{
        $stmt = $pdo->prepare("INSERT INTO bands(name_band) VALUES(:name)");
        $stmt->bindValue(":name",$data["name"]);
        
        if ($stmt->execute()) {
            return $pdo->lastInsertId();
        } else {
            return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
}



public function updateLevel($data){

    $pdo = parent::getCon();

    try {

        $stmt = $pdo->prepare("UPDATE musics SET id_level = :level  WHERE id_music = :id");
        
        
        $stmt->bindValue(":level", 4);
        $stmt->bindValue(":id", $data["id"]);



        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


} //fim class