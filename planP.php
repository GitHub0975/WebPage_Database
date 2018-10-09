<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>計畫</title>
<h1><marquee direction="right" height="50" scrollamount="5" behavior="alternate">
<span style="font-family:DFKai-sb; color:green;">美谷花卉農場</span></marquee>
</h1>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.w3-btn {width:150px;}
table {
    border-collapse: collapse;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #FFFFFF}
th {
    background-color:#3cb371;
    color: white;
}
</style>
</head>
<body style="font-family:DFKai-sb; background-image:url(bbb.jpg); ">
<center>
<?php
session_start();  // 啟動交談期
$records_per_page = 10;  // 每一頁顯示的記錄筆數
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
echo "<table class='w3-large' style='font-family:DFKai-sb'><tr>";
echo "<th>計畫編號</th><th>花編號</th><th>土地編號</th><th>順序</th><th>預期日期</th><th>完成日期</th><th>原料消耗量</th><th></th><th>工作項目</th><th>原料編號</th><th>原料(預計)</th><th></th></tr>";
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
            
            echo "<td><input type='date' name='fiday' size='20' maxlength='10' value=''/></td>";
           
        }
        if($i==6){
            echo "<td><input type='text' name='pmconsume' size='20' maxlength='10' value='0'/></td>";
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
            echo $rows[0]."'><b>|回報產量</b></td>";
      }
   
   echo "</tr>";
   $j++;$unique=$rows[0];
   }
   
}
echo "</table><br>";
if ( $pages > 1 )  // 顯示上一頁
   echo "<a href='planP.php?Pages=".($pages-1).
        "'>上一頁</a>| ";
for ( $i = 1; $i <= $total_pages; $i++ )
   if ($i != $pages)
     echo "<a href=\"planP.php?Pages=".$i."\">".
          $i."</a> ";
   else
     echo $i." ";
if ( $pages < $total_pages )  // 顯示下一頁
   echo "|<a href='planP.php?Pages=".($pages+1).
        "'>下一頁</a> ";
mysqli_free_result($result);  // 釋放佔用的記憶體
require_once("mycontacts_close.inc");
?>
<br/>
<p class="w3-center">
 <a href="plantView.php#plan" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回上頁</a></p>
</body>
</html>