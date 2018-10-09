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
.bgimg4 {background-image: url("20795.jpg")}
.bgimg5 {background-image: url("20792.jpg")}
.bgimg6 {background-image: url("20797.jpg")}
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
    <a href="#flower" style="width:33%" class="w3-bar-item w3-button w3-hover-black">花卉</a>
    <a href="#land" style="width:33%" class="w3-bar-item w3-button w3-hover-black">土地</a>
    <a href="#plan" style="width:34%" class="w3-bar-item w3-button w3-hover-black">計畫</a>
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
<div class="w3-display-container bgimg7" id="plan">
  <div class="w3-display-middle w3-text-white w3-center">
    <h1 class="w3-jumbo">You Are infinite</h1><br>
    <h2>Of course..</h2>
  </div>
</div>

<!-- 計畫 -->
<div class="w3-container w3-padding-64 bgimg w3-grayscale-min w3-center">
  <div class="w3-content">
    <h1 style="font-family:DFKai-sb"><b>栽種計畫當前進度</b></h1>
    <?php
$records_per_page = 20;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;
require_once("mycontacts_open.inc");
// 設定SQL查詢字串

$sql = "SELECT plan.*,distribution.Planorder,distribution.Exday,distribution.Fiday,distribution.PMconsume,distribution.Finish FROM plan INNER JOIN distribution ON plan.PlanID=distribution.PlanID";
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_records=0;
while ($re = mysqli_fetch_array($result, MYSQLI_NUM)){
    if($re[3]==1)
        $total_records++;
}
mysqli_data_seek($result, 0);
$total_fields=mysqli_num_fields($result); // 取得欄位數

// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<div align='center'>";
echo "<table class='w3-large' style='font-family:DFKai-sb; width:100%'><tr>";
echo "<th>計畫<br/>編號</th><th>花編號</th><th>土地<br/>編號</th><th>順序</th><th>預期日期</th><th>完成日期</th><th>原料<br/>消耗量</th><th></th><th>工作項目</th><th>原料<br/>編號</th><th>原料<br/>(預計)</th><th></th></tr>";
$j = 1;
$unique="";
while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)
       and $j <= $records_per_page) {
   if($rows[7]==0 && $rows[0]!=$unique){
   $sq = "SELECT Pwork FROM process WHERE PFID='".$rows[1]."' AND Porder='".$rows[3]."'";
   $resul = mysqli_query($link, $sq); // 執行SQL指令
   $ro = mysqli_fetch_assoc($resul); // 取回記錄
   
   
   echo "<tr>";
   $k=0;
   $s_array = array('submit',$k);
   $c=implode( $s_array);
   echo "<form name=".$c." action='plan_update.php?action=update&planid=".$rows[0]." &order=".$rows[3]." ' method='post'>";
   for ( $i = 0; $i<= $total_fields-1; $i++ ){
         
        if($i!=5 && $i!=6 && $i!=7)
            echo "<td>".$rows[$i]."</td>";
        if($i==5){
            
            echo "<td><input type='date' name='fiday' size='10' maxlength='10' value=''/></td>";
           
        }
        if($i==6){
            echo "<td><input type='text' name='pmconsume' size='5' maxlength='10' value='0'/></td>";
            echo "<td colspan='1' align='center'> <input type='submit' name=".$c." value='完成'/></td></form>";
            
        }
         
      }
      $k++;
      echo"<td>".$ro['Pwork']."</td>";
   $s="SELECT PMID FROM process WHERE PFID='".$rows[1]."' AND Porder='".$rows[3]."'";
   $r=mysqli_query($link,$s);
   $rr=mysqli_fetch_assoc($r);
   $mid=$rr['PMID'];
   echo"<td>".$mid."</td>";
   $s="SELECT Area FROM land WHERE LID='".$rows[2]."'";
   $r=mysqli_query($link,$s);
   $rr=mysqli_fetch_assoc($r);
   $area=$rr['Area'];
   $s="SELECT Pusage FROM process WHERE PFID='".$rows[1]."' AND Porder='".$rows[3]."'";
   $r=mysqli_query($link,$s);
   $rr=mysqli_fetch_assoc($r);
   
   $consume=$area*$rr['Pusage'];
   echo"<td>".$consume."</td>";
   echo "<td><a href='plan_detail.php?action=edit&id=";
   echo $rows[0]."'><b>細節</b>  ";
   if($ro['Pwork']=="採收"){
            echo "<a href='harvest_insert.php?action=edit&id=";
            echo $rows[0]."'><b><br/>回報產量</b></td>";
      }
   
   echo "</tr>";
   $j++;$unique=$rows[0];
   }
   
}
echo "</table><br>";
echo "</div>";
?>
<p class="w3-center" style="font-family:DFKai-sb">
<a href="planP.php" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">查看更多</a>
<a href="materialP.php" class="w3-button w3-black w3-round w3-padding-large w3-large">原料查詢</a></p>
  </div>
</div>

<!-- Background photo -->
<div class="w3-display-container bgimg3" id="harvest">
  <div class="w3-display-middle w3-text-white w3-center">
    <h1 class="w3-jumbo">You Are infinite</h1><br>
    <h2>Of course..</h2>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16 w3-large" style="font-family:DFKai-sb">
  <p>請從此<a href="login.php" title="按我登出" target="_blank" class="w3-hover-text-green">登出</a></p>
</footer>
<div class="w3-hide-small" style="margin-bottom:32px"> </div>

</body>
</html>


