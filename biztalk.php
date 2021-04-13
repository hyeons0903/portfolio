<?php
include_once('./_common.php');

            $ch= curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.biztalk-api.com/v2/auth/getToken');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_POSTFIELDS,"{\"bsid\":\"shingoonk\",\"passwd\":\"b0b42ea4483c7ed10d815e87adafd02a50e36605\"}"); 
            curl_setopt($ch, CURLOPT_POST, 1);
            $headers= array();
            $headers[]= 'Accept:application/json'; 
            $headers[]= 'Content-Type:application/json'; 
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
            $result = curl_exec($ch); 
            if(curl_errno($ch)) {
            echo 'Error:'.curl_error($ch); }
            $data = json_decode($result); //반환된 결과를 json으로 변환한다.

            
            $token = $data->token;
            
            curl_close($ch);
?>

