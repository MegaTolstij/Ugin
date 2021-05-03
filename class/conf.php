<?
//define ($name, $value, $case_sen)

	define('dbase',"users"); //Имя БД
	define ('host',"localhost"); //Адрес хоста
	define('nameUs',"root"); //Имя пользователя БД
	define('paswDB',""); //Пароль БД
	define('prefDB',""); //Префикс БД
	define ('loc',"http://dom/dom3/"); //Домен сайта
	define ('nameService',"Название сервиса"); //Название сервиса
	define ('MyMail',"ftank@yandex.ru"); //Почта сервиса
	
	//Токен
	define ('start_token',"mom"); //Почта сервиса
	define ('end_token',"_v"); //Почта сервиса
	
	//Поправка на московское время (в секундах)
	define("time_moskov", 10800);
	
	//Функция конвертации даты из "2018-01-15" в юникс формат
	function convertDate($date){
		$date_arr = explode("-",$date);
		$day = $date_arr[2];
		$month = $date_arr[1];
		$year = $date_arr[0];
		$date_unix = mktime(0,0,0, $month, $day, $year);
		
		return ($date_unix);
	}
?>
