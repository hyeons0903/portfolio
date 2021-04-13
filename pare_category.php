<?php
include_once('./_common.php');

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');

if($type == "prescription_item"){
    $item = "0";
}else if($type == "normal_item"){
    $item = "1";
}
?>

<div id="category_main">

    <nav>
      <ul>
        <li id="prescription_item" class="active"><a href="">처방제품</a></li>
        <li id="normal_item"><a href="">일반제품</a></li>
      </ul>
    </nav>
</div>

<div id="prescription_items">
    <a href='<?php echo G5_SHOP_URL;?>/item.php?it_id=160761936'><img src="<?php echo G5_IMG_URL;?>/pare_01_560x360.png">
        <div>Pare.01 다이어트<br><span style="font-weight:bold;">168,000원</div>
    </a>
    <a><img src="<?php echo G5_IMG_URL;?>/pare_02_comming560x360.png">
        <div>Pare.02 변비<br><span style="font-weight:bold;">75,000원</div>
    </a>
</div>
<div id="normal_items">
    <a href='<?php echo G5_SHOP_URL;?>/item.php?it_id=1571990420'><img src="<?php echo G5_IMG_URL;?>/pare_fireup_560x360.png">
        <div>전립선 영양제<br><span style="font-weight:bold;">38,900원</div>
    </a>
    <a><img src="<?php echo G5_IMG_URL;?>/pare_hair_comming560x360.png">
        <div>탈모샴푸<br><span style="font-weight:bold;">25,000원</div>
    </a>
</div>



<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript">
      $.noConflict();
</script>

<script type="text/javascript">
function onLoadEvent(){
    if(<?php echo $item ?> == "0"){
        $("#prescription_item").click();
    }else if(<?php echo $item?> == "1"){
      $("#normal_item").click();
      var athis = $("#normal_item a");
      if(!$(athis).parent().hasClass('active') && !nav.hasClass('animate')) {

        nav.addClass('animate');

        var _this = $(athis);

        nav.find('ul li').removeClass('active');

        var position = _this.parent().position();
        var width = _this.parent().width();

        if(position.left >= pos) {
          line.animate({
            width: ((position.left - pos) + width)
          }, 150, function() {
            line.animate({
              width: width,
              left: position.left
            }, 150, function() {
              nav.removeClass('animate');
            });
            _this.parent().addClass('active');
          });
        } else {
          line.animate({
            left: position.left,
            width: ((pos - position.left) + wid)
          }, 150, function() {
            line.animate({
              width: width
            }, 150, function() {
              nav.removeClass('animate');
            });
            _this.parent().addClass('active');
          });
        }

        pos = position.left;
        wid = width;
      }

    }
}
var line = $('<div />').addClass('line');
var nav =$("#category_main nav");
line.appendTo(nav);

var active = nav.find('.active');
var pos = 0;
var wid = 0;

if(active.length) {
  pos = active.position().left;
  wid = active.width();
  line.css({
    left: pos,
    width: wid
  });
}

nav.find('ul li a').click(function(e) {
  e.preventDefault();
  if(!$(this).parent().hasClass('active') && !nav.hasClass('animate')) {

    nav.addClass('animate');

    var _this = $(this);

    nav.find('ul li').removeClass('active');

    var position = _this.parent().position();
    var width = _this.parent().width();

    if(position.left >= pos) {
      line.animate({
        width: ((position.left - pos) + width)
      }, 150, function() {
        line.animate({
          width: width,
          left: position.left
        }, 150, function() {
          nav.removeClass('animate');
        });
        _this.parent().addClass('active');
      });
    } else {
      line.animate({
        left: position.left,
        width: ((pos - position.left) + wid)
      }, 150, function() {
        line.animate({
          width: width
        }, 150, function() {
          nav.removeClass('animate');
        });
        _this.parent().addClass('active');
      });
    }

    pos = position.left;
    wid = width;
  }
});

window.onload = onLoadEvent;

    $("#prescription_item").click(function(){
        $("#prescription_item").css({"color":"#333","font-weight":"600"});
        $("#prescription_items").css({visibility:"visible",opacity:"1",display:"block"});
        $("#normal_item").css({"color":"#888","font-weight":"400"});
        $("#normal_items").css({visibility:"hidden",opacity:"0",transition:"visibility 500ms, opacity 500ms linear"});
    });
    $("#normal_item").click(function(){
        $("#normal_item").css({"color":"#333","font-weight":"600"});
        $("#normal_items").css({visibility:"visible",opacity:"1",display:"block"});
        $("#prescription_item").css({"color":"#888","font-weight":"400"});
        $("#prescription_items").css({visibility:"hidden",opacity:"0",transition:"visibility 500ms, opacity 500ms linear"});
    });

</script>



<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>
