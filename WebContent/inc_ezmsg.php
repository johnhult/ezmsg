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

	public static function getAllPersons($groupId) {

		$result = array();
		$con = Db::connect();

		if (isset($groupId)) {
			$sql = 'select p.id, concat(p.first_name, " ", p.last_name), p.color, p.picture from person p, group_person gp where gp.person_id = p.id and gp.group_id = ? order by first_name asc, last_name asc';
		} else {
			$sql = 'select id, concat(first_name, " ", last_name), color, picture from person order by first_name asc, last_name asc';
		}
		$stmt = $con->prepare($sql);
		if (isset($groupId)) {
			$stmt->bind_param("s", $groupId);
		}
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

	public static function getUserInformation($email, $password) {

		$con = Db::connect();

		$sql = 'select id, admin, picture from person where email = ? and password = ?';
		$stmt = $con->prepare($sql);
		$stmt->bind_param('ss', $email, $password);
		$stmt->execute();
		$stmt->bind_result($id, $admin, $picture);
		$stmt->store_result();
		if ($stmt->fetch()) {
			$result = array('id' => $id, 'admin' => ($admin == '1' ? true : false), 'picture' => $picture);
		}
		$stmt->close();
		$con->close();

		return $result;
	}

	public static function getMessagesForUser($fromUser, $toUser, $lastMessage) {

		$result = array();
		$con = Db::connect();

		if (isset($lastMessage)) {
			$sql = 'select m.from_person_id, m.message, m.time, m.counter from message m where m.counter > ? and m.from_person_id in (?, ?) and m.to_person_id in (?, ?) order by counter asc';
		} else {
			$sql = 'select * from (select m.from_person_id, m.message, m.time, m.counter from message m where m.from_person_id in (?, ?) and m.to_person_id in (?, ?) order by counter desc limit 10) as the_table order by counter asc';
		}
		$stmt = $con->prepare($sql);
		if (isset($lastMessage)) {
			$stmt->bind_param('issss', $lastMessage, $fromUser, $toUser, $fromUser, $toUser);
		} else {
			$stmt->bind_param('ssss', $fromUser, $toUser, $fromUser, $toUser);
		}
		$stmt->execute();
		$stmt->bind_result($from, $message, $time, $counter);
		$stmt->store_result();
		while ($stmt->fetch()) {
			$result[] = array('from' => $from, 'message' => $message, 'time' => $time, 'counter' => $counter);
		}
		$stmt->close();
		$con->close();

		return $result;
	}

	public static function getUnreadMessageFor($toUser) {

		$result = array();
		$con = Db::connect();

		$sql = 'select m.from_person_id, count(m.from_person_id) from message m where m.read = 0 and m.to_person_id = (?) group by m.from_person_id';
		$stmt = $con->prepare($sql);
		$stmt->bind_param('s', $toUser);
		$stmt->execute();
		$stmt->bind_result($from, $counter);
		$stmt->store_result();
		while ($stmt->fetch()) {
			$result[] = array('from' => $from, 'counter' => $counter);
		}
		$stmt->close();
		$con->close();

		return $result;
	}

	public static function newMessageForUser($fromUser, $toUser, $message) {

		$result = array();
		$con = Db::connect();

		$sql = 'insert into message (from_person_id, to_person_id, message) values (?, ?, ?)';
		$stmt = $con->prepare($sql);
		$stmt->bind_param('sss', $fromUser, $toUser, $message);
		$stmt->execute();
		$stmt->close();
		$con->close();
	}
}
?>
