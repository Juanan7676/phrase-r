<?php

require dirname(dirname(__FILE__)).'/config/sqlParams.php';

function handler($errno,$errstr)
{
	debug_print_backtrace();
}

class SQLConnection
{
	private $conn;
	private $closed;
	public function __construct()
	{
		$this->closed = false;
		$this->conn=new mysqli(__SQL_IP,__SQL_USER,__SQL_PASSWORD,__SQL_DB);
		$this->conn->set_charset("utf8");
		if ($this->conn->connect_error) die("Error al conectar a la base de datos MySQL");
	}
	
	public function pquery($sql, ...$params)
	{
		set_error_handler("handler",E_ALL);
		if (!$this->closed)
		{
			$stmt = $this->conn->prepare($sql);
			if (!$stmt)
				die("Error al preparar la consulta! :" . $sql);
			$tipos = "";
			foreach($params as $param)
			{
				if (is_int($param))
					$tipos .= 'i';
				else if (is_string($param))
					$tipos .= 's';
				else if (is_double($param))
					$tipos .= 'd';
				else
				{
					echo "Error: argumento no soportado: ";
					var_dump($param);
					die();
				}
			}
			if (sizeof($params)>0)
				$stmt->bind_param($tipos,...$params);
			$stmt->execute();
			return $stmt;
		}
		return 0;
	}
	
	public function close()
	{
		$this->conn->close();
		$this->closed = true;
	}
}
?>