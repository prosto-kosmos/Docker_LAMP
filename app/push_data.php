<?php
 
// подключаем db_connect класс
require_once __DIR__ . '/db_connect.php';
 
// подключаемся к БД
$db = new DB_CONNECT();
$con = $db->connect();

mysqli_set_charset($con,'utf8' );

// получаем значения 
$MODE = $_REQUEST['MODE'];
$ID = $_REQUEST['ID'];
$SPEED = $_REQUEST['SPEED'];//надо проверить на пустоту
$RPM = $_REQUEST['RPM'];//надо проверить на пустоту

if ($MODE == "insert"){
	$query = "INSERT INTO `logs` (`driver_id`, `speed`, `rpm`) VALUES ($ID,'$SPEED','$RPM');";
	$r1 = mysqli_query($con,$query) or exit("no_id");
	echo "ok";
}
if ($MODE == "connect"){
	$query_get_driver = "select surname, first_name, patronymic from drivers where driver_id=$ID;";
	$r2 = mysqli_query($con,$query_get_driver) or die("no_id");
	$array = $r2->fetch_assoc();
	
	if ($array['surname'] != ""){
		echo $array['surname'] . " " . $array['first_name'] . " " . $array['patronymic'];
	}
	else {
		echo "no_id";
	}
	
}

?>
