<?php
require '../config/local.php';
$result = $con->query($_POST['sql']);
if ($result->num_rows > 0) {
	while ($rows = $result->fetch_assoc())
	{
		$reply[] = $rows;
	}
}
echo json_encode($reply);