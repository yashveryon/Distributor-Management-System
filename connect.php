<?php
class connect
{
	private $username="root";
	private $password="";
	private $database="distributor";
	private $server="localhost";
	protected $db_handle;
	public function __construct()
	{
		$this->db_handle=mysqli_connect($this->server,$this->username,$this->password,$this->database);
	}
}
?>
		
	