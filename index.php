<?php
require('model/db_connection.php');
require('model/vehicles_db.php');
require('model/makes_db.php');
require('model/classes_db.php');
require('model/types_db.php');


$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if (!$make_id) {
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    if (!$make_id) {
        $make_id = 0; 
    }
}

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if (!$type_id) {
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    if (!$type_id) {
        $type_id = 0; 
    }
}

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if (!$class_id) {
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    if (!$class_id) {
        $class_id = 0; 
    }
}

$order = filter_input(INPUT_POST, 'order', FILTER_SANITIZE_STRING);
if (!$order) {
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_STRING);
    if (!$order) {
        $order = 'price'; 
    }
}

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'list_vehicles'; 
    }
}

$makes = get_makes();
$types = get_types();
$classes = get_classes();

switch ($action) {
    case 'list_vehicles_by_attribute':
        if ($make_id == 0 && $type_id == 0 && $class_id == 0){
            $vehicles = get_vehicles($order);
        } else{
            if ($make_id != 0){
                $vehicles = get_vehicles_by_make_id($make_id, $order);
            } else if ($type_id != 0){
                $vehicles = get_vehicles_by_type_id($type_id, $order);
            } else if ($class_id != 0){
                $vehicles = get_vehicles_by_class_id($class_id, $order);
            }
        }
        include('view/list_vehicles.php');
        break;
    default:
        $vehicles = get_vehicles($order);
        include('view/list_vehicles.php');
}
?>