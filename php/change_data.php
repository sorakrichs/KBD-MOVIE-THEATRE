<?php
require	'../config/local.php';
$id = $_POST['id'];
$sql = "update ".$_POST['role']." set ";
unset($_POST['role'], $_POST['id']);
foreach ($_POST as $key => $value)
{
	$sql .= "$key = '$value',";
}
$sql = substr($sql, 0, strlen($sql)-1);
$sql .= " where id = $id";
$con->query($sql);
?>
<script>
	window.location = "../";
</script>