<?php
include_once('./_common.php');

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');

?>

<div style="width:100%;margin-top:100px;text-align:center;">
    <img id="pare_story"></img>
    <a style="font-size:2vw;font-weight:400;width:81%;text-align:end;display:inline-block;" href="<?php echo G5_THEME_URL;?>/shop/pare_category.php?type=prescription_item">지금 프라이빗한 고민 해결하기 ></a>
</div>



<script type="text/javascript">

//메인 이미지 자동 변경 start
    $(document).ready(function(){
        if($(window).width() < 480){
            document.getElementById("pare_story").src = "<?php echo G5_IMG_URL;?>/mobile_pare_story.png", style="width:100%; height: 100%;";
            }else{
            document.getElementById("pare_story").src = "<?php echo G5_IMG_URL;?>/web_pare_story.png", style="width:100%; height: 100%;";
            }
    });

</script>
<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>
