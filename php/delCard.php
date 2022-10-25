<?php
require '../config/local.php';
$sql = "delete from card where id in (";
foreach ($_POST as $p) 
{
	$sql .= "$p,";
}
$sql = substr($sql, 0, strlen($sql)-1).")";
$con->query($sql);
?>
<script>
	window.location = "../html/changecard.html";
</script>