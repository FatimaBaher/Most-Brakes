<?php
require '../database.php';
require("./functions.php");
// <!-- we will have here the APIs that are common between some pages -->




// <!-- get list of product codes and prices -->
function get_products(){
    global $conn;
    $result = mysqli_query($conn, "SELECT code, wholesale_price, id FROM product");
    if(!$result){
        die("{}");
    }else{
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(!hasRows($rows)){
            die("{}");
        }
        print_r(json_encode($rows));
    }
}

function getProductId($code){
    global $conn;
    $query = "SELECT id FROM product where code='" . $code . "'";
    $result = mysqli_query($conn, $query );
    if(!$result){
        die("{}");
    }else{
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(!hasRows($rows)){
            die("{}");
        }
        print_r($rows[0]["id"]);
    }
}

function getProductsInfo(){
    global $conn;
    $query = "Select * from product";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("{}");
    }else{
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(!hasRows($rows)){
            die("{}");
        }
        print_r(json_encode($rows));
    }
}

function getOrdersInfo(){
    global $conn;
    $query = "Select * from invoice";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("{}");
    }else{
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(!hasRows($rows)){
            die("{}");
        }
        print_r(json_encode($rows));
    }
}


function editQuantity($code){
    global $conn;
    $query = "Update product set quantity = quantity -1 where code = '" . $code."'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("{}");
    }
}

function addSoldProduct($code,$category,$price){
    global $conn;
    //adding product to sold_products table
    $idResult = mysqli_query($conn, "Select id from product where code='".$code."'" );
    $rows = mysqli_fetch_all($idResult, MYSQLI_ASSOC);
    if(!hasRows($rows)){
        die("{}");
    }
    $id = $rows[0]["id"];
    print_r($id);
    $query = "Insert into sold_products (productId,date) Values( ".$id.",CURRENT_DATE())";
    print_r($query);
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("{}");
    }

    //adding product to dailysales table
    $getquery = "Select $category,total from dailysales";
    $getResult = mysqli_query($conn, $getquery);
    if(!$getResult){
        die("{}");
    }
    $getRows = mysqli_fetch_all($getResult, MYSQLI_ASSOC);
    if (!hasRows($getRows))
            addDefaultDailySales();
    //changing category
    $cat = $getRows[0][$category];
    $cat_array =explode(",", $cat);
    $cat_quantity = intval($cat_array[0])+1;
    $cat_price = floatval($cat_array[1])+$price;
    $newCategory = $cat_quantity . "," . $cat_price;
    print_r($cat_array);

    //changing total
    $total = $getRows[0]["total"];
    $total_array = explode(",", $total);
    $total_items = intval($total_array[0])+1;
    $total_price = floatval($total_array[1])+$price;
    $newTotal = $total_items . "," . $total_price;

    $query2 = "update dailysales set $category='$newCategory', total = '$newTotal'";
    print_r($query2);
    $result2 = mysqli_query($conn, $query2);
    if(!$result2){
        die("{}");
    }
}

function getOrderId($orderNb){
    global $conn;
    $orderIdResult = mysqli_query($conn, "Select id from invoice where orderNb='".$orderNb."'" );
    if(!$orderIdResult){
        die("{}");
    } 
    else{
        $rows = mysqli_fetch_all($orderIdResult, MYSQLI_ASSOC);
        if(!hasRows($rows)){
            die("{}");
        }
        print_r($rows[0]["id"]);
    }
    
}

function getProductsOfOrder($orderId){
    global $conn;
    $products = [];
    $query = "Select productid,quantity from order_product where orderId=" . $orderId;
    $productIdResult = mysqli_query($conn, $query );
    
    if(!$productIdResult){
        die("{}");
    }
    else{
        $rows = mysqli_fetch_all($productIdResult, MYSQLI_ASSOC);
        if(!hasRows($rows)){
            die("{}");
        }
        else{
            foreach($rows as $row){
                $query2 = "Select code, category from product where id=" . $row["productid"];
                $productResult = mysqli_query($conn, $query2 );
                $rows2 = mysqli_fetch_all($productResult, MYSQLI_ASSOC);
                if(!$productResult){
                    die("{}");
                }
                $products[] = ["code" => $rows2[0]["code"], "category"=>$rows2[0]["category"], "quantity" => $row["quantity"]];
            }
            print_r(json_encode($products));
        }
        
    }
}

//handle the POST request

// get the body
$request_body = file_get_contents('php://input');
$json = json_decode($request_body);

if ($json->api=="get_products")
    get_products();
else if($json->api=="getProductId"){
    getProductId($json->code);
}else if($json->api=="getProductsInfo"){
    getProductsInfo();
}
else if($json->api=="getOrdersInfo"){
    getOrdersInfo();
}
else if($json->api=="editQuantity"){
    editQuantity($json->code);
}
else if($json->api=="addSoldProduct"){
    addSoldProduct($json->code, $json->category, $json->price);
}
else if($json->api=="getOrderId"){
    getOrderId($json->orderNb);
}
else if($json->api=="getProductsOfOrder"){
    getProductsOfOrder($json->orderId);
}
else echo("API not found")

?>