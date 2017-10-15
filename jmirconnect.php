<?php
class myconnect
{
	public function myconn()
	{
$connection = new mysqli("localhost","root","","jmir_task");
return $connection;
	}
}
?>