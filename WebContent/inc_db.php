<?php
class Db {

	public static function connect() {
		$con = mysqli_connect('127.0.0.1', 'root', 'root', 'ezmsg');
		if (mysqli_connect_errno($con)) {
			throw new Exception('Could not connect to database: ' . mysqli_connect_error());
		}
		return $con;
	}
}
?>
