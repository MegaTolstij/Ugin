<?
Class page_404 extends general
{
	public function run($parameters)
	{
		$html = $this->header(array());
		
		$html .= "<h1>404</h1>";
		
		$html .= $this->footer(array());
		return $html;
	}
}