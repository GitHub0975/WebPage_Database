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
.bgimg4 {background-image: url("20789.jpg")}
.bgimg5 {background-image: url("20797.jpg")}
.bgimg6 {background-image: url("20792.jpg")}
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
    <a href="#harvest" style="width:25%" class="w3-bar-item w3-button w3-hover-black">產量表</a>
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
<div class="w3-display-container bgimg7" id="harvest">
  <div class="w3-display-middle w3-text-white w3-center">
    <h1 class="w3-jumbo">You Are infinite</h1><br>
    <h2>Of course..</h2>
  </div>
</div>

<!-- 產量 -->
<div class="w3-container w3-padding-64 bgimg w3-grayscale-min w3-center">
  <div class="w3-content">
    <h1 style="font-family:DFKai-sb"><b>產量表</b></h1>
 <?php
$records_per_page = 20;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;

require_once("mycontacts_open.inc");
// 設定SQL查詢字串

  $sql = "SELECT * FROM harvest ORDER BY Hardate desc";
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
echo "<tr><th>採收日期</th>";
echo "<th>採收量</th><th>剩餘量(出貨)</th><th>計畫編號</th></tr>";
$j = 1;
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
       $FID=$rows[0];
   echo "<tr>";
   for ( $i = 0; $i<= $total_fields-1; $i++ )
      echo "<td>".$rows[$i]."</td>";
     
      echo "</tr>";   
   echo "</tr>";
   $j++;
}
echo "</table><br>";
echo "</div>";
?>
<br/>
<p class="w3-center" style="font-family:DFKai-sb">
 <a href="harvestB.php" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 查看更多</a></p>
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
    <h1 style="font-family:DFKai-sb"><b>目前產量庫存</b></h1>
    <?php
$records_per_page = 20;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;
require_once("mycontacts_open.inc");
// 設定SQL查詢字串

$sql = "SELECT PlanID FROM distribution WHERE Finish=0 ORDER BY PlanID desc";
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_records=0;
$check="";
while ($re = mysqli_fetch_array($result)){
    if($re[0]!=$check)
        $total_records++;
    $check=$re[0];
}
mysqli_data_seek($result, 0);
$total_fields=mysqli_num_fields($result); // 取得欄位數

// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<div align='center'>";
echo "<table class='w3-large' style='font-family:DFKai-sb'><tr>";
echo "<tr><th>計畫編號</th><th>花編號</th><th>可出貨量</th><th></th></tr>";
$j = 1;
$check="";
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
   if($rows[0]!=$check){
        $sq = "SELECT * FROM harvest WHERE HPlanID='".$rows[0]."' ORDER BY Hardate desc";
        $resul = mysqli_query($link, $sq); // 執行SQL指令
        $ro = mysqli_fetch_assoc($resul); // 取回記錄
        $total=$ro['Hremain'];
        $date=$ro['Hardate'];
        echo "<tr>";
        
        echo "<td>".$rows[0]."</td>";
        $sq = "SELECT PlanFID FROM plan WHERE PlanID='".$rows[0]."'";
        $resul = mysqli_query($link, $sq); // 執行SQL指令
        $ro = mysqli_fetch_assoc($resul); // 取回記錄
        $FID=$ro['PlanFID'];
        echo "<td>".$FID."</td>";
        if($total!="")
            echo"<td>".$total."</td>";
        else{
            echo"<td>0</td>";
        }
   echo "<td><a href='ship_insert.php?id=".$rows[0]."&amount=".$total."&FID=".$FID."&date=".$date."'><b>出貨</b>  ";
   echo "</td>";
   echo "</tr>";
   $j++;
   $check=$rows[0];
   }
 
   
}
echo "</table><br>";
echo "</div>";
?>
<br/>
<p class="w3-center" style="font-family:DFKai-sb">
 <a href="shipB.php" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 查看更多</a></p>
  </div>
</div>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16 w3-large" style="font-family:DFKai-sb">
  <p>請從此<a href="login.php" title="按我登出" target="_blank" class="w3-hover-text-green">登出</a></p>
</footer>
<div class="w3-hide-small" style="margin-bottom:32px"> </div>

</body>
</html>


