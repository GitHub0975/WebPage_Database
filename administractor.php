<!DOCTYPE html>
<html>
<title>首頁</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2{font-family: "Raleway", sans-serif}
body, html {height: 100%}
p {line-height: 2}
.bgimg, .bgimg2, .bgimg3, .bgimg5, .bgimg6, .bgimg7 {
    min-height: 50%;
    background-position: center;
    background-size: cover;
}
.bgimg4{
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
.bgimg {background-image: url("bbb.jpg")}
.bgimg2 {background-image: url("20778.jpg")}
.bgimg3 {background-image: url("20784.jpg")}
.bgimg4 {background-image: url("207971.jpg")}
.bgimg5 {background-image: url("20792.jpg")}
.bgimg6 {background-image: url("20790.jpg")}
.bgimg7 {background-image: url("20780.jpg")}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #FFFFFF}
th {
    background-color:	#006000;
    color: white;
}

</style>
<body>

<!-- Header / Home-->
<header class="w3-display-container w3-wide bgimg4">
  <div class="w3-display-middle w3-text-white w3-center w3-container">
    <h1 class="w3-jumbo">
    <div class="w3-tag w3-round" style="padding:5px">
    <div class="w3-tag w3-round w3-border w3-border-white">
    <span style=" font-family:DFKai-sb;">
      美谷花卉農場</span>
    </div>
  </div></h1>
  </div>
</header>

<!-- Navbar (sticky bottom) -->
<div class="w3-bottom w3-hide-small w3-large">
  <div class="w3-bar w3-white w3-center w3-padding w3-opacity-min w3-hover-opacity-off">
  <span style="font-family:DFKai-sb;">
    <a href="#flower" style="width:25%" class="w3-bar-item w3-button w3-hover-black">花卉</a>
    <a href="#land" style="width:25%" class="w3-bar-item w3-button w3-hover-black">土地</a>
    <a href="#replenish" style="width:25%" class="w3-bar-item w3-button w3-hover-black">進貨單</a>
    <a href="#ship" style="width:25%" class="w3-bar-item w3-button w3-hover-black">出貨清單</a>
  </span></div>
</div>

<!-- 花卉 -->
<div class="w3-container w3-padding-64 w3-grayscale-min bgimg" id="flower">
  <div class="w3-content">
    <h1 class="w3-center" style="font-family:DFKai-sb"><b>花卉基本簡介</b></h1>
    <?php
session_start();  // 啟動交談期
$records_per_page = 20;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;
require_once("mycontacts_open.inc");
// 設定SQL查詢字串

$sql = "SELECT * FROM flower";
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);  // 取得記錄數
// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<div align='center'>";
echo "<table class='w3-large' style='font-family:DFKai-sb'><tr>";
echo "<th>花編號</th><th>花名</th><th>生長期</th><th>產期</th><th>夏/冬</th><th></th></tr>";
$j = 1;
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
   echo "<tr>";
   for ( $i = 0; $i<= $total_fields-1; $i++ ){
      if($rows[4]==0 && $i==4){
        echo "<td>夏天</td>";continue;}
      else if($rows[4]==1 && $i==4){
        echo "<td>冬天</td>";continue;}
      echo "<td>".$rows[$i]."</td>";
      }
   echo "<td><a href='flower_chartPAB.php?action=edit&id=";
      echo $rows[0]."'><b>查看流程</b></td>  ";
      echo "</tr>";   
   echo "</tr>";
   $j++;
}
echo "</table><br>";
echo "</div>";
?>
<br/>
<p class="w3-center" style="font-family:DFKai-sb">
 <a href="flowerPAB.php" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 查看更多</a></p>
  </div>
</div>

<!-- Background photo -->
<div class="w3-display-container bgimg2" id="land">
  <div class="w3-display-middle w3-text-white w3-center">
    <h1 class="w3-jumbo">You Are infinite</h1><br>
    <h2>Of course..</h2>
  </div>
</div>

<!-- 土地 -->
<div class="w3-container w3-padding-64 bgimg w3-grayscale-min w3-center">
  <div class="w3-content">
    <h1 style="font-family:DFKai-sb"><b>土地使用狀況</b></h1>
    <?php
$records_per_page = 20;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;
require_once("mycontacts_open.inc");
// 設定SQL查詢字串

$sql = "SELECT * FROM land";
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);  // 取得記錄數
// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<div align='center'>";
echo "<table class='w3-large' style='font-family:DFKai-sb'><tr>";
echo "<th>土地編號</th><th>土地名</th><th>面積/分</th><th>狀況</th></tr>";
$j = 1;
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
   echo "<tr>";
   for ( $i = 0; $i<= $total_fields-1; $i++ ){
      if($rows[3]==0 && $i==3){
        echo "<td>栽種中</td>";continue;}
      else if($rows[3]==1 && $i==3){
        echo "<td>採收中</td>";continue;}
      else if($rows[3]==2 && $i==3){
        echo "<td>休耕中</td>";continue;}
      echo "<td>".$rows[$i]."</td>";
      }
      echo "</tr>";
      echo "</tr>";   
   echo "</tr>";
   $j++;
}
echo "</table><br>";
echo "</div>";
?>
<br/>
<p class="w3-center" style="font-family:DFKai-sb">
 <a href="landPAB.php" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 查看更多</a></p>
  </div>
</div>

<!-- Background photo -->
<div class="w3-display-container bgimg7" id="replenish">
  <div class="w3-display-middle w3-text-white w3-center">
    <h1 class="w3-jumbo">You Are infinite</h1><br>
    <h2>Of course..</h2>
  </div>
</div>

<!-- 進貨 -->
<div class="w3-container w3-padding-64 bgimg w3-grayscale-min w3-center">
  <div class="w3-content">
    <h1 style="font-family:DFKai-sb"><b>進貨單報表</b></h1>
   <?php
$records_per_page = 20;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;

require_once("mycontacts_open.inc");
// 設定SQL查詢字串

  $sql = "SELECT * FROM replenish";
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);  // 取得記錄數
if($total_records<0)
    echo "<br> 無此資料 <br/>";
// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<div align='center'>";
echo "<table class='w3-large' style='font-family:DFKai-sb'><tr>";
echo "<th>進貨日期</th><th>單價</th><th>進貨量</th><th>原料編號</th><th></th></tr>";
$j = 1;
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
      
   echo "<tr>";
   for ( $i = 0; $i<= $total_fields-1; $i++ )
      echo "<td>".$rows[$i]."</td>";
       echo "<td><a href='replenish_edit.php?action=edit&id=".$rows[3]."&date=".$rows[0]." '><b>編輯</b>";
     
      echo "</tr>";   
   echo "</tr>";
   $j++;
}
echo "</table><br>";
echo "</div>";
?>
<p class="w3-center" style="font-family:DFKai-sb">
<a href="replenishA.php" class="w3-button w3-black w3-round w3-padding-large w3-large">查看更多</a>
<a href="replenish_insert.php" class="w3-button w3-black w3-round w3-padding-large w3-large">新增進貨單</a></p>
  </div>
</div>
<!-- Background photo -->
<div class="w3-display-container bgimg6" id="ship">
  <div class="w3-display-middle w3-text-white w3-center">
    <h1 class="w3-jumbo">You Are infinite</h1><br>
    <h2>Of course..</h2>
  </div>
</div>

<!-- 出貨 -->
<div class="w3-container w3-padding-64 bgimg w3-grayscale-min w3-center">
  <div class="w3-content">
    <h1 style="font-family:DFKai-sb"><b>出貨單核對</b></h1>
    <?php
$records_per_page = 20;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;
require_once("mycontacts_open.inc");
// 設定SQL查詢字串

$sql = "SELECT * FROM ship ORDER BY Shdate desc";
// 執行SQL查詢
$result = mysqli_query($link, $sql);

$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);
// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<div align='center'>";
echo "<table class='w3-large' style='font-family:DFKai-sb'><tr>";
echo "<th>花編號</th><th>出貨日期</th><th>市場</th><th>箱號</th><th>等級</th><th>出貨量</th><th>底價</th><th>核對</th><th>計畫編號</th></tr>";
$j = 1;
$check="";
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
        
        $sq = "SELECT PlanFID FROM plan WHERE PlanID='".$rows[7]."'";
        $resul = mysqli_query($link, $sq); // 執行SQL指令
        $ro = mysqli_fetch_assoc($resul); // 取回記錄
        $FID=$ro['PlanFID'];
        echo "<tr>";
        echo "<td>".$FID."</td>";
        
        $k=0;
        for ( $i = 0; $i<= $total_fields-1; $i++ ){
        
            if($i==5 && $rows[5]==0){
                 $s_array = array('submit',$k);
                 $c=implode( $s_array);
                 echo "<form name=".$c." action='ship_update.php?action=price&date=".$rows[0]."&market=".$rows[1]."&boxid=".$rows[2]."&grade=".$rows[3]."&id=".$rows[7]." ' method='post'>";
                 echo "<td><input type='text' name='shprice' size='5' maxlength='10' value='0'/></td>";
                 echo "<td><colspan='1' align='center'> <input type='submit' name=".$c." value='底價'/></td></form>";
                 $k++;
            }
            if($i!=6 && $i!=5)
                    echo "<td>".$rows[$i]."</td>";
            if($i==5 && $rows[5]!=0)
                   echo "<td>".$rows[$i]."</td>";
                   
            if($i==6 && $rows[6]==0 && $rows[5]!=0)
                   echo "<td><a href='ship_update.php?action=check&date=".$rows[0]." &market=".$rows[1]."&boxid=".$rows[2]."&grade=".$rows[3]."&id=".$rows[7]." '><b>核對</b>  ";
            if($i==6 && $rows[6]!=0 )
                echo "<td>已核對</td>";
            }
            
  
   echo "</td>";
   echo "</tr>";
   $j++;

   }
 
   

echo "</table><br>";
echo "</div>";
?>
<p class="w3-xlarge" style="font-family:DFKai-sb">
<a href="shipA.php" class="w3-button w3-black w3-round w3-padding-large w3-large">查看更多</a>
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-round w3-padding-large w3-large">查看行情</button>
  </p>
  </div>
</div>

<!-- RSVP modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px">
    <div class="w3-container w3-white w3-center w3-large" style="font-family:DFKai-sb">
      <h1 class="w3-wide" style="font-family:DFKai-sb">網站連結</h1>
<p><a href="http://www.tflower.com.taipei/TFAWebUI/" target="_blank" class="w3-hover-text-green">台北行情</a></p>
<p><a href="http://hn84037079.myweb.hinet.net/" target="_blank" class="w3-hover-text-green">台南行情</a></p>
<p><a href="http://www.tfmc.com.tw/" target="_blank" class="w3-hover-text-green">台中行情</a></p>
<p><a href="http://www.cfca.com.tw/" target="_blank" class="w3-hover-text-green">彰化行情</a></p>
<p><a href="http://www.kifc.com.tw/" target="_blank" class="w3-hover-text-green">高雄行情</a></p>
      <div class="w3-row" style="font-family:DFKai-sb">
          <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-block w3-green">離開</button>
      </div>
    </div>
  </div>
</div>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16 w3-large" style="font-family:DFKai-sb">
  <p>請從此<a href="login.php" title="按我登出" target="_blank" class="w3-hover-text-green">登出</a></p>
</footer>
<div class="w3-hide-small" style="margin-bottom:32px"> </div>

</body>
</html>


