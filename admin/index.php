<?php
require('../model/db_connection.php');
require('../model/vehicles_db.php');
require('../model/makes_db.php');
require('../model/classes_db.php');
require('../model/types_db.php');

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

$make = filter_input(INPUT_POST, 'make', FILTER_UNSAFE_RAW);
if (!$make) {
    $make = filter_input(INPUT_GET, 'make', FILTER_UNSAFE_RAW);
}

$type = filter_input(INPUT_POST, 'type', FILTER_UNSAFE_RAW);
if (!$type) {
    $type = filter_input(INPUT_GET, 'type', FILTER_UNSAFE_RAW);
}

$class = filter_input(INPUT_POST, 'class', FILTER_UNSAFE_RAW);
if (!$class) {
    $class = filter_input(INPUT_GET, 'class', FILTER_UNSAFE_RAW);
}

$makes = get_makes();
$types = get_types();
$classes = get_classes();

switch ($action) {
    case 'list_vehicles':
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
    case 'remove_vehicle':
        remove_vehicle($make_id, $type_id, $class_id);
        $vehicles = get_vehicles($order);
        include('view/list_vehicles.php');
        break;
    case 'add_vehicle':
        if (isset($_POST) && !empty($_POST)){
            if ($make_id != 0 && $type_id != 0 && $class_id != 0){
                if (is_numeric($_POST['price']) && is_numeric($_POST['year'])){
                    add_vehicle($_POST['year'], $_POST['model'], $_POST['price'], $make_id, $type_id, $class_id);
                }
            }
        }
        include('view/add_vehicle.php');
        break;
    case 'list_makes':
        include('view/list_makes.php');
        break;
    case 'add_make':
        add_make($make);
        $makes = get_makes();
        include('view/list_makes.php');
        break;
    case 'remove_make':
        remove_make($make_id);
        $makes = get_makes();
        include('view/list_makes.php');
        break;
    case 'list_types':
        include('view/list_types.php');
        break;
    case 'add_type':
        add_type($type);
        $types = get_types();
        include('view/list_types.php');
        break;
    case 'remove_type':
        remove_type($type_id);
        $types = get_types();
        include('view/list_types.php');
        break;
    case 'list_classes':
        include('view/list_classes.php');
        break;
    case 'add_class':
        add_class($class);
        $classes = get_classes();
        include('view/list_classes.php');
        break;
    case 'remove_class':
        remove_class($class_id);
        $classes = get_classes();
        include('view/list_classes.php');
        break;
    default:
    $vehicles = get_vehicles($order);
    include('view/list_vehicles.php');
}
?>