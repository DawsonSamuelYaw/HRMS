<?php
include 'connection.php';
session_start();
$ids = $_SESSION['employee_id'];
$sql = "select * from employee_info where employee_id = $ids";
$data = mysqli_query($conn, $sql);



$id = $time = $date = "";
$iErr = $timeErr = $dateErr = "";
$err = "";

if (isset($_POST['sub'])) {
    $id = $_POST['atten'];
    $time = $_POST['tm'];
    $date = $_POST['dte'];
    $em_id = "SELECT employee_id from employee_info";
    $em = mysqli_query($conn, $em_id);

    if ($em_id == $id) {
        $insert = "INSERT INTO user_atten (id,date,time) VALUES ('$id', '$time' , '$date')";
        $result = mysqli_query($conn, $insert);
    } else {
        $err = '<div class="alert alert-warning alert-dismissible fade show " role="alert">
       <strong>ID does not exist in the system</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

     </div>';
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="bg-secondary ">
        <div class="sidebar-header">
            <h2>Reliance Financial <br>Services Limited</h2>
        </div>
        <ul class="sidebar-menu my-1">
            <li class=" p-3">
                <i class="bi bi-sliders"></i>
                <a href="index.php">Dashboard</a>
            </li>
            <li class="active p-3"><i class="bi bi-people-fill"></i><a href="user_profile.php">User Profile</a>
            </li>
            <li class="p-3">
                <i class="bi bi-microsoft-teams"></i>
                <a href="vacation.php">New Vacation</a>
            </li>
            <li class="p-3">
                <i class="bi bi-calendar-check"></i>
                <a href="evaluation.php">New Evaluation</a>
            </li>
            <li class="  p-3">
                <i class="bi bi-credit-card-2-back"></i>
                <a href="attendance.php">
                    Attendance</a>
            </li>
            <li class="my-4 p-3">
                <i class="bi bi-box-arrow-left"></i>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <main class="main-content">
        <h1>User Details</h1>
        <hr>
        <div class="d-flex justify-content-center align-items-center ">
            <?php foreach ($data as $key) : ?>

                <div class="shadow w-50 p-3 text-center">
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Name: </label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="<?php echo $key['employee_Name']; ?>" readonly>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Department: </label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="<?php echo $key['department']; ?>" readonly>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Address: </label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="<?php echo $key['address']; ?>" readonly>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Mobile Number: </label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="<?php echo $key['employee_mobile']; ?>" readonly>

                        </div>
                    </div>
                <?php endforeach; ?>
                <a href="edit.php" class="btn btn-primary">
                    Edit Profile
                </a>
                <a href="logout.php" class="btn btn-warning">
                    Logout
                </a>
                </div>
        </div>

        <script src="scripts.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>