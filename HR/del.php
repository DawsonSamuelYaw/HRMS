<?php
include 'connection.php';


$id = $_GET['id'];
$sql = "DELETE FROM salary WHERE id = '$id' ";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("Location: payroll.php");
} else {
    echo "Connection" . mysqli_error($conn);
}
