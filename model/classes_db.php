<?php

function get_classes(){
    global $db; 
    $statement = $db->prepare('
        SELECT * FROM classes
    ');
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function add_class($class){
    global $db;
    $statement = $db->prepare('
        INSERT INTO classes (Class)
        VALUES (:class)
    ');
    $statement->bindValue(':class', $class);
    $statement->execute();
    $statement->closeCursor();
}
 
function remove_class($class_id){
    try{
        global $db; 
        $statement = $db->prepare('
            DELETE FROM classes
            WHERE ID = :class_id
        ');
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (exception $e){
        echo "Something happened when trying to remove that class. Are there vehicles in the database with that class? Remove those first.";
    }
}

?>