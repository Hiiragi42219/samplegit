<?php
	header('Content-type: text/html; charset = UTF-8');
?>

<!DOCTYPE html>
<head>
<title>表示なう</title>
     <meta http-equiv = "Content-Type" content ="text/html; charset = utf-8">
     </head>
<body>

<?php
$id = $_GET['id'];//落し物IDの受け取り
$category = $_GET['category'];//種類
$place = $_GET['place'];
$time = 'NULL';
$time =  $_GET['time'];//2000-12-23
$time =  date('Ymd', strtotime($time));//20001223にフォーマット変更
$check = $_GET['check'];//返却未返却の識別

if(isset($_GET['customer'])){
$customer = $_GET['customer']; //受取人情報がなければ処理しない
$customer = (string)$customer;
$customer = htmlspecialchars($customer, ENT_QUOTES, 'UTF-8');
}

$id = (int)$id;
$category = (string)$category;
$place = (string)$place;
$time = (int)$time;
$check =(boolean)$check;




$id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
$category = htmlspecialchars($category, ENT_QUOTES, 'UTF-8');
$place = htmlspecialchars($place, ENT_QUOTES, 'UTF-8');
$time = htmlspecialchars($time, ENT_QUOTES, 'UTF-8');
$check = htmlspecialchars($check, ENT_QUOTES, 'UTF-8');

if($check) {
echo '返却';
}else{
echo '未返却';
}
$dsn = 'mysql:dbname = zpdb; host=localhost; charset = utf8mb4';
$user = 'root';
$password = 'Ice42219';

try {
$dbh = new PDO($dsn, $user, $password);
echo 'DB接続';
} catch (PDOException $e) {
die('Connect Error: ' . $e-> getCode());
echo '繋がってないぞ';
}


$sql = 'SELECT lost_infomation_id FROM lost_infomation';
$sth = $dbh->prepare($sql);
$sth -> execute();

while($row = $sth -> fetch(PDO::FETCH_ASSOC)) {
echo htmlspecialchars($row['lost_infomation_id'], ENT_QUOTES, 'UTF-8');
echo 'うわあああ';
echo '<br>', PHP_EOL;
echo $row;
}


?>
</body>

</html>