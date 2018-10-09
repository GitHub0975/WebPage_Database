<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<title>員工登入</title>

<h1><marquee direction="right" height="50" scrollamount="5" behavior="alternate">
<span style="font-family:DFKai-sb; color:green;">美谷花卉農場登入系統</span></marquee>
</h1>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<body style=" background-image:url(bbb.jpg); background-repeat:repeat">

<h2 class="w3-center"><span style="font-family:DFKai-sb; color:green;">員工登入</span></h2>

<div class=" w3-section" style="max-width:500px">
  <img class="mySlides w3-circle" src="20777.jpg" style="width:100%" alt="Norway">
  <img class="mySlides w3-circle" src="20779.jpg" style="width:100%" alt="Norway">
  <img class="mySlides w3-circle" src="20784.jpg" style="width:100%" alt="Norway">
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
<?php
session_start();  // 啟用交談期
$_SESSION["login_session"] = false;
$username = "";  $password = "";$depart="";
// 取得表單欄位值
if ( isset($_POST["Username"]) )
   $username = $_POST["Username"];
if ( isset($_POST["Password"]) )
   $password = $_POST["Password"];
if ( isset($_POST["department"]) )
   $depart = $_POST["department"];
switch($depart){
    case "manager":
        $de=0;break;
    case "plant":
        $de=1;break;
    case "administraction":
        $de=2;break;
    case "business":
        $de=3;break;
}
// 檢查是否輸入使用者名稱和密碼
if ($username != "" && $password != "") {
   // 建立MySQL的資料庫連接 
   require_once("mycontacts_open.inc");
   //送出UTF8編碼的MySQL指令
   mysqli_query($link, 'SET NAMES utf8'); 
   // 建立SQL指令字串
   $sql = "SELECT * FROM member WHERE password='";
   $sql.= $password."' AND username='".$username."' AND department='".$de."'";
   // 執行SQL查詢
   $result = mysqli_query($link, $sql);
   $total_records = mysqli_num_rows($result);
   // 是否有查詢到使用者記錄
   if ( $total_records > 0 ) {
      // 成功登入, 指定Session變數
      $_SESSION["login_session"] = true;
      $_SESSION["SQL"]=$sql;
      if($de==0){
        $_SESSION["depart"] = 0;
        header("Location: managerView.php");
        }
      else if($de==1){
      $_SESSION["depart"] = 1;
        header("Location: plantView.php");
        }
      else if($de==2){
        $_SESSION["depart"] = 2;
        header("Location: administractor.php");
        }
      else if($de==3){
        $_SESSION["depart"] = 3;
        header("Location: businessView.php");
        }
   } else {  // 登入失敗
      echo "<center><font color='red'>";
      echo "使用者帳號或密碼錯誤!<br/>";
      echo "</font>";
      $_SESSION["login_session"] = false;
   }
   require_once("mycontacts_close.inc");  
}
?>
<form action="login.php" method="post">
<div class="w3-large" style="
  position:absolute; 
  top:170px;
  left:630px;font-family:DFKai-sb;">
<fieldset>
<legend>員工登入</legend>
<div center>
<table align="center" bgcolor="	#E8FFF5">
<tr><td><font size="4"><p>選擇部門:</font></td>
 <td><select name="department">
    <option value="manager" selected="True">總經理</option>
    <option value="plant">栽植部</option>
    <option value="administraction">行政部</option>
    <option value="business">業務部</option></p>
    </select><br/></td></tr>
 <tr><td><font size="4"><p>使用者帳號:</font></td>
   <td><input type="text" name="Username" 
             size="15" maxlength="10"/></p>
   </td></tr>
 <tr><td><font size="4"><p>使用者密碼:</font></td>
   <td><input type="password" name="Password"
              size="15" maxlength="10"/></p>
   </td></tr>
 <tr><td colspan="4" align="center">
   <input type="submit" value="登入" class="w3-button w3-black w3-hover-red w3-round w3-padding-large w3-large"></font>
   </td></tr> 
</table>
</div>
</fieldset>
</div>
<form/>
</form>

</body>
</html>
