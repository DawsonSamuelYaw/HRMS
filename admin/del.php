<?php
include 'connection.php';


$id = $_GET['employee_id'];
$sql = "DELETE FROM employee_info WHERE employee_id = '$id' ";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("Location: employees.php");
} else {
    echo "Connection" . mysqli_error($conn);
}
