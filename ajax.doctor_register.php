<?php
include_once('../common.php');

if($_POST['reg_id'] != NULL){
    $mb_id = trim($_POST['reg_id']);
    $strsql = "SELECT * FROM doctor_member WHERE user_id = '$mb_id'";
    $result = sql_fetch($strsql);
    if($result == 0){
        echo"";
    } else {
        echo "존재하는 아이디입니다.";
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

$array = explode('.', $_FILES['doc_img']['name']);
$extension = end($array);
$basename   = $reg_id . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$targetfolder = "../img/".$basename;
$targetname = "https://chrisneeds.kr/img/".$basename;

$file_type=$_FILES['doc_img']['type'];

if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpeg" || $file_type=="image/jpg") {

	if(move_uploaded_file($_FILES['doc_img']['tmp_name'], $targetfolder)) {
		echo "";
	} else {
		echo "Problem uploading file";
	}
};

if($_FILES['doc_img']['tmp_name']== ""){
    $targetname="https://chrisneeds.kr/img/doctor_nopic.png";
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
};


if($_POST['reg_id'] && $_POST['reg_pw']){
	$last_modified = date("Y-m-d H:i:s");
	$reg_id = $_POST['reg_id'];
    $reg_pw = $_POST['reg_pw'];
    $inst_name = $_POST['inst_name'];
    $doc_name = $_POST['doc_name'];
    $doc_tel = $_POST['doctor_tel'];
    $doc_img = $targetname;
    $doc_desc = $_POST['doc_desc'];
    $channel_addr = $_POST['channel_addr'];
    $inst_num = $_POST['inst_num'];
    $inst_addr = $_POST['inst_addr'];
    $day_time = $_POST['hiddenValue'];
    $bank = $_POST['bank'];
    $bank_num = $_POST['bank_num'];
    $doc_class = $_POST['doc_class'];
    $self_introduce = $_POST['self_introduce'];
    $contact = $_POST['chkArray4'];

	$hash = password_hash($reg_pw, PASSWORD_DEFAULT);
	$q = "INSERT INTO doctor_member (user_id, password, product_auth, inst_name, doc_name, doctor_tel, img_path, doc_desc, channel_addr, inst_num, inst_addr, day_time, bank, bank_num, doc_class,self_introduce,contact) VALUES ('$reg_id','$hash','a','$inst_name','$doc_name','$doc_tel','$doc_img','$doc_desc','$channel_addr','$inst_num','$inst_addr','$day_time','$bank','$bank_num','$doc_class','$self_introduce','$contact')";
    
    sql_query($q);

	echo "transmission";
}



//의사 계정 생성 용
	/*$hash = password_hash("test123", PASSWORD_DEFAULT);
	$q = "INSERT INTO doctor_member (user_id, password, product_auth) VALUES ('danaa','$hash','20')";
	sql_query($q);*/
?>

