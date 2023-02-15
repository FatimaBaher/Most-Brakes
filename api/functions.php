<?php
require("../database.php");
function hasRows($Rows){
    return count($Rows) > 0;
}

function addDefaultDailySales(){
    global $conn;
    $query = "insert into dailysales (brakePad, battery, oil, belt, total, date) values ('0,0','0,0','0,0','0,0','0,0',CURRENT_DATE())";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("{}");
    }
}



?>