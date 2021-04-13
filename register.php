<?php 

include_once('../common.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>의사 회원가입</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div class="contain">
    <h2>회원가입</h2>
    <div class="img_box">
        <span style="margin: 30px 0;">의사 사진</span>
        <label for="doc_img">Choose file</label><div id="image_container"></div><input style="display:none;"type="file" name="doc_img" id="doc_img" accept="image/*" onchange="setThumbnail(event);"/>
    </div>
    <div class="id_box">
        <span>아이디</span>
        <input name="id" class="check" id="reg_id" type="text" placeholder="아이디를 입력하세요.">
        <div class="console2"></div>
    </div>    
    <div class="pw_box">
        <span>비밀번호</span>
        <input name="pw" class="pw" id="reg_pw" type="password" placeholder="4자이상 영문 소문자,숫자를 사용하세요">
        <span>비밀번호 확인</span>
        <input name="pw2" class="pw" id="reg_pw2"type="password" placeholder="비밀번호를 확인하세요.">        
        <div class="console"></div>
        <div class="console0"></div>
    </div>
    <div class="name_box">
        <span>이름</span>
        <input name="name" id="doc_name" type="text" placeholder="이름을 입력하세요.">         
    </div>
    <div class="phone_box">
        <span>휴대폰 번호</span>
        <input name="phone" id="doctor_tel"type="text" maxlength="14" onKeyup="inputPhoneNumber(this);" placeholder="진료 접수시 문자받을 번호를 입력하세요.">     
    </div>
    <div class="instname_box">
        <span>병원 이름</span>
        <input name="inst_name" id="inst_name"type="text" placeholder="병원이름를 입력하세요.">
    </div>
    <div class="instnum_box">
        <span>병원 연락처</span>
        <input name="inst_num" id="inst_num" type="text" maxlength="14" onKeyup="inputPhoneNumber(this);" placeholder="병원 연락처를 입력하세요.">        
    </div>
    <div class="instaddr_box">
        <span>병원 주소</span>
        <input name="inst_addr" id="inst_addr" type="text" placeholder="병원 주소를 입력하세요.">
    </div>
    <div class="bank_box">
        <span>정산 받으실 계좌</span>
        <select name="bank" id="bank">
        <option value="selected">은행선택</option>
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
        <input name="bank_num" id="bank_num" type="text" placeholder="계좌번호를 입력하세요.">
    </div>
    <div class="docclass_box">
        <span style="margin:31px 0">전공분야</span>
        <div style="width:70px;display: inline-block;margin:15px 0;transform: translateX(23px);"><input name="doc_class" id="doc_class1" class="doc_class1" type="radio" value="양의학"><label for="doc_class1"></label>양의학</div>
        <select name="doc_desc" id="doc_desc1">
            <option value="">전공선택</option>
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
        <input name="doc_desc" id="doc_desc2" type="text" placeholder="전공 분야를 입력하세요.">        
    </div>
    <div class="introduce_box">
        <span>의사 소개</span>
        <input name="self_introduce" class="self_introduce" id="self_introduce"type="text" placeholder="ex)중풍 전문 치료의입니다."maxlength="22" >
    </div>
    <div class="search_box">
        <span style="transform: translateY(-100px);">진료 가능한 증상</span> 
        <div id='search'>
            <span></span>
            <input id='disease' type='text' oninput="updateResult(this.value);" placeholder='증상을 검색해보세요'></input>
            <ul id="resultList"></ul>
        <span></span><input name="disease_txt" id="disease_txt" type="text" value="" placeholder='증상 검색이 없을시 입력해주세요.' onkeydown="JavaScript:Enter_Check();"/>
        </div>
        <br><span style="transform: translateY(-100px);"></span>
        <div class="console3"></div>
    </div>
    <div class="daytime_box">
        <span>진료가능 요일 및 시간</span>
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
        <span>진료 방법</span>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="katalk" class="katalk" name="katalk" type="checkbox" value="카톡"><label for="katalk"></label>카카오톡</div>
        <div style="width:10%;display: inline-block;margin:15px 0;transform: translateX(23px);"><input id="call" class="call" name="call" type="checkbox" value="전화"><label for="call"></label>전화</div>   
    </div>
    <div class="kakaoaddr_box">
        <span>카카오 채팅창 주소</span>
        <input name="kakao" id="channel_addr" type="text" placeholder="카카오톡 채팅창 주소를 입력하세요.">
    </div>
    <div id="exform_txt"><span>모든 항목은 필수적으로 입력해주셔야 가입이 가능합니다.</span></div>
    <div id="btn_wrap">
        <button id='register'>회원가입</button>
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
			$('#resultList').html('');
			var string = '';
			$.each(data, function(i, row) {
				console.log(row.disease_id);       
				console.log(row.disease_name);
				if(row.disease_id && row.disease_name){
					string += '<li id="' + row.disease_id + '" style="color:#333;padding-left: 5px;width: 100%;font-family: Nanum Barun Gothic, sans-serif;font-weight: 500; font-size:17px;margin: 2px 0;">' + row.disease_name + '</li>'
				}
			});
			$('#resultList').html(string.trim());
			
		}
	});
}
var tdArr = new Array();    // 배열 선언
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
            $(".console3").append(html);
            tdArr.push(disease_id);}
    });
});

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

var disArr = new Array();
function Enter_Check(){
        // 엔터키의 코드는 13입니다.
    if(event.keyCode == 13){
        var disease_txt= $('#disease_txt').val();
        
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
	if($('#reg_id').val() == ""){
		alert("아이디를 입력하세요.");
		$('#reg_id').focus();
		return false;
	}
	if($('#reg_pw').val() == ""){
		alert("비밀번호를 입력하세요.");
		$('#reg_pw').focus();
		return false;
	}
    if($('#doc_name').val() == ""){
		alert("이름을 입력하세요.");
		$('#doc_name').focus();
		return false;
	}
    if($('#doc_tel').val() == ""){
		alert("전화번호를 입력하세요.");
		$('#doc_tel').focus();
		return false;
	}
    if($('#inst_name').val() == ""){
		alert("병원이름를 입력하세요.");
		$('#inst_name').focus();
		return false;
	}
    if($('#inst_num').val() == ""){
		alert("병원 연락처를 입력하세요.");
		$('#inst_num').focus();
		return false;
	}
    if($('#inst_addr').val() == ""){
		alert("병원주소를 입력하세요.");
		$('#inst_addr').focus();
		return false;
	}
    if($('#bank').val() == "selected"){
		alert("은행을 선택하세요.");
		$('#bank').focus();
		return false;
	}
    if($('#bank_num').val() == ""){
		alert("계좌번호를 입력하세요.");
		$('#bank_num').focus();
		return false;
	}
    if(!$(':input:radio[name=doc_class]:checked').val()) {   
        alert("전공을 선택해 주세요.");
        return false;
    }
    if($('#doc_desc1').val() == "" && $('#doc_desc2').val() == ""){
		alert("전공을 선택하거나 입력하세요.");
		return false;
	}
    if($('#self_introduce').val() == ""){
		alert("의사 소개를 입력하세요.");
		$('#self_introduce').focus();
		return false;
	}
    if(!$(':input:checkbox[name=day1]:checked').val()) {   
        alert("요일을 선택해 주세요.");
        return false;
    }
    if(!$('#time_in1').val()) {   
        alert("시간을 선택해 주세요.");
        return false;
    }
    if(!$('#time_in2').val()) {   
        alert("시간을 선택해 주세요.");
        return false;
    }
    if(!$(':input:checkbox[name=day2]:checked').val() == ""){   
        if(!$('#time_in3').val()) {   
        alert("시간을 선택해 주세요.");
        return false;
        }
        if(!$('#time_in4').val()) {   
            alert("시간을 선택해 주세요.");
            return false;
        }
    }
    if(!$(':input:checkbox[name=katalk]:checked').val() && !$(':input:checkbox[name=call]:checked').val()) {   
        alert("진료방법을 선택해 주세요.");
        return false;
    }
    if(!$(':input:checkbox[name=katalk]:checked').val() == null){
        if($('#channel_addr').val() == ""){
            alert("카카오톡 주소를 입력하세요.");
            $('#channel_addr').focus();
            return false;
	}};
    
    
    
    
   
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
    


	var fd = new FormData();
	fd.append("reg_id", $('#reg_id').val());
	fd.append("reg_pw", $('#reg_pw').val());
    fd.append("doc_name", $('#doc_name').val());
    fd.append("doctor_tel", $('#doctor_tel').val());
    fd.append("inst_name", $('#inst_name').val());
    fd.append("inst_num", $('#inst_num').val());
    fd.append("inst_addr", $('#inst_addr').val());
    fd.append("bank", $('#bank').val());
    fd.append("bank_num", $('#bank_num').val());
    fd.append("doc_class", $(":input:radio[name=doc_class]:checked").val());
    fd.append("doc_desc", $('#doc_desc1').val() || $('#doc_desc2').val());
    fd.append("hiddenValue",$('#hiddenValue').val());
    fd.append("channel_addr", $('#channel_addr').val());
    fd.append("doc_img", $("#doc_img")[0].files[0]);
    fd.append('tdArr', tdArr);
    fd.append('disArr', disArr);
    fd.append("self_introduce", $('#self_introduce').val());
    fd.append('chkArray4', chkArray4);
    
	$.ajax({
		type: "POST",
		url: "./ajax.doctor_register.php",
		data: fd,
		processData: false,
		contentType: false,
		success: function (data) {
			if($.trim(data) == "transmission"){
				alert("회원 가입 완료!!");
                window.location.href = './index.php'
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

$(".check").on("keyup", function() {
         var reg_id= $('#reg_id').val();

         $.ajax({
             type: 'POST',
             url: './ajax.doctor_register.php',
             data: { reg_id: reg_id},
             success: function(data) {
                if($.trim(data) == "존재하는 아이디입니다."){
                    $(".console2").html("<img style='width: 25px;position: relative;left: 89%;transform: translateY(-58px);'src='<?php echo G5_IMG_URL;?>/error_picto.png'>");
                }else{
                    $(".console2").html("<img style='width: 25px;position: relative;left: 89%;transform: translateY(-58px);'src='<?php echo G5_IMG_URL;?>/right_picto.png'>");
                }

             }
         });
     });



$(document).ready(function(){

//한글입력 안되게 처리

$("input[name=id],[name=pw],[name=pw2]").keyup(function(event){ 

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

 function setThumbnail(event) {
     var reader = new FileReader(); 
     reader.onload = function(event) { 
         var img = document.createElement("img"); img.setAttribute("src", event.target.result); 
         document.querySelector("div#image_container").appendChild(img); };
         reader.readAsDataURL(event.target.files[0]); 
    }  /* 이미지 미리보기 */

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
    })
});
$(function(){
    $('.doc_class2').click(function(){
            $('#doc_desc2').show();
            $('#doc_desc1').hide();
    })
});


function remove(object){
	$(object).closest('div').remove();

    var search1 = tdArr.indexOf($(object).closest('div').attr('id'));
    tdArr.splice(search1,1); // "A"를 찾아서 삭제한다.

    var search2 = disArr.indexOf($(object).closest('div').text());
    disArr.splice(search2,1); // "A"를 찾아서 삭제한다.
    console.log(disArr);
	//html.remove();
	//$(id).remove();
	//$('.tabs').children('li').last().addClass('active');
	//var activeTab = $($('.tabs').children('li').last()).find("a").attr("href");
	//$(activeTab).fadeIn();
}
</script>

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
    margin:0 auto 50px;
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
    width: 1154px;
    height: 88px;
    background:#fff;
    border-radius:16px;
    margin:auto;
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
input:focus {outline:none;}
button:focus{ 	
    border: none;
    outline:none;
    }
#image_container img{
    width: 88px;
    height: 88px;
}
#image_container{
    width: 88px;
    height: 88px;
    position: absolute;
    left: 47%;
    transform: translateY(-93px);
}
</style>