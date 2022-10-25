<?php
require '../config/local.php';
$sql = "insert into complain (branch_id, date, name, email, telephone, description) values (";
$sql .= $_POST['branch'].",'".date('Y-m-d')."','".$_POST['name']."','".$_POST['email']."','".$_POST['tel']."','".$_POST['description']."')";
$con->query($sql);
echo $con->error;
?>
<script>
	window.location = "../";
</script>