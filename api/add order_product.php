<?php

    require '../database.php';
    require './functions.php';

    function getOrderid($orderNb){
        global $conn;
        $result = mysqli_query($conn, "SELECT id from invoice where orderNb='$orderNb'");
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(!hasRows($rows)){
            die("{}");
        }

        // Free the result set
        mysqli_free_result($result);
        return $rows[0]['id'];
    }
    
    function addOrderProduct($obj){  // {orderNb: '23', total: 344, products: [{code: '12', quantity: 4, id: 12}]}
        global $conn;
        $result1 = mysqli_query($conn, "INSERT INTO invoice (orderNb,total,date) VALUES ('".$obj->orderNb."',".$obj->total.",'".$obj->date."');");
        if(!$result1){
            die("{}");
        }
        $products = $obj->products;
        $oid = getOrderid($obj->orderNb);
        foreach($products as $product){   
            
            $res = mysqli_query($conn, "UPDATE product SET quantity=quantity+".$product->quantity." WHERE id =".$product->id);
            if(!$res){
                die("{}");
            }
            $result2 = mysqli_query($conn, "INSERT INTO order_product (orderid,productid,quantity) VALUES ($oid,".$product->id.",".$product->quantity.")");
            if(!$result2){
                die("{}");
            }
            
        }
        print_r("Success");

         
    }
    
    $request_body = file_get_contents('php://input');
    $json = json_decode($request_body);
    
    addOrderProduct($json);
?>