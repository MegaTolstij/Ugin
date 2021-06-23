<?
Class general
{
	public $base; // БД
	public $title = "Административная часть PrintShop.t45.su"; // Title страницы
	public $css = array // Список стилей
	(
		"css/bootstrap.css",
		"css/style.css"
	);
	public $js = array // Список файлов js
	(
		"js/jquery-3.1.1.min.js",
		"js/bootstrap.js"
	);
	public $bread_crumbs = array // Хлебные крошки
	(
		array
		(
			"href"	=> loc,
			"name"	=> "Главная"
		)
	);
	public $extensions; // Расширения
	public $data; // Данные страницы
	
	public function start($base)
	{
		$this->base = $base;
	}
	
	//Подключаем нужную модель
	public function model($name_model, $data)
	{
		$model_arr = explode('|', $name_model);
		
		$url = $model_arr[0];
		
		$name_class_arr = explode('/', $url);
		
		$name_class = $name_class_arr[count($name_class_arr) - 1];
		
		$method = $model_arr[1];
		
		include_once "./model/$url.php";
		$model = new $name_class();
		$model->base = $this->base;
		$result = $model->$method();
		return $result;
	}
	
	//Рендерит шаблон
	public function render($adress_shablon, $data)
	{
		if(file_exists("./html/".$adress_shablon.".tpl")){
			ob_start();
			extract($data);
			require "./html/".$adress_shablon.".tpl";
			return ob_get_clean();
		} else {
			return false;
		}
	}
	
	//Передаем шаблон "стандартного" хедера
	public function header($data = array())
	{
		$data = array
		(
			"title"			=> $this->title,
			"css"			=> $this->css,
			"js"			=> $this->js,
			"bread_crumbs"	=> $this->bread_crumbs,
			"main_menu"		=> $this->get_main_menu()
		);
		$html = $this->render("header", $data);
		return $html;
	}
	
	//Передаем в шаблон дополнительные стили CSS
	public function css($array = array())
	{
		$result = "";
		
		foreach($array as $css_item)
		{
			$result .= "<link href=\"css/$css_item\" rel=\"stylesheet\">";
		}
		
		return $result;
	}
	
	// Главное меню
	public function get_main_menu()
	{
		$data_menu = $this->model("/menu|main", array());
		return $data_menu;
	}
	
	//Передаем шаблон "стандартного" футера
	public function footer($data = array())
	{
		$html = $this->render("footer", $data);
		return $html;
	}
}