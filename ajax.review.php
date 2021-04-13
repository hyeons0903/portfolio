<?php 
include_once('./_common.php');


if($_POST['od_id']){
	$last_modified = date("Y-m-d H:i:s");
    $review_count = $_POST['review_count'];
    $review_txt = $_POST['review_txt'];
    $od_id = $_POST['od_id'];

	$q = "UPDATE g5_shop_order SET review_star= '$review_count', review_txt='$review_txt' WHERE od_id = '$od_id' ";
    
    sql_query($q);

	echo "success";
}
?>