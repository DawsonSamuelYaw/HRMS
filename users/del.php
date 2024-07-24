<?php
include 'connection.php';


$id = $_GET['vacation_id'];
$sql = "DELETE FROM vacation WHERE vacation_id = '$id' ";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("Location: employees.php");
} else {
    echo "Connection" . mysqli_error($conn);
}
