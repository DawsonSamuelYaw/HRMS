<?php
include 'connection.php';

$sql = "select * from user_atten";
$data = mysqli_query($conn, $sql);

$id = $time = $date = "";
$iErr = $timeErr = $dateErr = "";
$err = "";

if (isset($_POST['sub'])) {
    $id = $_POST['atten'];
    $time = $_POST['tm'];
    $date = $_POST['dte'];
    $em_id = "SELECT * from user_atten where id = '$id'";
    $em = mysqli_query($conn, $em_id);
    if ($em) {
        $num = mysqli_num_rows($em);
        if ($num > 1) {
            $err = '<div class="alert alert-warning alert-dismissible fade show " role="alert">
        <strong>ID does not exist in the system</strong>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 
      </div>';
        } else {
            $insert = "INSERT INTO user_atten (id,date,time) VALUES ('$id', '$date' , '$time')";
            $result = mysqli_query($conn, $insert);
            if ($result) {
                header('location:attendance.php');
            }
        }
    }
}
