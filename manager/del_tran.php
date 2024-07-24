<?php
include 'connection.php';


$id = $_GET['traning_id'];
$sql = "DELETE FROM traning WHERE traning_id = '$id' ";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("Location: training.php");
} else {
    echo "Connection" . mysqli_error($conn);
}
