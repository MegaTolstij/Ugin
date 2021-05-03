<?
Class general
{
	public $base;
	
	public function start($base)
	{
		$this->base = $base;
	}
	
	public function model($name_model, $data)
	{
		return array();
	}
	
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
	
	public function header($data = array())
	{
		$html = $this->render("header", $data);
		return $html;
	}
	
	public function footer($data = array())
	{
		$html = $this->render("footer", $data);
		return $html;
	}
}