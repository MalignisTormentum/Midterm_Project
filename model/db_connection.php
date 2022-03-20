<?php
    try{
        $db = new PDO( 
            'mysql:host=acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=on12dvmjkrfkmayo;',
            'aahwcrj0o404oo39', 
            'ser6bfs6wol01zal'
        );
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
