<?php
require "../config/local.php";
$sql = "select id, name_th, name_en, password, telephone, email, date_of_birth, citizen_id from customer where lower(email)='".$_POST['user']."' and id>1";
$result = $con->query($sql);
$rows = $result->fetch_assoc();
if ($result->num_rows > 0) {
	$reply['pass'] = $rows['password'];
}
$reply['role'] = "customer";
if (empty($reply['pass'])) {
	$sql = "select id, name_th, name_en, password, telephone, email, branch_id, date_of_birth from staff where lower(email)='".$_POST['user']."'";
	$result = $con->query($sql);
	$rows = $result->fetch_assoc();
	if ($result->num_rows > 0) {
		$reply['pass'] = $rows['password'];
	}
	$reply['role'] = "staff";
}
$reply['id'] = $rows['id'];
$reply['name_th'] = $rows['name_th'];
$reply['name_en'] = $rows['name_en'];
$reply['tel'] = $rows['telephone'];
$reply['email'] = $rows['email'];
$reply['branch_id'] = $rows['branch_id'];
$reply['dob'] = $rows['date_of_birth'];
$reply['cid'] = $rows['citizen_id'];

echo json_encode($reply);