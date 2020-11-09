<?php
 
// подключаем db_connect класс
require_once __DIR__ . '/db_connect.php';
echo("It's working!");

// подключаемся к БД
$db = new DB_CONNECT();
$con = $db->connect();

mysqli_set_charset($con,'utf8' );

// выполняем запрос
$r = mysqli_query($con,"SELECT * FROM `drivers`") or die(mysqli_error($con));
 
 // проверка на пустой результат
if (mysqli_num_rows($r) > 0) 
{
	while($row=mysqli_fetch_array($r))
	{
		// заносим данне в массив
    		$Driver['driver_id'] = $row['driver_id'];
		$Driver['surname'] = $row['surname'];
		$Driver['first_name'] = $row['first_name'];
		$Driver['patronymic'] = $row['patronymic'];
	
	}
}

echo (json_encode($Driver));
 
?>
