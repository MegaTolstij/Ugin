<?
Class index extends general
{
	public function run($parameters = array())
	{	
		/* $this->bread_crumbs[] = array
		(
			"href"	=> loc."124",
			"name"	=> "Проверка"
		); */
		
		//$this->css[] = "css/111.css";
		//$this->js[] = "js/111.js";
		
		$html = $this->header();
		
		$data = array();
		
		$html .= $this->render("index", $data);
		
		$footer_data = array();
		
		$html .= $this->footer();
		return $html;
	}
}