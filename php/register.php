<?php
require "../config/local.php";
$sql = "insert into customer (name_th, name_en, citizen_id, email, telephone, date_of_birth, password) values (";
foreach ($_POST as $key => $value)
{
	if ($key == "cardType1") {
		break;
	}
	$sql .= "'$value',";
}
$sql = substr($sql, 0, strlen($sql)-1);
$sql .= ")";
if ($con->query($sql) != true) {
	echo $con->error;
}

$sql = "select id from customer where citizen_id=".$_POST['cid'];
$result = $con->query($sql);
if ($result->num_rows > 0) {
	$id = $result->fetch_assoc()['id'];
}

$dob = new DateTime(date('Y-m-d'));
$dob->add(new DateInterval('P1Y'));
$bef = $dob->format('Y-m-d');
$sql = "insert into card (card_no, customer_id, type, expire_date, branch_id, point) values ";
$sql .= "('".$_POST["cardNumber1"]."','".$id."',".$_POST['cardType1'].",'".$bef."','".$_POST['branch_id']."',0)";
if (!empty($_POST["cardNumber2"])) {
	$sql .= ",('".$_POST["cardNumber2"]."','".$id."',".$_POST['cardType2'].",'".$bef."','".$_POST['branch_id']."',0)";
}
if (!empty($_POST["cardNumber3"])) {
	$sql .= ",('".$_POST["cardNumber3"]."','".$id."',".$_POST['cardType3'].",'".$bef."','".$_POST['branch_id']."',0)";
}
if ($con->query($sql) != true) {
	echo $con->error;
}
?>
<script>window.location = "../"</script>"