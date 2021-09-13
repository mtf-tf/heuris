<?php
 
//データベース接続
$server = "localhost";  
$userName = "root"; 
$password = "sakonndesu"; 
$dbName = "world";
 
$mysqli = new mysqli($server, $userName, $password,$dbName);
 
if ($mysqli->connect_error){
	echo $mysqli->connect_error;
	exit();
}else{
	$mysqli->set_charset("utf-8");
}
 
$sql = "SELECT * FROM city";
 
$result = $mysqli -> query($sql);
 
//クエリー失敗
if(!$result) {
	echo $mysqli->error;
	exit();
}
 
//レコード件数
$row_count = $result->num_rows;
 
//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
	$rows[] = $row;
}
 
//結果セットを解放
$result->free();
 
// データベース切断
$mysqli->close();
 
?>
 
<!DOCTYPE html>
<html>
<head>
<title>city</title>
<meta charset="utf-8">
</head>
<body>
<h1>city table view</h1> 
 
レコード件数：<?php echo $row_count; ?>
 
<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>CountryCode</th>
<th>District</th>
<th>Population</th>
</tr>
 
<?php 
foreach($rows as $row){
?> 
<tr> 
	<td><?php echo $row['ID']; ?></td> 
	<td><?php echo htmlspecialchars($row['Name'],ENT_QUOTES,'UTF-8'); ?></td> 
	<td><?php echo htmlspecialchars($row['CountryCode'],ENT_QUOTES,'UTF-8'); ?></td> 
	<td><?php echo htmlspecialchars($row['District'],ENT_QUOTES,'UTF-8'); ?></td> 
	<td><?php echo htmlspecialchars($row['Population'],ENT_QUOTES,'UTF-8'); ?></td> 
</tr> 
<?php 
} 
?>
 
</table>
 
</body>
</html>