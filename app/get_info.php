<?php
 
// подключаем db_connect класс
require_once __DIR__ . '/db_connect.php';
 
// подключаемся к БД
$db = new DB_CONNECT();
$con = $db->connect();
// получаем значения 
$ID = $_REQUEST[ID];

//$ID = "1";
 
// выполняем запрос
$r = mysqli_query($con,"SELECT * FROM `books` WHERE ID = $ID") or die(mysqli_error($con));
 
 // проверка на пустой результат
if (mysqli_num_rows($r) > 0) 
{
	while($row=mysqli_fetch_array($r))
	{
		// заносим данне в массив
    	$User[id] = $row[id];
		$User[name] = $row[name];
		$User[author] = $row[author];
	
	}
}

echo (json_encode($User));
 
?>