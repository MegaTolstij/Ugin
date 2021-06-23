<?
Class menu
{
	public $base;

public function main()
{
	$sql = "SELECT * FROM `menu_main` WHERE 1 ORDER BY sort";
	$data_menu = $this->base->custom($sql);
	return $data_menu;
}

}