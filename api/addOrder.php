<?php

    require "../database.php";
    function addOrder($orderNb,$total, $date){
        global $conn;
        $result = mysqli_query($conn, "INSERT INTO invoice (orderNb, total, date) 
        VALUES ('$orderNb', $total, '$date');");
        if(!$result){
            echo "Error";
        }
    }
    
    $request_body = file_get_contents('php://input');
    $json = json_decode($request_body);

    addOrder($json->orderNumber, $json->total, $json->date);
?>