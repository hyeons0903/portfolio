<?php
include_once('./_common.php');


            include_once(G5_LIB_PATH.'/biztalk.php');
            //20210123 신욱 수정 : 카드등록 -> 문자 메세지에 환자 핸드폰 번호

            $review = "👨🏻‍⚕️’#{병원명}’에서 ‘#{증상명}’ 진료는 만족하셨나요?\n✔️내가 받은 진료 만족 리뷰를 달아주세요.";
            $url = "https://www.chrisneeds.kr/shop/review.php?od_id=#{od_id}";
            $ch= curl_init();
            curl_setopt($ch, CURLOPT_URL,'https://www.biztalk-api.com/v2/kko/sendAlimTalkBatch');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,"{\"msgList\":[
                                                        {\"msgIdx\":\"shingoonk2\",
                                                        \"countryCode\":\"82\",
                                                        \"recipient\":\"".$mb_hp."\",
                                                        \"senderKey\":\"ce3ea5ced6e88604f4917ca68a92e5c174b6aa57\",
                                                        \"message\":\"".$pharmacy_kakao."\",
                                                        \"tmpltCode\":\"pharmacychris\",
                                                        \"resMethod\":\"PUSH\"},
                                                        {\"msgIdx\":\"shingoonk\",
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

            curl_close($ch);



            include_once(G5_LIB_PATH.'/biztalk.php');
            $pharmacy_kakao = "진료받으신 #{병원이름}에서\n#{약국명}(으)로 처방전 발송이 완료되었습니다💊\n\n- 약국명 : #{약국명}\n- 주소 : #{약국주소}\n- 약국 연락처 : #{약국연락처}\n\n<약국 방문 전 필독 사항>\n\n🚨정상적인 팩스 전송 여부와 처방약\n보유 여부를 위해 방문 전 약국 번호로\n문의 후 방문해 주세요.\n\n🚨필히 신분증을 지참하여 약국에\n방문해 주시길 바랍니다";

            $ch= curl_init();
            curl_setopt($ch, CURLOPT_URL,'https://www.biztalk-api.com/v2/kko/sendAlimTalk');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,"{\"msgIdx\":\"shingoonk2\",
                                                    \"countryCode\":\"82\",
                                                    \"recipient\":\"".$patient_hp."\",
                                                    \"senderKey\":\"ce3ea5ced6e88604f4917ca68a92e5c174b6aa57\",
                                                    \"message\":\"".$pharmacy_kakao."\",
                                                    \"tmpltCode\":\"pharmacychris\",
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
            print($data);
            curl_close($ch);
?>
