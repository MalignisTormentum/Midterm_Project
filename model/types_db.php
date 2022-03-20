<?php

function get_types(){
    global $db; 
    $statement = $db->prepare('
        SELECT * FROM types
    ');
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function add_type($type){
    global $db;
    $statement = $db->prepare('
        INSERT INTO types (Type)
        VALUES (:type)
    ');
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}

function remove_type($type_id){
    try{
        global $db; 
        $statement = $db->prepare('
            DELETE FROM types
            WHERE ID = :type_id
        ');
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (exception $e){
        echo "Something happened when trying to remove that type. Are there vehicles in the database with that type? Remove those first.";
    }
}

?>