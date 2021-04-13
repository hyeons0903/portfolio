<?php
include_once('./_common.php');

$url = "https://kapi.kakao.com/v1/user/unlink";
$data =  array('target_id_type' => 'user_id' , 'target_id'=>"$mb_id");
$options = array(
  'http' => array(
    'header' => "Authorization: KakaoAK {e8e49d1f0e7db126e307b885cb049023}", //21.02.18 현규 수정
    'method' => 'POST',
    'content' => http_build_query($data)
  )
  );

  $context = stream_context_create($options); //데이터가공
  $result = file_get_contents($url, false, $context); //전송 ~결과값 반환

  $data = json_decode($result, true); //반환된 결과를 json으로 변환한다.

  print_r($data); //결과 값을 출력한다.

  //json 출력 방식1
  foreach($data as $row){
    print $row['index'];
  }



?>
