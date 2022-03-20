<?php

function get_makes(){
    global $db; 
    $statement = $db->prepare('
        SELECT * FROM makes
    ');
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function add_make($make){
    global $db;
    $statement = $db->prepare('
        INSERT INTO makes (Make)
        VALUES (:make)
    ');
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();
}

function remove_make($make_id){
    try{
        global $db; 
        $statement = $db->prepare('
            DELETE FROM makes
            WHERE ID = :make_id 
        ');
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (exception $e){
        echo "Something happened when trying to remove that make. Are there vehicles in the database with that make? Remove those first.";
    }
}

?>