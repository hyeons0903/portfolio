<?php
include_once('../common.php');

if($_POST['reg_id']){
    $reg_id = $_POST['reg_id'];
    $sql = "SELECT `disease_id` FROM `doctor_disease` WHERE `doctor_id` IN ({$reg_id}) " ;
    $result= sql_query($sql); 
    while($row=sql_fetch_array($result)){
        $in_list = empty($row)?'NULL':"'".join("','", $row)."'";
        $mysql = "SELECT `disease_name` FROM `disease_code` WHERE `disease_id` IN ({$in_list}) " ;
        $result2= sql_query($mysql);
        $low = sql_fetch_array($result2);
        echo "$sql";
    }  
};

if($_POST['disease_txt'] != NULL){
    $mb_txt = trim($_POST['disease_txt']);
    $strsql = "SELECT * FROM disease_code WHERE disease_name = '$mb_txt'";
    $result = sql_fetch($strsql);
    if($result == 0){
        echo"";
    } else {
        echo "존재하는 증상";
    }
};

if($_POST['disArr'] != NULL){

	$temp_q = 'select count(*) as count from disease_code;';
	$re = sql_query($temp_q);
	if($re->num_rows > 0){
		$row = $re->fetch_assoc();
		$rowNumber = $row['count'] + 1;
	}


    $disease_name = explode(',', $_POST['disArr']);
    foreach($disease_name as $value){
        $query2 = "INSERT INTO disease_code (disease_id, disease_name, rel_keyword) VALUES ('$rowNumber','$value','')";
		$q = sql_query($query2) or die (sql_error());    
		$rowNumber = $rowNumber + 1;
    }
};

if($_POST['tdArr']!= NULL){
    $reg_id = $_POST['reg_id'];
    $disease_code =explode(',', $_POST['tdArr']);
    if($_POST['doc_class']=="양의학"){
        $price = "4900";
            } else{
            $price = "9900";
        }
        $sql="DELETE FROM `doctor_disease` WHERE doctor_id = '$reg_id'";
        sql_query($sql);
    foreach($disease_code as $value){
        $query1 = "INSERT INTO doctor_disease (doctor_id, disease_id, price) VALUES ('$reg_id','$value','$price')" ;   
        $q = sql_query($query1) or die (sql_error());
    }   
};

if($_POST['disArr']!= NULL){
    $disease_name = explode(',', $_POST['disArr']);
    $reg_id = $_POST['reg_id'];
    if($_POST['doc_class']=="양의학"){
        $price = "4900";
            } else{
            $price = "9900";
        }
    $in_list = empty($disease_name)?'NULL':"'".join("','", $disease_name)."'";
    $sql = "SELECT `disease_id` FROM `disease_code` WHERE `disease_name` IN ({$in_list}) " ;
    $result= sql_query($sql); 
    while($row=sql_fetch_array($result)){
        foreach($row as $value){
        $query1 = "INSERT INTO doctor_disease (doctor_id, disease_id, price) VALUES ('$reg_id','$value','$price')" ;   
        $q = sql_query($query1) or die (sql_error()); }   
    }  
    echo"$sql";
};


if($_POST['reg_id']){
	$last_modified = date("Y-m-d H:i:s");
	$reg_id = $_POST['reg_id'];
    $reg_pw = $_POST['reg_pw'];
    $inst_name = $_POST['inst_name'];
    $doc_name = $_POST['doc_name'];
    $doc_tel = $_POST['doctor_tel'];
    $channel_addr = $_POST['channel_addr'];
    $inst_num = $_POST['inst_num'];
    $inst_addr = $_POST['inst_addr'];
    $day_time = $_POST['hiddenValue'];
    $bank = $_POST['bank'];
    $bank_num = $_POST['bank_num'];
    $self_introduce = $_POST['self_introduce'];
    $doc_desc = $_POST['doc_desc'];
    $doc_class = $_POST['doc_class'];
    $contact = $_POST['chkArray4'];



    $hash = password_hash($reg_pw, PASSWORD_DEFAULT);
    $q = "UPDATE doctor_member SET password='$hash', inst_name = '$inst_name', doc_name='$doc_name', doctor_tel='$doc_tel', doc_desc='$doc_desc',channel_addr='$channel_addr', inst_num='$inst_num', inst_addr='$inst_addr', day_time='$day_time', bank='$bank', bank_num='$bank_num', doc_class='$doc_class', self_introduce = '$self_introduce',contact='$contact'    WHERE user_id = '$reg_id' ";
    
    sql_query($q);

	echo "transmission";
}
?>