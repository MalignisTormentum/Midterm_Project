<?php
    try{
        $db = new PDO( 
            'mysql:host=localhost;dbname=zippyusedautos;',
            'root', 
            ''
        );
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
