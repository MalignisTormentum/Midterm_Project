<?php

function get_vehicles($order){
    global $db;
    if ($order == 'price'){
        $query = '
            SELECT v.price, v.model, v.year, v.make_id, v.type_id, v.class_id, m.Make, c.Class, t.Type
            FROM (((vehicles v
            INNER JOIN makes m ON v.make_id = m.ID)
            INNER JOIN classes c ON v.class_id = c.ID)
            INNER JOIN types t on v.type_id = t.ID)
            ORDER BY v.price DESC;
        ';
    } else {
        $query = '
            SELECT v.price, v.model, v.year, v.make_id, v.class_id, v.type_id, m.Make, c.Class, t.Type
            FROM (((vehicles v
            INNER JOIN makes m ON v.make_id = m.ID)
            INNER JOIN classes c ON v.class_id = c.ID)
            INNER JOIN types t on v.type_id = t.ID)
            ORDER BY v.year DESC;
        ';
    }
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_make_id($make_id, $order){
    global $db;
    if ($order == 'price'){
        $query = '
            SELECT * FROM ( 
            SELECT v.price, v.model, v.year, v.make_id, v.class_id, v.type_id, m.Make, c.Class, t.Type 
            FROM (((vehicles v INNER JOIN makes m ON v.make_id = m.ID) 
            INNER JOIN classes c ON v.class_id = c.ID) 
            INNER JOIN types t on v.type_id = t.ID)) 
            AS vehicles WHERE vehicles.make_id = :make_id
            ORDER BY vehicles.price DESC;
        ';
    } else {
        $query = '
            SELECT * FROM ( 
            SELECT v.price, v.model, v.year, v.make_id, v.class_id, v.type_id, m.Make, c.Class, t.Type 
            FROM (((vehicles v INNER JOIN makes m ON v.make_id = m.ID) 
            INNER JOIN classes c ON v.class_id = c.ID) 
            INNER JOIN types t on v.type_id = t.ID)) 
            AS vehicles WHERE vehicles.make_id = :make_id
            ORDER BY vehicles.year DESC;
        ';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_type_id($type_id, $order){
    global $db;
    if ($order == 'price'){
        $query = '
            SELECT * FROM ( 
            SELECT v.price, v.model, v.year, v.make_id, v.class_id, v.type_id, m.Make, c.Class, t.Type 
            FROM (((vehicles v INNER JOIN makes m ON v.make_id = m.ID) 
            INNER JOIN classes c ON v.class_id = c.ID) 
            INNER JOIN types t on v.type_id = t.ID)) 
            AS vehicles WHERE vehicles.type_id = :type_id
            ORDER BY vehicles.price DESC;
        ';
    } else {
        $query = '
        SELECT * FROM ( 
            SELECT v.price, v.model, v.year, v.make_id, v.class_id, v.type_id, m.Make, c.Class, t.Type 
            FROM (((vehicles v INNER JOIN makes m ON v.make_id = m.ID) 
            INNER JOIN classes c ON v.class_id = c.ID) 
            INNER JOIN types t on v.type_id = t.ID)) 
            AS vehicles WHERE vehicles.type_id = :type_id
            ORDER BY vehicles.year DESC;
        ';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_class_id($class_id, $order){
    global $db;
    if ($order == 'price'){
        $query = '
            SELECT * FROM ( 
            SELECT v.price, v.model, v.year, v.make_id, v.class_id, v.type_id, m.Make, c.Class, t.Type 
            FROM (((vehicles v INNER JOIN makes m ON v.make_id = m.ID) 
            INNER JOIN classes c ON v.class_id = c.ID) 
            INNER JOIN types t on v.type_id = t.ID)) 
            AS vehicles WHERE vehicles.class_id = :class_id
            ORDER BY vehicles.price DESC;
        ';
    } else {
        $query = '
            SELECT * FROM ( 
            SELECT v.price, v.model, v.year, v.make_id, v.class_id, v.type_id, m.Make, c.Class, t.Type 
            FROM (((vehicles v INNER JOIN makes m ON v.make_id = m.ID) 
            INNER JOIN classes c ON v.class_id = c.ID) 
            INNER JOIN types t on v.type_id = t.ID))
            AS vehicles WHERE vehicles.class_id = :class_id
            ORDER BY vehicles.year DESC;
        ';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
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

function remove_vehicle($make_id, $type_id, $class_id){
    global $db; 
    $statement = $db->prepare('
        DELETE FROM vehicles
        WHERE make_id = :make_id AND type_id = :type_id AND class_id = :class_id
    ');
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

?>