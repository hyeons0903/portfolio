<?php
include_once('../common.php');
include_once(G5_LIB_PATH.'/biztalk.php');


$rcvNumber = $_POST['rcvNumber'];
$pharmacy_kakao = $_POST['pharmacy_kakao'];
$od_id = $_POST['od_id'];
$inst_name = $_POST['inst_name'];
$disease_name = $_POST['disease_name'];

//���� ���ڷ� �ǻ翡�� �˸���.
if($config['cf_sms_use'] == 'icode') {
    //처방전 발송 완료시 발송완료 알림톡,리뷰 알림톡 전송
    $review = "👨🏻‍⚕️’".$inst_name."’에서 ‘".$disease_name."’ 진료는 만족하셨나요?\n✔️내가 받은 진료 만족 리뷰를 달아주세요.";
    $url = "https://www.chrisneeds.kr/shop/review.php?od_id=".$od_id."";
    $ch= curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://www.biztalk-api.com/v2/kko/sendAlimTalkBatch');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS,"{\"msgList\":[
                                                {\"msgIdx\":\"shingoonk\",
                                                \"countryCode\":\"82\",
                                                \"recipient\":\"".$rcvNumber."\",
                                                \"senderKey\":\"f26bed5267004af80c3fe551930b04186769a225\",
                                                \"message\":\"".$pharmacy_kakao."\",
                                                \"tmpltCode\":\"pharmacychris\",
                                                \"resMethod\":\"PUSH\"},
                                                {\"msgIdx\":\"shingoonk1\",
                                                 \"countryCode\":\"82\",
                                                 \"recipient\":\"".$rcvNumber."\",
                                                 \"senderKey\":\"f26bed5267004af80c3fe551930b04186769a225\",
                                                 \"message\":\"".$review."\",
                                                 \"tmpltCode\":\"review\",
                                                 \"resMethod\":\"PUSH\",
                                                 \"attach\":{
                                                    \"button\":[
                                                        {\"name\":\"지금 리뷰 작성하기\",
                                                        \"type\":\"WL\",
                                                        \"url_mobile\":\"".$url."\",
                                                        \"url_pc\":\"".$url."\"}]
                                                        }
                                                    }
                                                    ]}"); 
    curl_setopt($ch, CURLOPT_POST, 1);
    $headers= array();
    $headers[]= 'Content-Type:application/json'; 
    $headers[]= 'bt-token:'.$token.''; 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
    $result = curl_exec($ch); 
    if(curl_errno($ch)) {
    echo 'Error:'.curl_error($ch); }
    $data = json_decode($result); //반환된 결과를 json으로 변환한다.
    $responseCode = $data->responseCode;
    
    if($responseCode == '1000'){
        echo "success";
    }else{
        echo "fail";
    }
    curl_close($ch);

	/* include_once(G5_LIB_PATH.'/icode.sms.lib.php');

	//$sms_content = "[����ũ����]".$drugStoreName."���� ó��߼ۿϷ�.";
	$recv_number = str_replace('-', '', $rcvNumber);
	$send_number = str_replace('-', '', $sms5['cf_phone']);

	if($recv_number) {
		$SMS = new SMS; // SMS ����
		$SMS->SMS_con($config['cf_icode_server_ip'], $config['cf_icode_id'], $config['cf_icode_pw'], $config['cf_icode_server_port']);
		$SMS->Add($recv_number, $send_number, $config['cf_icode_id'], iconv("utf-8", "euc-kr", stripslashes($sms_content)), "");
		$SMS->Send();
	
		echo "success";
	} else {
		echo "fail";
	} */
	
}


?>

