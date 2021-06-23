<?php
//@session_start();

//Создаем класс, открываем соединение с таблицей

class tableBase{
	public static $base;
	
	public function __construct(){
		if(@(!self::$base = mysqli_connect(host,nameUs,paswDB,dbase))){
			throw new Exception('Ошибка подключения базы данных.');
		}
		self::$base->query("SET NAMES 'utf8'");
		
	}
	
	//Произвольный SQL запрос
	public static function custom($sql){
		$ob_custom = self::$base->query($sql);
		$result =  self::setArray($ob_custom);
		return $result;
	}
	
	//Создаем запись, по произвольному запросу
	public static function custom_into($sql){
		$ob_custom = self::$base->query($sql);
		$result =  self::setArray($ob_custom);
		return self::$base->insert_id;
	}
	
	//Возвращает выборку строки из таблицы
	public static function custom_one($sql){
		$ob_custom = self::$base->query($sql);
		
		if(is_object($ob_custom)){
			while(($row = $ob_custom->fetch_assoc())!=false){
				$result = $row;
			}			
			return $result;
		} else {
			return array();
		}
		//$result =  self::setArray($ob_custom);
	}
	
	//очищаем таблицы
	public static function clearTable($nameTable){
		self::$base->query('TRUNCATE TABLE '.$nameTable);
	}
	
	
	//Переводим полученные данные в масив
	private static function setArray($dataTable){
		$result = array();
		//print_r($result);
		if(is_object($dataTable)){
			while(($row=$dataTable->fetch_assoc())!=false){
				$result[]=$row;
			}			
			return $result;
		} else {
			return array();
		}
	}
	
	//Добавляем новую запись
	public static function setNewRecord($nameTable,$data){
		$row=0;
		//Перебирая входящий масив с данными, составляем строку SQL запроса
		foreach($data as $record){				
			$str='';
			$col='';
			$value='';
				foreach($record as $key=>$val){
					if($val!=''){
						$col.='`'.$key.'`,';
						$value.="'".$val."',";
					}
				}
			$col=substr($col,0,-1);
			$value=substr($value,0,-1);
			$str='INSERT INTO  `'.dbase."`.`".$nameTable."` (".$col.")VALUES (".$value.')';
			self::$base->query($str);
		}
		//Возвращаем ИД созданной записи
		return self::$base->insert_id;
	}
	
	
	//Редактируем запись
	public function setEditRecord($nameTable,$data,$id){
		$sum=0;
		foreach($data as $record){
			$str='';
			foreach($record as $key=>$val){
				$str='UPDATE  `'.dbase.'`.`'.$nameTable.'` SET  `'.$key."` = '".$val."' WHERE `".$nameTable.'`.`id` ='.$id;
				//echo "<h2>$str</h2>";
				if($this->base->query($str)){
				}
				else{
					return false;
				}
			}
		$sum++;
		}
	}
	
	public function __destruct(){
		self::$base->close();
	}
	
}
?>
