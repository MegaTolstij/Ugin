<?
//Системный класс

Class Sys{
	public $base;
	
	public function __construct($base)
	{
		$this->base = $base;
	}
	
	public function model($name, $data)
	{
		
	}
	
	public function controller($name, $data)
	{
		
	}
	
	public function view($name, $data)
	{
		if(file_exists("./html/".$name.".tpl")){
			ob_start();
			extract($data);
			require "./html/".$name.".tpl";
			return ob_get_clean();
		} else {
			return false;
		}
	}
}