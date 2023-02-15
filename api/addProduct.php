<?php

    require '../database.php';
    function addProduct($code,$category,$customer_price,$wholesale_price,$descr,$quantity){
        global $conn;
        $result = mysqli_query($conn, "INSERT INTO product (code , category, customer_price, wholesale_price, quantity, description) VALUES ('$code', '$category', $customer_price, $wholesale_price, $quantity, '$descr');");
        if(!$result){
            echo "Error";
        }else{
            echo "Ok";
        }
    }
    $request_body = file_get_contents('php://input');
    $json = json_decode($request_body);

    addProduct($json->code, $json->category, $json->cPrice, $json->wPrice, $json->descr, $json->quantity);
?>