<?
Class Router{
	
	public function get_controller($url)
	{
		//Разбираем адресную строку
		$inp_arr = explode("?", $url);
		
		//Класс и метод
		$controller_str = $inp_arr[0];
		$controller_arr = explode('/', $controller_str);

		$class = $this->get_name_class($controller_arr);
		$function = $this->get_name_function($controller_arr);
		
		//Если есть, то гет параметры
		if(isset($inp_arr[1]) && $inp_arr[1] != '')
		{
			$get_str = $inp_arr[1];
			$parameters = $this->get_pameters($get_str);
		} else {
			$parameters = array();
		}
		
		return array("class" => $class, "function" => $function, "parameters" => $parameters);
	}
	
	public function get_name_class($inp_arr)
	{
		if(isset($inp_arr[2]) && $inp_arr[2] != '')
		{
			if(file_exists('./class/'.$inp_arr[2].'.php'))
			{
				return $inp_arr[2];
			} else {
				return "page_404";
			}
		} else {
			return "index";
		}
	}
	
	public function get_name_function($inp_arr)
	{
		if(isset($inp_arr[3]) && $inp_arr[3] != '')
		{
			return $inp_arr[3];
		} else {
			return "run";
		}
	}
	
	public function get_pameters($get_str)
	{
		$result = array();
		$inp_arr = explode('&', $get_str);
		
		foreach($inp_arr as $str)
		{
			$arr_param = explode('=', $str);
			
			$key = $arr_param[0];
			if(isset($arr_param[1]))
			{
				$val = $arr_param[1];
			} else {
				$val = "";
			}
			$result[$key] = $val;
		}
		
		return $result;
	}	
}