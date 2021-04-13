<?php
include_once('./_common.php');

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>

<style>
.mainn{
    width:100%;
    padding-top: 85px;
    text-align:center;
}
.mainn img{
    margin-bottom:-10px;
}
.event_btn{
    background: #2c4770;
    color: #fff;
    padding: 30px 53px;
    border-radius: 10px;
    margin-bottom: 50px;
    margin-top:30px;
    border:0;
    font-size:25px;
    font-family:'Nanum Barun Gothic', sans-serif;
    letter-spacing: 1px;
    word-spacing: 0px;
}
@media only screen and (max-width: 479px){
    .event_btn{
        width: 87%;
        font-size: 18px;
        padding: 25px 10px;
        border-radius: 5px;
        margin-top: 10px;
    }
}
</style>

<script>
$(function(){
	$('.event_btn').click(function(){

			window.frames["iFrm3"] = "https://chrisneeds.kr/shop/orderinquiry.php";
			$("#showRight").click();
      $("#iFrame_2").contents().find("#myname").click();
    });

})

</script>

<div class="mainn">

<div><img src="<?php echo G5_IMG_URL;?>/airpodsmax_page.png"/></div>

<div><button class="event_btn">1초 카카오 회원가입하고 응모하기</button></div>

</div>










<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>
