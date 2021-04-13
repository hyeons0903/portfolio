<?php
include_once('../common.php');
$doctor_id = $_GET['doctor_id'];
$doctor_q = "SELECT * FROM doctor_member WHERE user_id = '$doctor_id' ";
$doc_result = sql_query($doctor_q);
$doctor_row = $doc_result->fetch_assoc();


$inst_name = $doctor_row['inst_name'];
$doctor_name = $doctor_row['doc_name'];
?>


<div class="v134_1507">
        <div class="v134_1506">
            <a class="v90_2" href="<?php echo G5_URL;?>/doctor/doc_patient_his.php?doctor_id=<?php echo $doctor_id;?>"></a>
            <div class="v134_1504"><span class="v90_3"><?php echo $inst_name ?></a></span>
                <div class="v134_1503"><a href='https://chrisneeds.kr/doctor/doc_change_info.php?doctor_id=<?php echo $doctor_id; ?>'><span class="v90_20">My Page</span></a><span class="v90_21" onClick="logout();">Log out</span></div>
            </div>
        </div>
    </div>
<style>

.v134_1507 {
  width: 100%;
  height: 72px;
  background: rgba(255,255,255,1);
  padding: 0px;
  margin: 00px;
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 50%;
  transform: translateX(-50%);
  overflow: hidden;
}
.v134_1506 {
  width: 854px;
  height: 50px;
  margin: 0px;
  opacity: 1;
  position: absolute;
  top: 18px;
  left: 50%;
  transform: translateX(-50%);
  overflow: hidden;
}
.v90_2 {
  width: 84.5px;
  height: 42px;
  background: url("../img/pare_logo_darkblue.png");
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v134_1504 {
  width: 597px;
  height: 36px;
  background-size: cover;
  padding: 0px;
  margin: 0px;
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 257px;
  overflow: hidden;
}
.v90_3 {
  width: 351px;
  color: rgba(25,98,107,1);
  position: absolute;
  top: 6px;
  left: 0px;
  font-family: Noto Sans CJK KR;
  font-weight: Bold;
  font-size: 20px;
  opacity: 1;
  text-align: center;
  cursor: pointer;
}
.v134_1503 {
  width: 148px;
  height: 25px;
  padding: 0px;
  margin: 0px;
  opacity: 1;
  position: absolute;
  top: 6px;
  left: 449px;
  overflow: hidden;
}
.v90_20 {
  width: 152px;
  color: rgba(25,98,107,1);
  position: absolute;
  top: 4px;
  left: 0px;
  font-family: Noto Sans CJK KR;
  font-weight: Regular;
  font-size: 14px;
  opacity: 1;
  text-align: left;
}
.v90_21 {
  width: 148px;
  color: rgba(25,98,107,1);
  position: absolute;
  top: 4px;
  left: 100px;
  font-family: Noto Sans CJK KR;
  font-weight: Regular;
  font-size: 14px;
  opacity: 1;
  text-align: left;
  cursor: pointer;
}

</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.3.min.js"></script>

<script>
    $(".v90_3").on('click', function(){
        window.location.href = './doc_patient_his.php?doctor_id=<?php echo $doctor_id;?>'
    });
</script>
