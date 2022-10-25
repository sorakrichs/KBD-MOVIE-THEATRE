<?php
require '../config/local.php';
$sql = "update ".$_POST['role']." set password='".$_POST['pass']."' where id=".$_POST['id'];
$con->query($sql);
?>
<script>
	window.location = "../";
</script>