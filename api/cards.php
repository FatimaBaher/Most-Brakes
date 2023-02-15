<?php
require("../database.php");
require("./functions.php");
function getDailyStat(){
    $today = date("Y-m-d");
    global $conn;
    $query = "Select * from dailysales";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("{}");
    }else{
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (!hasRows($rows)) {
            addDefaultDailySales();
            print_r('{"battery":"0,0", "oil":"0,0", "belt":"0,0", "brakePad":"0,0", "total":"0,0"}');
        }
        else{
            if($rows[0]["date"] < $today){
                $query2 = 'update dailysales set battery="0,0", oil="0,0", belt="0,0", brakePad = "0,0", total="0,0", date= CURRENT_DATE()';
                $result2 = mysqli_query($conn, $query2);
                if(!$result2){
                    die("{}");
                }else{
                    print_r('{"battery":"0,0", "oil":"0,0", "belt":"0,0", "brakePad":"0,0", "total":"0,0"}');
                }
            }else{
                print_r(json_encode($rows[0]));
            }
        }
        
    }
}

function getGraphData(){
    global $conn;
    $query = "SELECT category,date,sum(p.customer_price) as price,count(category) as count FROM 'sold_products' as sp join 'product'as p where p.id = sp.productid group by category,date order by date";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("{}");
    }
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (!hasRows($rows)){
        die("{}");
    }
    print_r(json_encode($rows));
    
}

$request_body = file_get_contents('php://input');
$json = json_decode($request_body);

if ($json->api=="getDailyStat")
    getDailyStat();
else if ($json->api == "getGraphData") {
    getGraphData();
}
?>