<?php 

include_once('./_common.php');

if($_POST['mb_id']){
    $mb_id = $_POST['mb_id'];

    $q = "DELETE  FROM after_billing WHERE mb_id = '$mb_id'";
    $w = "DELETE  FROM after_price_info WHERE mb_id = '$mb_id'";
    $e = "DELETE  FROM customer_billing_info WHERE mb_id = '$mb_id'";
    $r = "DELETE  FROM g5_login WHERE mb_id = '$mb_id'";
    $t = "DELETE  FROM g5_member WHERE mb_id = '$mb_id'";
    $y = "DELETE  FROM g5_member_social_profiles WHERE mb_id = '$mb_id' ";
    $u = "DELETE  FROM g5_shop_cart WHERE mb_id = '$mb_id' ";
    $i = "DELETE  FROM g5_shop_order WHERE mb_id = '$mb_id' ";
    $o = "DELETE  FROM g5_shop_order_address WHERE mb_id = '$mb_id'";
    $p = "DELETE  FROM member_selftest WHERE mb_id = '$mb_id'";
    $a = "DELETE  FROM customer_billing_info WHERE mb_id = '$mb_id'";


sql_query($q);sql_query($w);sql_query($e);sql_query($r);sql_query($t);sql_query($y);sql_query($u);sql_query($i);sql_query($o);sql_query($p);sql_query($a);

echo "success";
}; 

?>