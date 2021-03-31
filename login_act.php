<?php
ini_set( 'display_errors', 1 );


session_start();
 $lid = $_POST["lid"];
 $lpd = $_POST["lpw"];

try{
    $pdo = new PDO('mysql:dbname=lastkadai;host=localhost'.'root','root');
}catch(PDOException $e){
    exit('DbConnectError:'.$e->getMessage());
}


$sql = "SELECT * FROM  login_table WHERE u_id =:lid AND u_pw =:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);

$res = $stmt->execute();

// エラー記入
if($res == false){
$error = $stmt->errorInfo();
exit("QueryError:".$error[2]);
}

$val = $stmt->fetch();

// 該当idがあるのかないのか
if($val["id"] !=""){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_name"] = $val["u_name"];
    header("Location: index.php");
}else{
    header("Location: login.php");
}
exit();
?>