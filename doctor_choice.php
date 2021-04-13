<?php

include_once('./_common.php');

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');


define("_INDEX_", TRUE);

$disease_id = $_GET['disease_id'];
$disease_name = $_GET['disease_name'];

$q = "SELECT * FROM doctor_disease WHERE disease_id='$disease_id' ORDER BY RAND()"; //and doctor_id = 'peacehuh' ";
$result = sql_query($q);

$li_list_html = '';

if($result->num_rows > 0){
	while ($row=sql_fetch_array($result)) {
		$doctor_id = $row['doctor_id'];
		$price = $row['price'];

		$q1 = "SELECT * FROM doctor_member WHERE user_id='$doctor_id' ";
		$result1 = sql_query($q1);
		if($result1->num_rows > 0){
			$row1 = $result1->fetch_assoc();
			$doctor_tel = $row1['doctor_tel']; //의사 정보를 가져온다..일단 전화번호만..
			$doctor_name = $row1['doc_name'];
			$doctor_img = $row1['img_path'];
            $doctor_desc = $row1['doc_desc'];
            $day_time = $row1['day_time'];
            $self_introduce = $row1['self_introduce'];
            $doc_class = $row1['doc_class'];
            $inst_name = $row1['inst_name'];
            $day_time =explode('/', $row1['day_time']);
            $inst_num = $row1['inst_num'];
            $q2 = "SELECT a.*,b.* FROM g5_shop_cart a join g5_shop_order b WHERE a.doctor_id = '$doctor_id' and a.od_id = b.od_id and not review_star = '' and not review_txt = ''";
            $result2 = sql_query($q2);
            $count = sql_num_rows($result2);
            $li_review='';
            if($result2->num_rows > 0){
            for($i=0; $i<2; $i++){
                $row2=sql_fetch_array($result2);
                $review_txt = $row2['review_txt'];
                $review_star= $row2['review_star'];
                $mb_id = $row2['mb_id'];
                $od_time = explode(' ', $row2['od_time']);
                $strim = substr($mb_id, -8, 4)."****";
                if($review_star == '1'){
                    $star = '<span class="star_ratings"><span style="width:13px;"></span></span>';
                }else if($review_star == '2'){
                    $star = '<span class="star_ratings"><span style="width:27px;"></span></span>';
                }else if($review_star == '3'){
                    $star = '<span class="star_ratings"><span style="width:42px;"></span></span>';
                }else if($review_star == '4'){
                    $star = '<span class="star_ratings"><span style="width:57px;"></span></span>';
                }else if($review_star == '5'){
                    $star = '<span class="star_ratings"><span style="width:71px;"></span></span>';
                }
                $li_review = '<div style="padding-bottom:5px; display:inline-block; width:100%;"><div class="review_txts">'.$review_txt.'</div><div class="review_stars">'.$star.''.$review_star.'</div><div style="text-align:end;font-size:10px;float:right;">'.$strim.ㆍ.$od_time[0].'</div></div>'.$li_review;
            };}
            $q3 = "SELECT AVG(b.review_star) FROM g5_shop_cart a join g5_shop_order b WHERE a.doctor_id = '$doctor_id' and a.od_id = b.od_id and not review_star = '' and not review_txt = ''";
            $result3 = sql_query($q3);
            $counts = $result3->fetch_row();
            if($counts[0]<='0'){
                $width = '67';
            }else if($counts[0]<='1'){
                $width = '17';
            }else if($counts[0]<='2'){
                $width = '30';
            }else if($counts[0]<='3'){
                $width = '42';
            }else if($counts[0]<='4'){
                $width = '54';
            }else if($counts[0]<='5'){
                $width = '67';
            };
            
            
            

            if($doc_class == "양의학"){
                $doc_tag = G5_IMG_URL.'/doc_tag1.png';
            }else{
                $doc_tag = G5_IMG_URL.'/doc_tag2.png';
            };
            
            $URL =  G5_THEME_SHOP_URL;
            if ($member['mb_id'] =="" ){
                $href = '';
            }else{
                $href = 'href = "'.$URL.'/selftest.php?product_type='.$disease_id.'&doctor_id='.$doctor_id.'&price='.$price.'"';
            }
        
            // 21.02.05 현규 id_doctor_img div ->a 태그로 변경
			$li_list_html = $li_list_html.'<section><a id="doctor_img"><img class="doct" src="'.$doctor_img.'"></a><div class="tag_p"><img class="doc_tag" src="'.$doc_tag.'"></div><div id="'.$doctor_id.'n" class="review_star"><span class="star_rating"><span style="width:'.$width.'px;"></span></span>('.$count.')</div>';
			$li_list_html = $li_list_html.'<div class="doctor_ex"><div class="doc_name">'.$doctor_name.'<span class="inst_name">'.$inst_name.'</span></div><div class="doc_ex"><div>ㆍ '.$doctor_desc.'</div><div style="font-weight:500;">ㆍ 진료비 : '.$price.'₩</div><div id="'.$doctor_id.'" class="detail_open">의사정보 더 보기</div></div>
			<a id="'.$doctor_id.'" name="'.$it['it_name'].'" '.$href.'><div class="button">지금 진료받기</div></a></div><div id="'.$doctor_id.'2" class="doctor_ex_detail"><div class="self_introduce">'.$self_introduce.'</div><div class="doctor_tel"><span style="color:#224f5b;margin-right:20px;">전화번호</span>'.$inst_num.'</div><div class="day_time"><span style="color:#224f5b;margin-right:20px;">진료시간</span>'.$day_time[0].'<br><a style="margin-left:65px;">'.$day_time[1].'</a><br><a style="margin-left:65px;">'.$day_time[2].'</a><br><a style="margin-left:65px;">'.$day_time[3].'</a></div></div>
            <div id="'.$doctor_id.'n2" class="more_review"><p style="font-weight:600;color:#224e5c">실시간 진료 후기</p>'.$li_review.'</div></section>';


		}
	}
}

?>

        
 
        

<style>
#doctor_seln *{
    max-width: none;
    }

#doctor_sel {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	position: relative;
	/* height: 850px; */
    background-color: #f4f4f48c;
    font-family: 'Nanum Barun Gothic', sans-serif;
     }
.type_container{
    width:100%;
    margin: 300px auto;
}


.med_types {
    display: grid;
    grid-template-columns: 460px 460px 460px;
   /*  grid-template-rows: 180px 180px 180px; */
    grid-gap: 20px;
    padding: 10px;
    position: relative;
    left: 50%; 
    transform: translateX(-50%);
    width:1400px;
    
    }
.med_types section{
    list-style:none;
    background-color: #fff;
    padding:20px 20px 25px 20px;
    border-radius:10px;
    border: 1px solid #e8e8e8;
   /*  box-shadow: 10px 10px 10px rgba(173, 173, 173, 0.1); */
    }
#doctor_img{
    width:120px;
    /* line-height:120px; */
    float:left;
    transform: translate(3px,25px);    
    }
.doct{
    vertical-align:middle;
    width:110px;
    height:110px;
    border-radius: 60px;
    }
.star{
    width:20px;
    }
.doctor_ex{
    /* float:left; */
    margin-left:144px;
    margin-top: 10px;
    font-weight:400;
    width:282px;
    font-size:13px;
    position: relative;
    left: -10px;
    top: 10px;
    white-space: nowrap; /* 20.12.24 현규수정 */
    }
.doc_ex{
    background:#ececec61;
    border-radius: 3px;
    padding: 15px 10px;
    line-height: 20px;
    height:70px;
}
.doc_name{
    font-size:21px;
    font-weight:600;
    font-weight:600;
    position: relative;
    color:#224e5c;
    /* margin-left: 20px;  */
    }
.detail_open{
   /*  display:none; */
    width:120px;
    height:33px;
    color: #224e5c;
    border-radius:20px;
    text-align:center;
    line-height: 33px;
    position: relative;
    right: -22px;
    top: 26px;
    border: 1px solid #7ba8a8;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    }
.button{
    height:33px;
    color: #224e5c;
    border-radius:20px;
    text-align:center;
    line-height: 33px;
    position: relative;
    /* left: 143px; */
    top: 0px;
    border: 1px solid #7ba8a8;
    font-size: 14px;
    font-weight: 700;
    } /* 20.12.24 현규추가 */
.introduce{
    position:relative;
    font-size:1px;
    top:-32px;
    text-align:center;
    color: #333;
    font-weight: 400;
    letter-spacing: -0.2px;
    word-spacing: -1.2px;
    height:5px;
}
.doc_tag{
    position:relative;
    bottom:31px;
    float: right;
    width:70px;
    right:-10px;
}
#search_in{
    top:150px;
    position:absolute;
    z-index: 99999;
    left: 50%; 
    transform: translateX(-50%);
    }
#disease{
    width:  1000px;
    height:50px;
    border: 2px solid #e6e7e7;
    border-radius: 40px; 
    padding:0 50px;
    box-shadow: 0px 0px 7px 1px #e6e7e7;
    }
.search_icon{
    position:absolute;
    left: 10px;
    width: 30px;
    top: 10px;

}
.search_key{
    position:absolute;
    left: 915px;
    top: 15px;
    width: 30px;
}
.search_tri{
    position:absolute;
    left: 950px;
    top: 17px;
    width: 30px;
}
.review{
    width: 100%;
    /* background-color: #224e5c; */
    height: 110px;
    position: relative;
    top: 225px;
    z-index: 9;
   /*  background: linear-gradient(to right top, #367573, #2D4D5B); */
}
.rev_back{
    width: 100%;
    height: 110px;
    position:absolute;
    z-index:0;
}
.rev_txt{
    position:absolute;
    left: 20%;
    top: 14%;
    font-size:20px;
    color:#fff;
    font-weight:500;
}
.txt_wr{
    position: absolute;
    z-index: 9;
    left: 23%;
    top: 28%;
    width:100%;
}
.rv_score{
    position: absolute;
    z-index: 9;
    left: 6%;
}
.rv_txt{
    position: absolute;
    z-index: 9;
    top: 27px;
    left: 6%;
    font-size: 20px;
    color: #fff;
    font-weight: 300;
}
.rv_wrinfo{
    z-index: 9;
    left: 17%;
    width: 100%;
    font-size: 15px;
    color: #fff;
    font-weight: 300;
}
.rv_wrname{
    position: absolute;
    z-index: 9;
    left: 39%;
    top: 54px;
}
.rv_time{
    position: absolute;
    z-index: 9;
    left: 31.7%;
    top: 54px;
}
.rv_go{
    position: absolute;
    z-index: 9;
    left: 68%;
    top: 7px;
    height: 55px;

}
.doctor_ex_detail{
    display:none;
    width:100%;
    position: relative;
    top: 29px;
    /* box-shadow: -1px 20px 0px 20px #f8f8f8; */
    /* background: #f8f8f8; */
    border-top: 1px solid #dadada;
    padding: 5px 10px 20px 10px;
    pointer-events: none; 
}
.self_introduce{
    color: #224f5b;
    font-size: 15px;
    font-weight:600;
    margin:10px 0;
}
.doctor_tel{
    font-size:13px;
    font-weight:400;
}
.day_time{
    font-size:13px;
    font-weight:400;
}
.main_txt{
    top:220px;position:absolute;z-index: 9999;font-size:25px;font-weight:700;width:100%;text-align: center;color:#204f5c; font-family: "Nanum Barun Gothic", sans-serif;
}
.doctor_ex a{
    width:120px;
    display: inline-block;
    margin-left: 164px;
    margin-top:11px;
}

#resultList{
    background: linear-gradient(to top, #a6ced4 -90%, #f9f9f9 35%);
    margin-left: 1px;
    margin-right: 1px;
    overflow-y: auto;
    max-height: 300px;
    overflow-x: hidden;
    z-index: 99999;
    padding: 0px 20px;
    /* border: 2px solid #e4e8e9; */
    border-top: none;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    /* display: none; */
    box-shadow: 0px 10px 0px 0px #e2edee, 0px -10px 0px 0px #f9f9f9;
    margin-top: 10px;
}
.review_star{
    position:fixed;
    color:#333;
    font-size:13px;
    font-weight:400;
    transform: translate(-7px, -11px);
}
.star_rating { width:80px; }
.star_rating,.star_rating span {
    display:inline-block;
    height:16px;
    /* overflow:hidden; */
    background:url(../../../img/card_review0.png)no-repeat;
    background-size:73px;
    }
.star_rating span{ 
    background-position:left bottom; 
    line-height:0; 
    vertical-align:top; }
.star_ratings { width:80px;
    transform: translate(8px, 3px); }
.star_ratings,.star_ratings span {
    display:inline-block;
    height:12px;
    /* overflow:hidden; */
    background:url(../../../img/review_star.png)no-repeat;
    background-size:70px;
    }
.star_ratings span{ 
    background-position:left bottom; 
    line-height:0; 
    vertical-align:top; 
    }
.sub_txt{font-size:24px;color:#333; font-weight:400;}
.inst_name{font-size:12px;margin-left: 7px; color: #646464;}
#search input{
		-webkit-appearance: none;
	}
    .more_review{
        display: none;
        width: 100%;
        position: relative;
        top: 29px;
        border-top: 1px solid #dadada;
        padding: 5px 10px 20px 10px;
        pointer-events: none;
    }
    .review_txts{
        width: 70%;
        float: left;
        color:#333;
        font-weight:400;
        line-height:39px;
    }
    .review_stars{
        width: 23%;
        float: right;
        /* text-align:end; */
        font-weight:800;
    }
@media only screen and (max-width: 479px){
    .med_types {
    display: grid;
    grid-template-columns: 340px;
    grid-gap: 10px;
    padding: 10px;
    position: relative;
    top:194px;
    justify-content: center;
    }
    .med_types section{
        padding:20px 10px;
    }
    #doctor_img {
        width: 90px;
        height:90px;
        transform: translate(4px,11px);

    }
    .doctor_ex {
        /* float: left; */
        margin-left: 120px;
        font-weight: 400;
        font-size:11px;
        width:210px;
        margin-top:0px;
        white-space: nowrap; 
        top:5px;/* 20.12.24 현규수정 */
    }
    .doc_ex{line-height:15px;
        height:60px;
    }
    .med_types li {
        padding: 30px 10px;
    }
    .doctor_ex a{
        margin-left:91px;
        margin-top:14px;
    }
    .button{
        /* left: 66px; */
        /* top: 14px; */
    }
    .search_key{
        position:absolute;
        left: 278px;
        top: 19px;
        width: 23px;
    }
    .search_tri{
        position:absolute;
        left: 306px;
        top: 21px;
        width: 19px;
    }
    .type_container {
    width: 100%;
    margin: 50px auto 250px;
    }
    #search{
        width:90%;
        top:100px!important;
    }
    .txt_wr {
    left: 17%;
    top: 38%;
    }
    .rev_txt{
        left: 8%;
    }
    .rv_score{
        left: 18%;
    }
    .rv_txt{
        top: 22px;
        left: 1%;
    }
    .rv_wrname{
        left: 30%;
    }
    .rv_time{
        left: 11.7%;
    }
    .self{display:none;
    }
    .introduce{
        /* top:-46px;
        font-size:10px; */
        display:none;
    }
    .doc_tag{
        bottom:29px;
        width:55px;
    }
    .doct{
        
        height:90px;
    }
    .doc_name{
        /* margin-left:10px; */
    }
    .main_txt{font-size:17px; top:180px;}
    .sub_txt{font-size:16px;}
    input::placeholder {
        font-size:12px;   
    }
    #disease{border:1px solid #e6e7e7 }
    .detail_open{
    /*  display:none; */
    /*  width:140px; */
        /* height:35px; */
        color: #224e5c;
        border-radius:20px;
        text-align:center;
        /* line-height: 35px; */
        position: relative;
        right: 49px;
        top: 29px;
        border: 1px solid #7ba8a8;
        /* font-size: 16px; */
        font-weight: 700;
    }
    .search_icon{
        width:20px;
        left: 12px;
        top: 16px;
    }
    .review_stars{
        width:31%;
    }
    .review_txts{
        width:65%;
    }
    
}

</style>

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
                if(row.disease_id < 99999999){
				if(row.disease_id && row.disease_name){
					string += '<li id="' + row.disease_id + '" style="color:#333;padding-left: 5px;width: 100%;font-family: Nanum Barun Gothic, sans-serif;font-weight: 500; font-size:17px;margin: 7px 0;"><img style="width:22px; float:left; margin-right: 10px; " src="<?php echo G5_IMG_URL;?>/result_left.png">' + row.disease_name + '<img style="width:22px;float:right;" src="<?php echo G5_IMG_URL;?>/result_right.png"></li>'
				}};
			});
			$('#resultList').html(string.trim());
			
		}
	});
}

$(function() {
	$("#resultList").on("click", "li", function(event){
		var disease_id = $(this).attr('id');
		var disease_name = $(this).text();
		console.log(disease_id);

		//amplitude
		amplitude.getInstance().logEvent('SearchDisease', { diseaseId : disease_id, diseaseName : disease_name });

		window.location.href = "https://chrisneeds.kr/theme/chrisneeds/shop/doctor_choice.php?disease_id=" + disease_id + "&disease_name=" + disease_name;
	});

	$(".doctor_ex").on("click", "a", function(event){
		var doctorId = $(this).attr('id');
		var diseaseName = $(this).attr('name');

		//alert(doctorId);

		//amplitude
		amplitude.getInstance().logEvent('SelectDoctor', { doctorId : doctorId, diseaseName : diseaseName});
	});

});



$(function() {
	$(".detail_open").on("click", function(event){
    var detail = "#" + $(this).attr('id')
    if($(detail+"2").css('display') == "none") {
        $(detail+"2").show();
        $(detail).text('의사정보 닫기');
        $(detail +"n2").hide();
    }else{
        $(detail+"2").hide();
        $(detail).text('의사정보 더 보기');
    }
    
});

$(".review_star").on("click", function(event){
    var more_review = "#" + $(this).attr('id');
    var detail = more_review.slice(0, -1);
    console.log(detail);
    if($(more_review + "2").css('display') == "none") {
        $(more_review + "2").show();
        $(detail+"2").hide();
    }else{
        $(more_review + "2").hide();
    }
    })
    });

$("body").click(function(e) { 
    if($("#resultList").css("display") == "block") {
           if(!$('#resutlList, #search').has(e.target).length) { 
                $("#resultList").hide();
            }
    }else if($('#resutlList, #search').has(e.target).length){
        $("#resultList").show();}
});

$(function() {
	$(".med_types").on("click", "a", function(event){ //21.01.28 현규 진료받기 버튼클릭
    
    if(is_member){

    }else{ //21.01.28 현규 멤버아닐경우 로그인창 띄우기
        alert("로그인이 필요합니다.")
        $("#showRight").click();
    }
    })
    
});



</script>
<div id='search' style='top:150px;position:absolute;left: 50%;transform: translateX(-50%);z-index: 99999;'>
			<input id='disease' type='text' oninput="updateResult(this.value);" placeholder='1000가지 증상을 검색 후, 진료받으세요.'></input>
            <img class='search_icon' src='https://chrisneeds.kr/img/search_icon.png'>
            <img class='search_key' src='https://chrisneeds.kr/img/search_key.png'>
            <img class='search_tri' src='https://chrisneeds.kr/img/search_tri.png'>
			<ul  id="resultList">
			</ul>
</div>

<div class='main_txt'>'<?php echo $disease_name; ?>'<span class='sub_txt'> 을(를) 진료할 수 있는 <br>의료진 검색결과입니다.</span></div>
<!-- <div>
    <div class="review">
        <img class="rev_back" src='https://chrisneeds.kr/img/review_back.png'>
        <div class="rev_txt">
        실시간 리뷰
        </div>

    </div>
</div>
<?php
        
        $sql = " select a.wr_name, a.wr_subject, a.wr_content, a.mb_id, a.wr_id, a.is_score, a.wr_datetime, a.wr_birth, a.wr_gender, b.it_name, b.it_id
                    from `g5_write_reviews` a join `{$g5['g5_shop_item_table']}` b on (a.it_id=b.it_id)
                    order by a.wr_datetime desc, a.is_score desc
                    limit 0,8 ";
        $result = sql_query($sql); 
		
		$row=sql_fetch_array($result); {
            $review_href = G5_SHOP_URL.'/item.php?it_id='.$row['it_id'];
			$star = get_star($row['is_score']);
        ?>
            <div class="txt_wr">
			<p class="rv_score"><img src="<?php echo G5_URL; ?>/shop/img/s_star<?php echo $star; ?>.png" alt="별<?php echo $star; ?>개" width="80"></p>
			<p class="rv_txt"><?php echo get_text(cut_str(strip_tags($row['wr_content']), 50), 1); ?></p>
			<p class="rv_wrinfo">
				<?php
				if(!$row['mb_id']){
				?>
				<span class="rv_wrname"><?php echo get_text($row['wr_name']); ?>  / <?
					echo $row['wr_birth']; ?> / <?php echo $row['wr_gender']; ?></span>
				<span class="rv_time"><?php echo substr($row['wr_datetime'], 2, 8); ?></span>
				<?php } else{ ?>
				<?php 
				$is_id = $row['mb_id'];
				$msql =  " select * from g5_member where mb_id = '$is_id' ";
				$mrv = sql_query($msql);	
				
				for($z=0; $mrow=sql_fetch_array($mrv); $z++){
				
				?>

				<span class="rv_wrname"><?php echo $row['wr_name']; ?> / <?
				$birth = $mrow['mb_birth'];
				sscanf($birth,'%2d',$birth);
				$birth+= $birth<39 ? 2000 : 1900;
				$age = date('Y')+1-$birth;

				if( $age <= 19){
					echo '10대';
				}else if($age <= 29){
					echo '20대';
				}else if($age <= 39){
					echo '30대';
				}else if($age <= 49){
					echo '40대';
				}else if($age <= 59){
					echo '50대';
				}else if($age <= 69){
					echo '60대';
				}else if($age <= 79){
					echo '70대';
				}else if($age <= 89){
					echo '80대';
				}else if($age <= 99){
					echo '90대';
				}
				?> / <?php 
				$gender = $mrow['mb_gender'];

				switch($gender){
					case 1:
						echo '남';
						break;
					case 2:
						echo '여';
						break;
					case 3:
						echo '남';
						break;
					case 4:
						echo '여';
						break;	
				}
				}
				?></span><span class="rv_time"><?php echo date("y-m-d", strtotime($row['wr_datetime'])) ?> </span> 
				<?php } ?>  
			</p>        
			<a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=reviews&sop=and&sst=wr_datetime&sod=desc" ><img class="rv_go" src='https://chrisneeds.kr/img/pointer.png'></a>
          </div>
        
	
	    <?php }
    ?> -->


<div id="doctor_sel">
    <div class='type_container'>
        <div class='med_types'>
            <?php
				if($li_list_html == '') {
					echo '검색결과가 없습니다.';
				} else {
					echo $li_list_html;
				}
			?>
        </div>
    </div>
</div>

<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>