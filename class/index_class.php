<?
Class index extends general
{
	public function run($parameters)
	{
		$html = $this->render("header_index", array());
		return $html;
	}
}