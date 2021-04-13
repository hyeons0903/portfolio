<?php
include_once('../common.php');


    $od_id = $_POST['od_id'];

    $mysql = " UPDATE g5_shop_cart SET ct_direct = '1' where od_id = '$od_id'; "; 
    sql_query($mysql);


?>