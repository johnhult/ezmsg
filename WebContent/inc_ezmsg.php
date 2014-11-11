<?php
if (!class_exists('Db')) {
	include('inc_db.php');
}

class EzMsg {

	public static function getAllGroups() {

		$result = array();
		$con = Db::connect();

		$sql = 'select id, name, color from groups order by name asc';
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($id, $name, $color);
		$stmt->store_result();
		while ($stmt->fetch()) {
			$result[] = array('id' => $id, 'name' => $name, 'color' => $color);
		}
		$stmt->close();
		$con->close();
			
		return $result;
	}

	public static function getAllPersons() {

		$result = array();
		$con = Db::connect();

		$sql = 'select id, concat(first_name, " ", last_name), color, picture from person order by first_name asc, last_name asc';
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($id, $name, $color, $picture);
		$stmt->store_result();
		while ($stmt->fetch()) {
			$result[] = array('id' => $id, 'name' => $name, 'color' => $color, 'picture' => $picture);
		}
		$stmt->close();
		$con->close();
			
		return $result;
	}
}
?>
