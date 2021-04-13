<?php
include_once('./_common.php');

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');


$od_id = $_GET['od_id'];

$sql = "SELECT * FROM g5_shop_order where od_id = ".$od_id."";
$result = sql_query($sql);
if ($result ->num_rows > 0) {
    $row = $result->fetch_assoc();
    if($row['review_star'] != ""){
    $already = "already";
    }else{
        $already = "";
    }
};
?>

    <div id="box">
    <a>담당의 진료는 어떠셨나요?</a>
    <p id="star_grade">
        <a href="#">★</a>
        <a href="#">★</a>
        <a href="#">★</a>
        <a href="#">★</a>
        <a href="#">★</a>
        <div class="review_txt"></div>
    </p>

    <input type="hidden" id="review_count"></input>
    <input id="review_txt" placeholder="&#32;한 줄 평을 입력해 주세요." maxlength="30"></input>
    <button>리뷰 등록하기</button>
    </div>
    <div id="advertisment">
        <a>Advertisment</a>
        <a class="ad" style="border:none;padding:0;" href="https://smartstore.naver.com/wellbeingshop/products/5387479659"><img src="<?php echo G5_IMG_URL?>/AD_men_underwear.png"/></a>
        <!-- <a class="ad" style="border:none;padding:0;" href="<?php echo G5_SHOP_URL?>/item.php?it_id=160761936"><img src="<?php echo G5_IMG_URL?>/AD_miindan.png"/></a>
        <a class="ad" style="border:none;padding:0;" href="<?php echo G5_SHOP_URL?>/item.php?it_id=160761937"><img src="<?php echo G5_IMG_URL?>/AD_miindan.png"/></a>
        <a class="ad" style="border:none;padding:0;" href="<?php echo G5_SHOP_URL?>/item.php?it_id=160761938"><img src="<?php echo G5_IMG_URL?>/AD_miindan.png"/></a>
        <a class="ad" style="border:none;padding:0;" href="<?php echo G5_SHOP_URL?>/item.php?it_id=160761939"><img src="<?php echo G5_IMG_URL?>/AD_miindan.png"/></a> -->
    </div>


<script type="text/javascript">
        var random = Math.floor(Math.random() * $('.ad').length);
        $('.ad').hide().eq(random).show();

        $(document).ready(function() { 
            $('#star_grade a').addClass("on");
            $('.review_txt').html('5점 (아주 좋았어요)');
            $('#review_count').val('5');
            if("<?php echo $already;?>" =="already"){
            $('#box').html("이미 리뷰를 작성하셨습니다.");
        }
        });

        $('#star_grade a').click(function(){
            $(this).parent().children("a").removeClass("on");  /* 별점의 on 클래스 전부 제거 */ 
            $(this).addClass("on").prevAll("a").addClass("on"); /* 클릭한 별과, 그 앞 까지 별점에 on 클래스 추가 */
            var n = $('.on').length;
            if(n == '1'){
                $('.review_txt').html(n+'점 (별로에요)');
            }else if(n == '2'){
                $('.review_txt').html(n+'점 (별로에요)');
            }else if(n == '3'){
                $('.review_txt').html(n+'점 (괜찮았어요)');
            }else if(n == '4'){
                $('.review_txt').html(n+'점 (좋았어요)');
            }else if(n == '5'){
                $('.review_txt').html(n+'점 (아주 좋았어요)');
            }
            $('#review_count').val(n);
            return false;
        });
        $('#box button').click(function(){
            if($('#review_txt').val() == ""){
                alert("한 줄 평을 입력해 주세요.");
                $('#review_txt').focus();
                return false;
            }
            var fd = new FormData();
            fd.append("review_count", $('#review_count').val());
            fd.append("review_txt", $('#review_txt').val());
            fd.append("od_id", <?php echo"$od_id" ?>)
            
            $.ajax({
                type: "POST",
                url: "./ajax.review.php",
                data: fd,
                processData: false,
                contentType: false,
                success: function (data) {
                    if($.trim(data) == "success"){
                        alert("리뷰등록이 완료되었습니다.");
                        location.href = "<?php echo G5_URL; ?>";
                    }else{
                        alert(data);
                    }
                }
            });
        });
   
</script>

<style>
    #box{
        margin:70px auto 0;
        width:370px;
        text-align:center;
        padding:30px 0;
        border-bottom:1px solid #ddd;
        letter-spacing:-1px;
    }
    #review_txt{
        width:100%;
        height:50px;
        border-radius:5px;
        resize: none;
        margin-bottom:10px;
        background:#f6f6f6;
        border:none;
        color:#333;
        padding:0px 10px;
    }
    #box a{
        font-size:25px;
        color:#474747;
        font-weight:500;
    }
    #star_grade{
        margin:0px 0 40px 0;
    }
     #star_grade a{
        text-decoration: none;
        color: #C9C9C9;
        font-size:68px;
    }
    #star_grade a.on{
        color: #2B4D59;
    }
    .review_txt{
        transform: translate(-50%, -40px);
        left: 50%;
        text-align: center;
        width: 33%;
        position: absolute;
        font-size:16px;
        font-weight:500;
        color:#2b4d59;
    }
    #advertisment{
        width:370px;
        margin:40px auto 0;
    }
    #advertisment a{
        border:1px solid #D4D4D4;
        border-radius:20px;
        font-size:13px;
        padding:0px 10px;
        color: #858585;
        font-weight: 500;
    }
    #advertisment img{
        margin: 20px 0;
        border-radius:5px;
    }
    #box button{
        width:100%;
        padding:15px 20px;
        border:none;
        background:#2B4D59;
        color:#fff;
        border-radius:5px;
        font-size:18px;
    }
    button:focus{
        outline:none;
    }
    @media only screen and (max-width: 479px){
        #box{
            margin:50px auto 0;
            width:80%;
            text-align:center;
            padding:30px 0;
            border-bottom:1px solid #dadada;
            letter-spacing:-1px;
        }
        #review_txt{
            width:100%;
            height:50px;
            border-radius:5px;
            resize: none;
            margin-bottom:10px;
            background:#f6f6f6;
            border:none;
            color:#333;
            padding:0px 10px;
        }
        #box a{
            font-size:20px;
            color:#474747;
            font-weight:500;
        }
        #star_grade{
            margin:0px 0 33px 0;
            line-height: 60px;
        }
        #star_grade a{
            text-decoration: none;
            color: #C9C9C9;
            font-size:48px;
            -webkit-tap-highlight-color:rgba(0,0,0,0);
        }
        #star_grade a.on{
            color: #2B4D59;
        }
        .review_txt{
            transform: translate(-50%, -40px);
            left: 50%;
            text-align: center;
            width: 33%;
            position: absolute;
            font-size:16px;
            font-weight:500;
            color:#2b4d59;
        }
        #advertisment{
            width:80%;
            margin:15px auto 0;
        }
        #advertisment a{
            border-radius:20px;
            font-size:13px;
            padding:0px 10px;
            color: #858585;
            font-weight: 500;
        }
        #advertisment img{
            margin: 10px 0;
            border-radius:5px;
        }
        #box button{
            width:100%;
            padding:10px 20px;
            border:none;
            background:#2B4D59;
            color:#fff;
            border-radius:5px;
            font-size:15px;
        }
        button:focus{
            outline:none;
        }
        a:focus{
            outline:none;
        }
        .floating{
            display:none;
        }
    }
</style>