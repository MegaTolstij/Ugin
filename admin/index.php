<?
//Подключаем базу данных
try{
	require_once "../system/conf.php";
	require_once "../system/table_class.php";
	$base = new tableBase();
} catch(Exception $e) {
	exit($e->getMessage());
}

//Подключаем основной класс
require_once "../system/main_class.php";
$main_class = new general();

//Подключаем роутер
require_once "./system/router_class.php";

$router = new Router();

//Выбираем нужный контроллер
$arr_class = $router->get_controller($_SERVER['REQUEST_URI']);

//Подключаем нужный контроллер
spl_autoload_register(function ($class_name) {
    include_once "./controller/".$class_name . '.php';
});

$controller = new $arr_class['class']();
$controller->start($base);

//Проверяем, существует ли метод
if(method_exists($controller, $arr_class['function']))
{
	$method = $arr_class['function'];
} else {
	$method = "index";
}

$html = $controller->$method($arr_class['parameters']);

echo $html;