<?php
include_once('./_common.php');
include_once(G5_THEME_SHOP_PATH.'/shop.head.php');




$q = "SELECT a.*, b.*, c.* FROM g5_shop_order a inner join g5_shop_cart b inner join member_selftest c WHERE a.od_id = b.od_id and b.mb_id = c.mb_id ";
$result = sql_query($q);
$list = '';
if($result ->num_rows > 0){
    while($row = sql_fetch_array($result)){
        $od_id = $row['od_id'];
        $addr1 = $row['od_b_addr1'];
        $addr2 = $row['od_b_addr2'];
        $addr3 = $row['od_b_addr3'];
        $it_name = $row['it_name'];
        $name = $row['mb_nick'];
        $doctor_id = $row['doctor_id'];
        $ct_qty=$row['ct_qty'];
        $json = json_decode($row["jsondata"]);
        $name = $json->{'patientname'};
        $it_id = $row['it_id'];
        $confirm = $row['doctor_confirmed'];
        $paid = $row['paid'];
        $ct_time = explode(' ',$row['ct_time']);
        $last_modified = explode(' ',$row['last_modified']);
        $patient_hp = $json->{'phonenumber'};
        $od_time = $row['od_time'];
        $ct_price = $row['ct_price'];
        $ct_option = $row['ct_option'];
        if($paid == '0'){
            $pay = '대기';
        }else{
            $pay = '완료';
        }
        if($confirm == '0'){
            $confirmed = '대기';
        }else{
            $confirmed = '완료';
        }
        if((strlen($it_id) == 9) && $paid == '1' && $ct_price >10000 && $ct_time[0] == $last_modified[0])
        {
            $list = '<div style="width:100%; height: 60px; background:#e5e5e5; border-radius:16px; margin:3px 0;font-size: 15px;">
                        <div style="float:left;width:15%;">'.$od_id.'<br>'.$ct_time[0].'</div>
                        <div style="float:left;width:10%;">'.$name.'<br>'.$patient_hp.'</div>
                        <div style="float:left;width:25%;">'.$it_name.'/'.$ct_option.'X'.$ct_qty.'</div>
                        <div style="float:left;width:5%;">'.$pay.'</div>
                        <div style="float:left;width:5%;">'.$confirmed.'</div>
                        <div style="float:left;width:40%;">'.$addr1.''.$addr2.''.$addr3.'</div>
                    </div>'.$list;
        }
    }
}
?>


<div class="list_box">
    <div style="width:1200px; margin: 90px auto 0;text-align:center;padding: 10px 0;">
    <div style="width:100%; height: 50px; background:#e5e5e5; border-radius:16px;font-size: 15px;">
        <div style="float:left;width:15%;">주문 번호/날짜</div>
        <div style="float:left;width:10%;">이름/번호</div>
        <div style="float:left;width:25%;">진료과목</div>
        <div style="float:left;width:5%;">결제여부</div>
        <div style="float:left;width:5%;">처방여부</div>
        <div style="float:left;width:40%;">주소</div>
    </div>
    <?php echo $list;?>
    </div>
</div>

<style>
.list_box{
    width:100%;
    height:auto;
    padding:50px 0;
}
</style>
