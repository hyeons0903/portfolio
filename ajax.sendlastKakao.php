<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/biztalk.php');


            $od_id = $_POST['od_id'];
            $inst_name = $_POST['inst_name'];
            $disease_name = $_POST['disease_name'];    
            $mb_hp = $_POST['tel'];


            $review = "👨🏻‍⚕️’".$inst_name."’에서 ‘".$disease_name."’ 진료는 만족하셨나요?\n✔️내가 받은 진료 만족 리뷰를 달아주세요.";
            $url = "https://www.chrisneeds.kr/shop/review.php?od_id=".$od_id."";
            $ch= curl_init();
            curl_setopt($ch, CURLOPT_URL,'https://www.biztalk-api.com/v2/kko/sendAlimTalk');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
            curl_setopt($ch, CURLOPT_POSTFIELDS,"{\"msgIdx\":\"shingoonk\",
                                                    \"countryCode\":\"82\",
                                                    \"recipient\":\"".$mb_hp."\",
                                                    \"senderKey\":\"ce3ea5ced6e88604f4917ca68a92e5c174b6aa57\",
                                                    \"message\":\"".$review."\",
                                                    \"tmpltCode\":\"review\",
                                                    \"resMethod\":\"PUSH\"},
                                                    \"attch\":{
                                                    \"button\":[
                                                        {\"name\":\"지금 리뷰 작성하기\",
                                                        \"type\":\"WL\",
                                                        \"url_mobile\":\"".$url."\",
                                                        \"url_pc\":\"".$url."\"}]
                                                        }
                                                    }"); 
            curl_setopt($ch, CURLOPT_POST, 1);
            $headers= array();
            $headers[]= 'Content-Type:application/json'; 
            $headers[]= 'bt-token:'.$token.''; 
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
            $result = curl_exec($ch); 
            if(curl_errno($ch)) {
            echo 'Error:'.curl_error($ch); }
            $data = json_decode($result); //반환된 결과를 json으로 변환한다.
            echo $data;
            curl_close($ch);
?>

zz