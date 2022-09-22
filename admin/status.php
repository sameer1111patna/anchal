<?php
include "inc/link.php";
$id=$_POST['id'];
$status=$_POST['status'];

$studentQuery = "UPDATE activity_tb SET status='$status' WHERE id='$id'";
$result = $classhelper->db_con->query($studentQuery);

echo json_encode($result);

?>