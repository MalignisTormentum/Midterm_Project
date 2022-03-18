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

    function get_vehicles_by_make($make, $order){
        global $db; 
        $statement = $db->prepare('
            SELECT * FROM vehicles
            WHERE make_id = (
                    SELECT ID FROM makes
                    WHERE Make = :make
                )
            ORDER BY :order
        ');
        $statement->bindValue(':make', $make);
        $statement->bindValue(':order', $order);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_type($type, $order){
        global $db; 
        $statement = $db->prepare('
            SELECT * FROM vehicles
            WHERE type_id = (
                    SELECT ID FROM types
                    WHERE Type = :type
                )
            ORDER BY :order
        ');
        $statement->bindValue(':type', $type);
        $statement->bindValue(':order', $order);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_class($class, $order){
        global $db; 
        $statement = $db->prepare('
            SELECT * FROM vehicles
            WHERE class_id = (
                    SELECT ID FROM classes
                    WHERE Class = :class
                )
            ORDER BY :order
        ');
        $statement->bindValue(':class', $class);
        $statement->bindValue(':order', $order);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
?>