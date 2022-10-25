<?php
require '../config/local.php';
$sql = "insert into ticket (card_id, show_time_id, seat_id) values (";
foreach (json_decode($_POST['seat_id'], 1) as $value)
{
	if (empty($value)) {
		continue;
	}
	$sql .= $_POST['card_id'].", ".$_POST['showtime_id'].", $value), (";
}
$sql = substr($sql, 0, strlen($sql)-3);
$con->query($sql);
?>
<script>
	alert("จองเสร็จสิ้น");
	window.location = "../";
</script>