<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<title>新增產量</title>
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
<?php
if(isset($_GET["id"])) $id=$_GET["id"];
if (isset($_POST["hardate"]) && isset($_POST["hamount"]) ) {
   $Hardate = $_POST["hardate"];
   $Hamount = $_POST["hamount"];
   require_once("mycontacts_open.inc");
   mysqli_query($link,'SET NAMES utf8');
   $sql="SELECT Hremain FROM harvest WHERE HPlanID='".$id."'  ORDER BY Hardate DESC";
   $result=mysqli_query($link, $sql);
   $total_records=mysqli_num_rows($result);
   $row=mysqli_fetch_assoc($result);
   if($total_records==0){
        $Hremain=$Hamount;
   }
   else{
        $Hremain=$Hamount+$row['Hremain'];
   }
   
   // 檢查是否有輸入欄位資料
   if ($Hardate != "" && $Hamount != "" ) {
      
      // 建立SQL字串
      $sql = "INSERT INTO harvest (Hardate, Hamount,Hremain,HPlanID) VALUES('";
      $sql.= $Hardate."','".$Hamount."', '".$Hremain."','".$id."')"; 
      if ( mysqli_query($link, $sql) ) { // 執行SQL指令
         echo "<center><h2><span style='font-family:DFKai-sb; color:red;'>新增成功!</span></h2><br/>";
 
      }
      require_once("mycontacts_close.inc");
   }
   else {
       echo "<font color:#FFFFFF>資料尚未填妥!";
  }
}
?>
<center>
<form action="harvest_insert.php?id=<?php echo $id ?>" method="post" 
      enctype="multipart/form-data">
   <div class='w3-large'>
<table class='w3-large' style='font-family:DFKai-sb; border:3px #642100 dashed;'>
<tr><th colspan="2" align="center">新增產量</th></tr>
<tr><td>計畫編號:</td><td><?php echo $id?></td></tr>
   
  
<tr><td>採收日期:</td>
   <td><input type="date" name="hardate" style="padding:5px;"
              maxlength="10"/></td></tr>
<tr><td>採收量:</td>
   <td><input type="text" name="hamount" style="padding:5px;"
              maxlength="10"/></td></tr>

<tr><td colspan="2" align="center">
   <input type="submit" value="新增"/>
   </td></tr>
</table>
</form>
</div>
<br/>
 <p class="w3-center">
 <a href="plantView.php#harvest" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large">
 回首頁</a></p>
</body>
</html>