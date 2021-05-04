<?
Class api extends general
{
	public function run($parameters = array())
	{
		$data = array(
			"result"	=> "success",
			"text"		=> "Апи для управления базой пользователей"
		);
		
		return json_encode($data);
	}
}