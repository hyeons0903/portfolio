<?php
include_once('../common.php');
include_once('./doctor_head.php');

$doctor_id = $_GET['doctor_id'];
if ($doctor_id == "" ) {
	alert("로그인이 필수 입니다.");
	exit; // 로그인한상태에서만 접근 가능 -> 로그인 페이지로 그냥 바로 연결되도록.
}


$sql = "SELECT * FROM `doctor_member`";
$result = sql_query($sql);

if($result->num_rows > 0){
	while ($row=sql_fetch_array($result)) {
		

		$q1 = "SELECT * FROM doctor_member WHERE user_id='$doctor_id'";
		$result1 = sql_query($q1);
		if($result1->num_rows > 0){
            $row1 = $result1->fetch_assoc();
            $password = $row1['password'];
			$doctor_tel = $row1['doctor_tel']; //의사 정보를 가져온다..일단 전화번호만..
            $doctor_name = $row1['doc_name'];
            $doc_img = $row1['img_path'];
            $inst_name = $row1['inst_name'];
            $inst_num = $row1['inst_num'];
            $inst_addr = $row1['inst_addr'];
            $bank = $row1['bank'];
            $day_time = $row1['day_time'];
            $bank_num = $row1['bank_num'];
            $doc_class = $row1['doc_class'];
            $doc_desc = $row1['doc_desc'];
            $channel_addr = $row1['channel_addr'];
            $self_introduce = $row1['self_introduce'];
            $contact = $row1['contact'];

		}
	}
};


if($doc_class == "양의학"){
    $doc_desc1 = $doc_desc;
}else{
    $doc_desc2= $doc_desc;
};


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>회원 정보 수정</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
body{
    margin:0!important;
}
.contain{
    width:100%;
    background:#e5e5e5;
    padding:238px 0;
}
.contain h2{
    font-weight: bold;
    font-size: 36px;
    line-height: 43px;
    letter-spacing: -0.005em;
    color:#333;
    width:1154px;
    margin:auto;
}
.contain div{
    width: 1154px;
    background:#fff;
    border-radius:16px;
    margin:0 auto 12px;
}
.contain div span{
    width: 296px;
    display: inline-block;
    padding-left: 68px;
    font-size: 24px;
    line-height: 33px;
    color:#333;
    letter-spacing: -0.005em;
}
.contain div input{
    width:699px;
    height:58px;
    border: 2px solid #E0E0E0;
    box-sizing: border-box;
    border-radius: 69px;
    margin:15px 0;
    padding: 0 26px;
}
.img_box{
    height: 150px;
    background:none!important;
    border-radius:16px;
    margin:auto;
    text-align:end;
}
.img_box label{
    width: 133px;
    height: 36px;
    left: 774px;
    top: 466px;
    background: #BDBDBD;
    border-radius: 18px;
    padding: 8px 24px;
    font-size:18px;
    color:#fff;
}
.id_box{
    padding:30px 0;
}
.name_box{
    padding:30px 0;
}
.td{
    padding:0!important;
}
#search{
    width:699px;
    display: inline-block;
}
#doc_class1{
    width:24px;
    height:24px;
}
#doc_class2{
    width:24px;
    height:24px;
}
#doc_desc1{
    transform: translateX(23px);
    display:none;
}
#doc_desc2{
    width:331px;
    height:58px;
    transform: translateX(56px);
    display:none;
}
#day{
    width:24px;
    height:24px;
}
#time_in1{
    width:233px;
    padding: 0px 33px;
    margin-right: 15px;
}
#time_in2{
    width:233px;
    padding: 0px 33px;
    margin-left: 15px;
}
#time_in3{
    width:233px;
    padding: 0px 33px;
    margin-right: 15px;
}
#time_in4{
    width:233px;
    padding: 0px 33px;
    margin-left: 15px;
}
#katalk{
    width:24px;
    height:24px;
}
#call{
    width:24px;
    height:24px;
}
#exform_txt{background:none;padding:12px 0 19px 0; text-align:right;color:#9a9a9a;font-size:13px;}
#exform_txt span{width:auto;display: inline-block;position:relative;  padding-left:10px}
#exform_txt span:after{content:'*';position:absolute;left:0;top:0; color:#f95427; font-size: 13px; font-weight: bold;}
#register{
    width: 355px;
    height: 80px;
    background: #57A49C;
    border-radius: 49px;
    margin: auto;
    display: block;
    font-size: 26px;
    line-height: 38px;
    text-align: center;
    letter-spacing: -0.025em;
    color: #FFFFFF;
    border:none;
}
#btn_wrap{
    background:none;
}
input[type=checkbox] {
    display:none;
}
input[type="checkbox"] + label:before{
     content:''; 
     width:18px; 
     height:18px; 
     text-align:center; 
     background:#fff; 
     border: 2px solid #57A49C;
     box-sizing:border-box; 
     position:absolute;
     border-radius:30px;
     transform: translateX(-23px);
     }
input[type="checkbox"]:checked + label:after{
     content:'●'; 
     width:18px; 
     height:18px; 
     text-align:center; 
     background:#fff; 
     border: 2px solid #57A49C;
     box-sizing:border-box; 
     position:absolute;
     border-radius:30px;
     transform: translateX(-23px);
     color:#57A49C;
     font-size: 12px;
    line-height: 17px;
     }

input[type=radio] {
    display:none;
}
input[type="radio"] + label:before{
     content:''; 
     width:20px; 
     height:20px; 
     text-align:center; 
     background:#fff; 
     border: 2px solid #57A49C;
     box-sizing:border-box; 
     position:absolute;
     border-radius:30px;
     transform: translateX(-23px);
     }
input[type="radio"]:checked + label:after{
     content:'●'; 
     width:20px; 
     height:20px; 
     text-align:center; 
     background:#fff; 
     border: 2px solid #57A49C;
     box-sizing:border-box; 
     position:absolute;
     border-radius:30px;
     transform: translateX(-23px);
     color:#57A49C;
     font-size: 13px;
    line-height: 19px;
     }
.daytime_box{
    padding: 15px 0;
    color:#828282;
    font-size:20px;
}
.contact_box{
    padding: 19px 0;
}
.docclass_box{
    color:#828282;
    font-size:20px;
}
.contact_box{
    color:#828282;
    font-size:20px;
}
.bank_box{
    padding: 19px 0;
}
select {
    border: 2px solid #bdbdbd;
    border-radius: 30px;
    width: 116px;
    height: 37px;
    background: url(../img/gray_arrow.png) no-repeat 95% 50%;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    padding: 0 18px;
}
#resultList{
    background-color: #ffffff;
    transform: translate(0px,-22px);
    overflow-y: auto;
    max-height: 300px;
    overflow-x: hidden;
    z-index: 99999;
    border: 2px solid #e4e8e9; 
    border-top: none;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    display:none;}
.console3{
    width:699px;
    display:contents;
    }
.console{
    height:0;
    margin:0!important;
}
.console0{
    height:0;
    margin:0!important;
}
.console2{
    height:0;
    margin:0!important;
}
.disease_name{
    width:auto!important;
    display:inline-block;
    border: 1px solid #97c3a1;
    border-radius: 30px!important;
    padding: 3px 10px;
    margin-right: 5px!important;
    margin-bottom: 5px!important;
    color:#97c3a1;
}
.day_time{
    width: 699px!important;
    display: inline-block;
}
input:focus {outline:none;}
button:focus{ 	
    border: none;
    outline:none;
    }
</style>

<body>

    <div class="contain">
    <h2>회원 정보 수정</h2>
    <div class="img_box">
            <?php
				if($doc_img == '') {
					echo '검색결과가 없습니다.';
				} else {
					echo "<img style='width:150px;'class='doctor_image' src='$doc_img'/>";
			  }?>
    </div>
    <div class="id_box">
        <span>아이디</span>
        <input type="hidden"name="reg_id" id="reg_id" value="<?php echo"$doctor_id" ?>"/><span class="td"><?php echo "$doctor_id" ?></span>
    </div>    
    <div class="pw_box">
        <span>변경 할 비밀번호</span>
        <input name="pw" class="pw" id="reg_pw" type="password" placeholder="4자이상 영문 소문자,숫자를 사용하세요">
        <span>비밀번호 확인</span>
        <input name="pw2" class="pw" id="reg_pw2"type="password" placeholder="비밀번호를 확인하세요.">        
        <div class="console"></div>
        <div class="console0"></div>
    </div>
    <div class="name_box">
        <span>이름</span>
        <input type="hidden"name="doc_name" id="doc_name" value="<?php echo"$doctor_name"?>"/><span class="td"><?php echo"$doctor_name"?></span>
    </div>
    <div class="phone_box">
        <span>변경 할 휴대폰 번호</span>
        <input name="phone" id="doctor_tel"type="text" maxlength="14" onKeyup="inputPhoneNumber(this);" placeholder=<?php echo"$doctor_tel"?>>     
    </div>
    <div class="instname_box">
        <span>변경 할 병원 이름</span>
        <input name="inst_name" id="inst_name"type="text" placeholder=<?php echo"$inst_name"?>>
    </div>
    <div class="instnum_box">
        <span>변경 할 병원 연락처</span>
        <input name="inst_num" id="inst_num" type="text" maxlength="14" onKeyup="inputPhoneNumber(this);" placeholder=<?php echo"$inst_num"?>>        
    </div>
    <div class="instaddr_box">
        <span>변경 할 병원 주소</span>
        <input name="inst_addr" id="inst_addr" type="text" placeholder=<?php echo$inst_addr?>>
    </div>
    <div class="bank_box">
        <span>변경 할 정산 계좌</span>
        <select name="bank" id="bank">
        <option value="selected"><?php echo"$bank"?></option>
        <option value="우리은행">우리은행</option>
        <option value="국민은행">국민은행</option>
        <option value="기업은행">기업은행</option>
        <option value="농협은행">농협은행</option>
        <option value="신한은행">신한은행</option>
        <option value="산업은행">산업은행</option>
        <option value="한국씨티은행">한국씨티은행</option>
        <option value="하나은행">하나은행</option>
        <option value="SC제일은행">SC제일은행</option>
        <option value="경남은행">경남은행</option>
        <option value="광주은행">광주은행</option>
        <option value="대구은행">대구은행</option>
        <option value="도이치은행">도이치은행</option>
        <option value="뱅크오브아메리카">뱅크오브아메리카</option>
        <option value="부산은행">부산은행</option>
        <option value="산림조합중앙회">산림조합중앙회</option>
        <option value="저축은행">저축은행</option>
        <option value="새마을금고">새마을금고</option>
        <option value="신협중앙회">신협중앙회</option>
        <option value="우체국">우체국</option>
        <option value="전북은행">전북은행</option>
        <option value="제주은행">제주은행</option>
        <option value="중국건설은행">중국건설은행</option>
        <option value="중국공상은행">중국공상은행</option>
        <option value="중국은행">중국은행</option>
        <option value="BNP파리바은행">BNP파리바은행</option>
        <option value="HSBS은행">HSBS은행</option>
        <option value="JS모간체이스은행">JS모간체이스은행</option>
        <option value="케이뱅크">케이뱅크</option>
        <option value="카카오뱅크">카카오뱅크</option>
        <option value="교보증권">교보증권</option>
        <option value="대신증권">대신증권</option>
        <option value="DB금융투자">DB금융투자</option>
        <option value="메리츠증권">메리츠증권</option>
        <option value="미래에셋대우">미래에셋대우</option>
        <option value="부국증권">부국증권</option>
        <option value="삼성증권">삼성증권</option>
        <option value="신영증권">신영증권</option>
        <option value="신한금융투자">신한금융투자</option>
        <option value="에스케이증권">에스케이증권</option>
        <option value="현대차증권">현대차증권</option>
        <option value="유안타증권">유안타증권</option>
        <option value="유진투자증권">유진투자증권</option>
        <option value="이베스트투자증권">이베스트투자증권</option>
        <option value="케이프주자증권">케이프주자증권</option>
        <option value="키움증권">키움증권</option>
        <option value="한국포스증권">한국포스증권</option>
        <option value="하나금융투자증권">하나금융투자증권</option>
        <option value="하이투자증권">하이투자증권</option>
        <option value="한국투자증권">한국투자증권</option>
        <option value="한화투자증권">한화투자증권</option>
        <option value="KB증권">KB증권</option>
        <option value="KTB투자증권">KTB투자증권</option>
        <option value="BNK투자증권">BNK투자증권</option>
        <option value="NH투자증권">NH투자증권</option>
        <option value="카카오페이증권">카카오페이증권</option>
        <option value="IBK투자증권">IBK투자증권</option>
        </select>
        <br>
        <span></span>
        <input name="bank_num" id="bank_num" type="text" placeholder=<?php echo"$bank_num"?>>
    </div>
    <div class="docclass_box">
        <span style="margin:31px 0">전공분야</span>
        <div style="width:70px;display: inline-block;margin:15px 0;transform: translateX(23px);"><input name="doc_class" id="doc_class1" class="doc_class1" type="radio" value="양의학"><label for="doc_class1"></label>양의학</div>
        <select name="doc_desc" id="doc_desc1">
            <option value="selected"><?php echo"$doc_desc1" ?></option>
            <option value="가정의학과">가정의학과</option>
            <option value="산업의학과">산업의학과</option>
            <option value="결핵과">결핵과</option>
            <option value="내과">내과</option>
            <option value="방사선종양학과">방사선종양학과</option>
            <option value="병리과">병리과</option>
            <option value="비뇨기과">비뇨기과</option>
            <option value="마취통증의학과">마취통증의학과</option>
            <option value="산부인과">산부인과</option>
            <option value="소아청소년외과">소아청소년외과</option>
            <option value="성형외과">성형외과</option>
            <option value="신경과">신경과</option>
            <option value="신경외과">신경외과</option>
            <option value="안과">안과</option>
            <option value="영상의학과">영상의학과</option>
            <option value="예방의학과">예방의학과</option>
            <option value="외과">외과</option>
            <option value="응급의학과">응급의학과</option>
            <option value="이비인후과">이비인후과</option>
            <option value="작업환경의학과/직업환경의학과">작업환경의학과/직업환경의학과</option>
            <option value="재활의학과">재활의학과</option>
            <option value="정신건강의학과">정신건강의학과</option>
            <option value="정형외과">정형외과</option>
            <option value="진단검사의학과">진단검사의학과</option>
            <option value="피부과">피부과</option>
            <option value="핵의학과">핵의학과</option>
            <option value="흉부외과">흉부외과</option>
            <option value="일반외과">일반외과</option>
            <option value="종합병원">종합병원</option>
        </select>
        <div style="width:70px;display: inline-block;margin:15px 0;transform: translateX(56px);"><input name="doc_class" id="doc_class2" class="doc_class2" type="radio" value="한의학"><label for="doc_class2"></label>한의학</div>
        <input name="doc_desc" id="doc_desc2" type="text" placeholder=<?php echo"$doc_desc2" ?>>        
    </div>
    <div class="introduce_box">
        <span>의사 소개</span>
        <input name="self_introduce" class="self_introduce" id="self_introduce"type="text" placeholder=<?php echo"$self_introduce"?> maxlength="22" >
    </div>
    <div class="search_box">
        <span style="transform: translateY(-100px);">추가 할 증상</span> 
        <div id='search'>
            <span></span>
            <input id='disease' type='text' oninput="updateResult(this.value);" placeholder='증상을 검색해보세요'></input>
            <ul id="resultList"></ul>
        <span></span><input name="disease_txt" id="disease_txt" type="text" value="" placeholder='증상 검색이 없을시 입력해주세요.' onkeydown="JavaScript:Enter_Check();"/>
        </div>
        <br><span style="transform: translateY(-100px);"></span>
        <div class="console3">
        <?php $mysql = "SELECT doctor_disease.disease_id, disease_code.disease_name FROM disease_code, doctor_disease WHERE disease_code.disease_id = doctor_disease.disease_id AND doctor_disease.doctor_id = '$doctor_id'";
				$result2 = sql_query($mysql);
				while($row2 = sql_fetch_array($result2)) {
					$disease_id = $row2['disease_id'];
					$disease_name = $row2['disease_name'];
					echo"<div id='$disease_id' class='disease_name' >$disease_name<img src='../img/x_image.png' style='width:12px;height:12px;margin-left:3px;' onclick='remove(this);'></div>";
				}; ?>
        </div>
    </div>
    <div class="daytime_box">
        <span>변경 할 요일 및 시간</span>
        <?php echo"<div class='day_time'>설정되있는 진료 요일 및 시간 : $day_time</div>"?>
        <span></span>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="day1" class="day1" name="day1" type="checkbox" value="월"><label for="day1"></label>월요일</div>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="day2" class="day1" name="day1" type="checkbox" value="화"><label for="day2"></label>화요일</div>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="day3" class="day1" name="day1" type="checkbox" value="수"><label for="day3"></label>수요일</div>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="day4" class="day1" name="day1" type="checkbox" value="목"><label for="day4"></label>목요일</div>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="day5" class="day1" name="day1" type="checkbox" value="금"><label for="day5"></label>금요일</div>
        <br><span></span>
        <input name="time" id="time_in1" type="time" value=""/>~<input name="time" id="time_in2" type="time" value=""/>
        <input name="hiddenValue" id="hiddenValue" type='hidden' value=""/>
        <br><span></span>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="day6" class="day2" name="day2" type="checkbox" value="토"><label for="day6"></label>토요일</div>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="day7" class="day2" name="day2" type="checkbox" value="일"><label for="day7"></label>일요일</div>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="day8" class="day3" name="day3" type="checkbox" value="공휴일휴무"><label for="day8"></label>공휴일휴무</div>
        <br><span></span>
        <input name="time" id="time_in3" type="time" value=""/>~<input name="time" id="time_in4" type="time" value=""/>
        <input name="hiddenValue" id="hiddenValue" type='hidden' value=""/>
    </div>
    <div class="contact_box">
        <span>변경 할 진료 방법</span>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="katalk" class="katalk" name="katalk" type="checkbox" value="카톡"><label for="katalk"></label>카카오톡</div>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="call" class="call" name="call" type="checkbox" value="전화"><label for="call"></label>전화</div>   
    </div>
    <div class="kakaoaddr_box">
        <span>변경 할 카카오 채팅창 주소</span>
        <input name="kakao" id="channel_addr" type="text" placeholder=<?php echo"$channel_addr"?>>
    </div>
    <div id="btn_wrap">
        <button id='register'>회원 정보 수정</button>
    </div>

</div>
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->

</body>
</html>

<script>
$( document ).ready(function(){
    if("<?php echo $doc_class?>" == "양의학"){
        $('input:radio[name="doc_class"]:input[value ="양의학"]').prop("checked", true);
    }else{
        $('input:radio[name="doc_class"]:input[value ="한의학"]').prop("checked", true);
    }
    
});
$( document ).ready(function(){
    if("<?php echo $contact?>" == "카톡"){
        $('input:checkbox[name="katalk"]:input[value ="카톡"]').prop("checked", true);
    }else if("<?php echo $contact?>" == "전화") {
        $('input:checkbox[name="call"]:input[value ="전화"]').prop("checked", true);
    }else if("<?php echo $contact?>" == "카톡,전화"){
        $('input:checkbox[name="call"]:input[value ="전화"]').prop("checked", true);
        $('input:checkbox[name="katalk"]:input[value ="카톡"]').prop("checked", true);
    }
    
});

function updateResult(query) {
    $.ajax({
		type: "POST",
		data: {keyword : query},
		url: "/theme/chrisneeds/shop/ajax.disease.php",
		success: function(data, status, xhr) {
			//var ct = xhr.getResponseHeader("content-type") || "";
			//if (ct.indexOf('html') > -1) {
			//	data = $.trim(data);
			//} 
			var string = '';
			$.each(data, function(i, row) {
				if(row.disease_id && row.disease_name){
					string += '<li id="' + row.disease_id + '" style="padding-left: 5px;width: 100%;font-family: Nanum Barun Gothic, sans-serif;font-weight: 500; font-size:17px;">' + row.disease_name + '</li>'
                }
			});
			$('#resultList').html(string.trim());
			
		}
	});
}
var tdArr = new Array();    // 배열 선언

$( document ).ready(function(){
    
    $(".disease_name").each(function(){
    tdArr.push($(this).attr("id"));
    });
});


$(function() {
	$("#resultList").on("click", "li", function(event){
        var disease_name = $(this).text();
        var disease_id = $(this).attr('id');
        var chk = true;
        for(value in tdArr){
            if(tdArr[value] == disease_id){
            chk = false;
            alert("담겨있는 항목입니다");
            }
        }
        if(chk){
			var html = "<div id='" + disease_id + "' style='width:auto;display: inline-block;border: 1px solid #97c3a1;border-radius: 30px;padding-right: 5px;padding-left: 5px;margin-right: 5px;margin-bottom: 5px;color:#97c3a1;'>" + disease_name + "<img src='../img/x_image.png' style='width:12px;height:12px;margin-bottom: 3px;margin-left:3px;' onclick='remove(this);'></div>";
            $(".console3").append(html).css('color','black');
            tdArr.push(disease_id);}
    });
});
console.log(tdArr);

$("body").click(function(e) { 
    if($("#resultList").css("display") == "block") {
           if(!$('#resutlList, #search').has(e.target).length) { 
                $("#resultList").hide();
            }
    }
});

$("#disease").click(function(){
  $("#resultList").show();
});

var disArr = new Array();

function Enter_Check(){
        // 엔터키의 코드는 13입니다.
    if(event.keyCode == 13){
        var disease_txt = $('#disease_txt').val();
        var chk = true;
        for(value in disArr){
            if(disArr[value] == disease_txt){
            chk = false;
            alert("담겨있는 항목입니다");
            $("#disease_txt").val('');
            }
        }
        if($('#disease_txt').val() == ''){
            chk = false;
        }else if(chk){
			var html = "<div style='width:auto;display: inline-block;border: 1px solid #97c3a1;border-radius: 30px;padding-right: 5px;padding-left: 5px;margin-right: 5px;margin-bottom: 5px;color:#97c3a1;'>" + disease_txt + "<img src='../img/x_image.png' style='width:12px;height:12px;margin-bottom: 3px;margin-left:3px;' onclick='remove(this);'></div>";
            $(".console3").append(html);
            disArr.push(disease_txt);
            $("#disease_txt").val('');}
        };    
    };

$('#register').on('click',function(){
    if($('#reg_pw').val() == ""){
		alert("비밀번호를 입력하세요.");
		$('#reg_pw').focus();
		return false;
	}
    if($(':input:checkbox[name=day1]:checked').val()){   
        if(!$('#time_in1').val()) {   
        alert("시간을 선택해 주세요.");
        return false;
        }
        if(!$('#time_in2').val()) {   
            alert("시간을 선택해 주세요.");
            return false;
        }
    }
    if($(':input:checkbox[name=day2]:checked').val()){   
        if(!$('#time_in3').val()) {   
        alert("시간을 선택해 주세요.");
        return false;
        }
        if(!$('#time_in4').val()) {   
            alert("시간을 선택해 주세요.");
            return false;
        }
    }
    var pwd1 = $("#reg_pw").val();
    var pwd2 = $("#reg_pw2").val();
 
    if (pwd1 != pwd2) {
            alert('비밀번호가 다릅니다.')
            $('#reg_pw2').focus();
            return false;
    }
   
    var chkArray1 = new Array(); // 배열 선언
    var chkArray2 = new Array();
    var chkArray3 = new Array();
    var chkArray4 = new Array();
    $('input:checkbox[name=day1]:checked').each(function() { // 체크된 체크박스의 value 값을 가지고 온다.
        chkArray1.push(this.value);
    });
    $('input:checkbox[name=day2]:checked').each(function() { // 체크된 체크박스의 value 값을 가지고 온다.
        chkArray2.push(this.value);
    });
    $('input:checkbox[name=day3]:checked').each(function() { // 체크된 체크박스의 value 값을 가지고 온다.
        chkArray3.push(this.value);
    });
    $('input:checkbox[name=katalk]:checked').each(function() { // 체크된 체크박스의 value 값을 가지고 온다.
        chkArray4.push(this.value);
    });
    $('input:checkbox[name=call]:checked').each(function() { // 체크된 체크박스의 value 값을 가지고 온다.
        chkArray4.push(this.value);
    });
    var tim1 = $('#time_in1').val() 
    var tim2 = $('#time_in2').val();
    var tim3 = $('#time_in3').val() 
    var tim4 = $('#time_in4').val();
    var daytime = chkArray1 +"-"+ tim1 + "~" + tim2 + "/" + chkArray2 + "-" + tim3 + "~" + tim4 + chkArray3
    $('#hiddenValue').val(daytime);
    
    if($('#doctor_tel').val()== ""){
        $('#doctor_tel').val("<?php echo"$doctor_tel" ?>");
    };
    if($('#inst_name').val()== ""){
        $('#inst_name').val("<?php echo"$inst_name" ?>");
    };
    if($('#inst_num').val()== ""){
        $('#inst_num').val("<?php echo"$inst_num" ?>");
    };
    if($('#inst_addr').val()== ""){
        $('#inst_addr').val("<?php echo"$inst_addr" ?>");
    };
    if($('#bank').val()== "selected"){
        $('#bank').val("<?php echo"$bank" ?>");
    };
    if($('#bank_num').val()== ""){
        $('#bank_num').val("<?php echo"$bank_num" ?>");
    };

    if($('#hiddenValue').val()== "-~/-~"){
        $('#hiddenValue').val("<?php echo"$day_time" ?>");
    };
    if($('#channel_addr').val()== ""){
        $('#channel_addr').val("<?php echo"$channel_addr" ?>");
    };
    if($('#self_introduce').val()== ""){
        $('#self_introduce').val("<?php echo"$self_introduce" ?>");
    };
    if($('#doc_desc1').val()== "selected"){
        $('#doc_desc1').val("<?php echo"$doc_desc1" ?>");
    };
    if($('#doc_desc2').val()== ""){
        $('#doc_desc2').val("<?php echo"$doc_desc2" ?>");
    };
    

	var fd = new FormData();
    fd.append("reg_id", $('#reg_id').val());
    fd.append("doc_name", $('#doc_name').val());
	fd.append("reg_pw", $('#reg_pw').val());
    fd.append("doctor_tel", $('#doctor_tel').val());
    fd.append("inst_name", $('#inst_name').val());
    fd.append("inst_num", $('#inst_num').val());
    fd.append("inst_addr", $('#inst_addr').val());
    fd.append("bank", $('#bank').val());
    fd.append("bank_num", $('#bank_num').val());
    fd.append("hiddenValue",$('#hiddenValue').val());
    fd.append("doc_class", $(":input:radio[name=doc_class]:checked").val());
    fd.append("doc_desc", $('#doc_desc1').val() || $('#doc_desc2').val());
    fd.append("channel_addr", $('#channel_addr').val());
    fd.append("self_introduce", $('#self_introduce').val());
    fd.append('tdArr', tdArr);
    fd.append('disArr', disArr);
    fd.append('chkArray4', chkArray4);

	$.ajax({
		type: "POST",
		url: "./ajax.change_info.php",
		data: fd,
		processData: false,
		contentType: false,
		success: function (data) {
			if($.trim(data) == "transmission"){
				alert("회원 정보 수정 완료!!");
				window.location.href = './doc_patient_his.php?doctor_id=' + $("#reg_id").val();
			}else{
				alert(data);
			}
		}
	});

});



$('.pw').focusout(function () {
        var pwd1 = $("#reg_pw").val();
        var pwd2 = $("#reg_pw2").val();
 
        if ( pwd1 != '' && pwd2 == '' ) {
            null;
        } else if (pwd1 != "" || pwd2 != "") {
            if (pwd1 == pwd2) {
                $(".console0").html("<img style='width: 25px;position: relative;left: 89%;transform: translateY(-58px);'src='<?php echo G5_IMG_URL;?>/right_picto.png'>");
            } else {
                $(".console0").html("<img style='width: 25px;position: relative;left: 89%;transform: translateY(-58px);'src='<?php echo G5_IMG_URL;?>/error_picto.png'>");
            }
        }
    }); 



$("#disease_txt").on("keyup", function() {
var disease_txt= $('#disease_txt').val();

$.ajax({
    type: 'POST',
    url: './ajax.doctor_register.php',
    data: { disease_txt: disease_txt},
    success: function(data) {
        if($.trim(data) == "존재하는 증상"){
            alert(data);
            $("#disease_txt").val('');
			}
        }
    });
});

$(document).ready(function(){

//한글입력 안되게 처리

$("[name=pw],[name=pw2]").keyup(function(event){ 

 if (!(event.keyCode >=37 && event.keyCode<=40)) {

  var inputVal = $(this).val();

  $(this).val(inputVal.replace(/[^a-z0-9]/gi,''));
        }
    });
});
$(document).ready(function(){

//숫자만 입력되게 처리
$("input[name=bank_num]").keyup(function(event){ 

if (!(event.keyCode >=37 && event.keyCode<=40)) {

 var inputVal = $(this).val();

 $(this).val(inputVal.replace(/[^0-9]/gi,''));
       }
   });
});

$("#reg_pw").on("keyup", function(){
    var reg = /^(?=.*?[a-z])(?=.*?[0-9]).{4,}$/;
    var pw = $("#reg_pw").val();

    if(false === reg.test(pw)){
            $(".console").html("<img style='width: 25px;position: relative;left: 89%;transform: translateY(-145px);'src='<?php echo G5_IMG_URL;?>/error_picto.png'>");
            return false;
        }else {
            $(".console").html("<img style='width: 25px;position: relative;left: 89%;transform: translateY(-145px);'src='<?php echo G5_IMG_URL;?>/right_picto.png'>"); 
            return true;
        }
});


/* function setThumbnail(event) {
     var reader = new FileReader(); 
     reader.onload = function(event) { 
         var img = document.createElement("img"); img.setAttribute("src", event.target.result); 
         document.querySelector("div#image_container").appendChild(img); };
         reader.readAsDataURL(event.target.files[0]); 
    } */ /* 이미지 미리보기 */

function inputPhoneNumber(obj) {
    var number = obj.value.replace(/[^0-9]/g, "");
    var phone = "";

    if(number.length < 4) {
        return number;
    } else if(number.length < 7) {
        phone += number.substr(0, 3);
        phone += "-";
        phone += number.substr(3);
    } else if(number.length < 10) {
        phone += number.substr(0, 2);
        phone += "-";
        phone += number.substr(2, 3);
        phone += "-";
        phone += number.substr(5);
    }else if(number.length < 11) {
        phone += number.substr(0, 3);
        phone += "-";
        phone += number.substr(3, 3);
        phone += "-";
        phone += number.substr(6);
    } else if(number.length < 12){
        phone += number.substr(0, 3);
        phone += "-";
        phone += number.substr(3, 4);
        phone += "-";
        phone += number.substr(7);
    } else{
        phone += number.substr(0, 4);
        phone += "-";
        phone += number.substr(4, 4);
        phone += "-";
        phone += number.substr(8);
    }
    obj.value = phone;
}      

$(function(){
    $('.doc_class1').click(function(){
            $('#doc_desc1').show();
            $('#doc_desc2').hide();
            $('#doc_desc2').val('');
    })
});
$(function(){
    $('.doc_class2').click(function(){
            $('#doc_desc2').show();
            $('#doc_desc1').hide();
            $('#doc_desc1').val('');
    })
});
function remove(object){
	$(object).closest('div').remove();

    var search1 = tdArr.indexOf($(object).closest('div').attr('id'));
    tdArr.splice(search1,1); // "A"를 찾아서 삭제한다.

    var search2 = disArr.indexOf($(object).closest('div').text());
    disArr.splice(search2,1); // "A"를 찾아서 삭제한다.
    console.log(disArr);
	};

</script>




