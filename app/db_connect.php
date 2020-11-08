<?php

/**
 * Класс для подключения к БД
 */
class DB_CONNECT 
{
	static $con;
	
    // Конструктор
    function __construct() 
	{
        // Соеденение с БД
        // $this->connect();
    }
 
    // дуструктор
    function __destruct() 
	{
        // закрываем соеденение с БД
        $this->close();
    }
 
    /**
     * Функция соеденения с БД
     */
    function connect() 
	{
        // импортируем переменные для подклчения к БД
        require_once __DIR__ . '/db_config.php';
 
        // Подключаемся к БД
        global $con;
		$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysqli_error($con));
 
        // выбираем БД
        $db = mysqli_select_db($con, DB_DATABASE) or die(mysqli_error($con)) or die(mysqli_error($con));
 
        // возвращаем соеденение
        return $con;
    }
 
    /**
     * Функция закрытия соеденения
     */
    function close() 
	{
        // Закрываем соеденение с БД
		global $con;
        mysqli_close($con);
    }
}
?>