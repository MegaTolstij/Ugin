<?
//Подключаем базу данных
try{
	require "./class/conf.php";
	require "./class/table_class.php";
	$base = new tableBase();
} catch(Exception $e) {
	exit($e->getMessage());
}

//Подключаем основной класс
require "./class/main_class.php";
$main_class = new general();

//Подключаем роутер
require "./class/router_class.php";

$router = new Router();

//Выбираем нужный контроллер
$arr_class = $router->get_controller($_SERVER['REQUEST_URI']);

echo "<pre>";
print_r($arr_class);
echo "</pre>";

//Подключаем нужный контроллер
include_once "./class/".$arr_class['class']."_class.php";
$controller = new $arr_class['class']();
$controller->start($base);

//Проверяем, существует ли метод
if(method_exists($controller, $arr_class['function']))
{
	$method = $arr_class['function'];
} else {
	$method = "run";
}

$html = $controller->$method($arr_class['parameters']);

echo $html;