<?php
include 'connection.php';


$id = $_GET['id'];
$sql = "DELETE FROM department WHERE id = '$id' ";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("Location:department.php");
} else {
    echo "Connection" . mysqli_error($conn);
}
