<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');

$li_list_html = '';
$disease_id = $_GET['disease_id'];

$q = "SELECT * FROM doctor_disease WHERE disease_id='$disease_id'";
$result = sql_query($q);

if($result->num_rows > 0){
	while ($row=sql_fetch_array($result)) {
		$doctor_id = $row['doctor_id'];

		$q1 = "SELECT * FROM doctor_member WHERE user_id='$doctor_id'";
		$result1 = sql_query($q1);
		if($result1->num_rows > 0){
			$row1 = $result1->fetch_assoc();
			$doctor_tel = $row1['doctor_tel']; //의사 정보를 가져온다..일단 전화번호만..
			$doctor_name = $row1['doc_name'];
			$li_list_html = $li_list_html.'<li id="'.$doctor_id.'"><input type="text" value="'.$doctor_name.'" /><input type="text" value="'.$doctor_tel.'" />';
		}
	}
}

?>

<div style='height: 300px;'>
	<ul id='doctor_list' style='top:150px;left:50px;position: absolute;'>
		<?php
			if($li_list_html == '') {
				echo '검색결과가 없습니다.';
			} else {
				echo $li_list_html;
			}
		?>
	</ul>
</div>

<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>
