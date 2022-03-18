<?php
    function get_vehicles($order){
        global $db;
        $statement = $db->prepare('
            SELECT * FROM vehicles
            ORDER BY :order
        ');
        $statement->bindValue(':order', $order);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_make($make_id, $order){
        global $db; 
        $statement = $db->prepare('
            SELECT * FROM vehicles
            WHERE make_id = :make_id
            ORDER BY :order
        ');
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':order', $order);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_type($type_id, $order){
        global $db; 
        $statement = $db->prepare('
            SELECT * FROM vehicles
            WHERE type_id = :type_id
            ORDER BY :order
        ');
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':order', $order);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_class($class_id, $order){
        global $db; 
        $statement = $db->prepare('
            SELECT * FROM vehicles
            WHERE class_id = :class_id
            ORDER BY :order
        ');
        $statement->bindValue(':class_id', $class_id);
        $statement->bindValue(':order', $order);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

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

    function add_vehicle($year, $model, $price, $make_id, $type_id, $class_id){
        global $db; 
        $statement = $db->prepare('
            INSERT INTO vehicles (year, model, price, make_id, type_id, class_id)
            VALUES (:year, :model, :price, :make_id, :type_id, :class_id)
        ');
        $statement->bindValue(':year', $year);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_make($make){
        global $db;
        $statement = $db->prepare('
            INSERT INTO makes (Make)
            VALUES (:make)
        ')
        $statement->bindValue(':make', $make);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_type($type){
        global $db;
        $statement = $db->prepare('
            INSERT INTO types (Type)
            VALUES (:type)
        ')
        $statement->bindValue(':type', $type);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_class($class){
        global $db;
        $statement = $db->prepare('
            INSERT INTO classes (Class)
            VALUES (:class)
        ')
        $statement->bindValue(':class', $class);
        $statement->execute();
        $statement->closeCursor();
    }

    function remove_vehicle($year, $model, $price, $make_id, $type_id, $class_id){
        global $db; 
        $statement = $db->prepare('
            DELETE FROM vehicles
            WHERE year = :year AND model = :model AND price = :price AND 
            make_id = :make_id AND type_id = :type_id AND class_id = :class_id
        ');
        $statement->bindValue(':year', $year);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function remove_make($make_id){
        global $db; 
        $statement = $db->prepare('
            DELETE FROM makes
            WHERE ID = :make_id 
        ');
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function remove_type($type_id){
        global $db; 
        $statement = $db->prepare('
            DELETE FROM types
            WHERE ID = :type_id
        ');
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function remove_class($class_id){
        global $db; 
        $statement = $db->prepare('
            DELETE FROM classes
            WHERE ID = :class_id
        ');
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>