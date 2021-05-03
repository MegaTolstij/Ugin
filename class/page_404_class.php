<?
Class page_404 extends general
{
	public function run($parameters)
	{
		$html = $this->header(array());
		
		$html .= $this->footer(array());
		return $html;
	}
}