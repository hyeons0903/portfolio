<?php
include_once('./_common.php');

$drugStoreName = $_POST['drugStoreName'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$doctor_id = $_POST['doctor_id'];
$doctor_tel = $_POST['doctor_tel'];
$patientname = $_POST['patientname'];
$od_id = $_POST['od_id'];
$mb_id = $_POST['mb_id'];
$it_id = $_POST['it_id'];
$fax = $_POST['fax'];
$drugStoreInfo = "[".$drugStoreName."]"."[".$phone."][".$fax."]".$address;

//먼저 문자로 의사에게 알린다.
if($config['cf_sms_use'] == 'icode') {
    //21.02.22 현규 알림톡으로 변경
    include_once(G5_LIB_PATH.'/biztalk.php');
    $recv_number = str_replace('-', '', $doctor_tel);
    $falsedr_kakao = "'".$patientname."'환자님의 처방전 전송이 실패했습니다.\n지금 닥터크리스 '의사 화면'에서 처방전 전송을 확인하시고 대리발송해주세요.";

    $ch= curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://www.biztalk-api.com/v2/kko/sendAlimTalk');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS,"{\"msgIdx\":\"shingoonk2\",
                                            \"countryCode\":\"82\",
                                            \"recipient\":\"".$recv_number."\",
                                            \"senderKey\":\"ce3ea5ced6e88604f4917ca68a92e5c174b6aa57\",
                                            \"message\":\"".$falsedr_kakao."\",
                                            \"tmpltCode\":\"falsedr\",
                                            \"resMethod\":\"PUSH\"}"); 
    curl_setopt($ch, CURLOPT_POST, 1);
    $headers= array();
    $headers[]= 'Content-Type:application/json'; 
    $headers[]= 'bt-token:'.$token.''; 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
    $result = curl_exec($ch); 
    if(curl_errno($ch)) {
    echo 'Error:'.curl_error($ch); }
    $data = json_decode($result); //반환된 결과를 json으로 변환한다.
    curl_close($ch);
	/* include_once(G5_LIB_PATH.'/icode.sms.lib.php');

	$sms_content = "[닥터크리스]".$patientname."님 "." 처방전 전송 요청이 들어왔습니다.";
	$recv_number = str_replace('-', '', $doctor_tel);
	$send_number = str_replace('-', '', $sms5['cf_phone']);

	if($recv_number) {
		$SMS = new SMS; // SMS 연결
		$SMS->SMS_con($config['cf_icode_server_ip'], $config['cf_icode_id'], $config['cf_icode_pw'], $config['cf_icode_server_port']);
		$SMS->Add($recv_number, $send_number, $config['cf_icode_id'], iconv("utf-8", "euc-kr", stripslashes($sms_content)), "");
		$SMS->Send();
	} */

}

//의사 DB예 약국 정보를 넣어준다. -> member_selftest에 선택 약국 정보 UPDATE (수령할 약국 정보 삽입)
$q =  "UPDATE member_selftest SET drug_store = '$drugStoreInfo' WHERE od_id = '$od_id' and mb_id = '$mb_id' and product_type = '$it_id' and doctor_id = '$doctor_id' ";

$result = sql_query($q);

if($result){
	echo "success";
}
else {
	echo "fail";
}

?>