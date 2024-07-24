<?php
include 'connection.php';

$sql = "select * from vacation";
$data = mysqli_query($conn, $sql);

$vacation_id = $vacation_title = $vacation_from = $vacation_to = "";
$vacation_idErr = $vacation_titleErr = $vacation_fromErr = $vacation_toErr = "";


session_start();
if (isset($_SESSION['employee_Name']) &&  isset($_SESSION['department'])) {
    $show = $_SESSION['employee_Name'];
    $shw = $_SESSION['department'];
} else {
    $showErr = "Welcome Guest";
}
if (isset($_POST['sub'])) {
    $vacation_id = $_POST['id'];
    $vacation_title = $_POST['title'];
    $vacation_from = $_POST['from'];
    $vacation_to = $_POST['to'];


    if (empty($_POST['id'])) {
        $vacation_idErr = "This field is required";
    } else {
        $vacation_id = $_POST['id'];
    }
    if (empty($_POST['title'])) {
        $vacation_titleErr = "This field is required";
    } else {
        $vacation_title = $_POST['title'];
    }
    if (empty($_POST['from'])) {
        $vacation_fromErr = "This field is required";
    } else {
        $vacation_from = $_POST['from'];
    }
    if (empty($_POST['to'])) {
        $vacation_toErr = "This field is required";
    } else {
        $vacation_to = $_POST['to'];
    }


    if (empty($vacation_idErr) && empty($vacation_titleErr) && empty($vacation_fromErr) && empty($vacation_toErr)) {
        /*push the data collected to the database*/
        $collected = "insert into vacation (vacation_id, vacation_title, vacation_from,vacation_to) values ('$vacation_id', '$vacation_title','$vacation_from', '$vacation_to')";
        $result = mysqli_query($conn, $collected);
        if ($result) {
            header("location: vacation.php");
        } else {
            echo "Error: " . $collected . "<br>" . mysqli_error($conn);
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Dashboard</title>
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
            <li class="p-3">
                <i class="bi bi-sliders"></i>
                <a href="index.php">Dashboard</a>
            </li>
            <li class="p-3"><i class="bi bi-people-fill"></i><a href="user_profile.php">User Profile</a>
            </li>
            <li class="p-3">
                <i class="bi bi-microsoft-teams"></i>
                <a href="vacation.php">New Vacation</a>
            </li>
            <li class="active p-3">
                <i class="bi bi-calendar-check"></i>
                <a href="evaluation.php">New Evaluation</a>
            </li>
            <li class="p-3">
                <i class="bi bi-credit-card-2-back"></i>
                <a href="attendance.php">
                    Attendance</a>
            </li>
            <li class="p-3">
                <i class="bi bi-credit-card-2-back"></i>
                <a href="payroll.php">
                    Rules Section</a>
            </li>
            <li class="my-4 p-3">
                <i class="bi bi-box-arrow-left"></i>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <main class="main-content">
        <div class="header">
            <div class="header-text">
                <h4>All Vacation</h4>
                <p>All Vacation information</p>
            </div>
            <div class="profile">
                <p><?php echo $shw; ?> | </p> <br>
                <p><?php echo $show ?></p>
            </div>
        </div>
        <hr>

        <section class="container">
            <div id="section-main">
                <div class="header-right">
                    <input type="search" placeholder="Search" class="form-control ">
                </div>
                <div class="section-right">
                    <button class="btn btn-primary newUser" data-bs-toggle="modal" data-bs-target="#userForm">ADD VACATION <i class="bi bi-people"></i></button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Vacation ID</th>
                        <th>Vacation Title</th>
                        <th>Vacation From Date</th>
                        <th>Vacation To Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($data as $item) : ?>
                    <tbody>
                        <tr>
                            <td><?php echo $item['vacation_id'] ?></td>
                            <td><?php echo $item['vacation_title'] ?></td>
                            <td><?php echo $item['vacation_from'] ?></td>
                            <td><?php echo $item['vacation_to'] ?></td>
                            <td>
                                <a href="/sem/admin/del_vac.php?vacation_id=<?php echo $item['vacation_id'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="/sem/admin/del_vac.php?vacation_id=<?php echo $item['vacation_id'] ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>




                            </td>
                        </tr>

                    </tbody>
                <?php endforeach ?>
            </table>

        </section>
        <!--Modal Form-->
        <div class="modal fade" id="userForm">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Vacation
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="" id="myForm" method="post">

                            <div class="inputField">
                                <div>
                                    <label for="pickupLocation" class="form-label">Vacation ID:</label>
                                    <input type="text" id="pickupLocation" name="id" class="form-control" placeholder="Enter Attendance ID">
                                </div>
                                <div>
                                    <label for="dropOffLocation" class="form-label">Vacation Title:</label>
                                    <input type="Text" id="dropOffLocation" name="title" class="form-control">
                                </div>
                                <div>
                                    <label for="pickupTime" class="form-label">Date From:</label>
                                    <input type="date" id="pickupTime" name="from" class="form-control">
                                </div>
                                <div>
                                    <label for="pickupTime" class="form-label">Date To:</label>
                                    <input type="date" id="pickupTime" name="to" class="form-control">
                                </div>

                            </div>

                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="myForm" class="btn btn-primary" name="sub">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Read Data Modal-->
        <div class="modal fade" id="readData">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Profile</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="#" id="myForm">

                            <div class="inputField">
                                <div>
                                    <label for="name">Pick-up Location:</label>
                                    <input type="text" name="" id="showPick" disabled>
                                </div>
                                <div>
                                    <label for="time">Time:</label>
                                    <input type="time" name="" id="showTime" disabled>
                                </div>
                                <div>
                                    <label for="drop">Drop-off Location:</label>
                                    <input type="text" name="" id="showDrop" disabled>
                                </div>
                                <div>
                                    <label for="times">Time:</label>
                                    <input type="time" name="" id="showTimes" disabled>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="scripts.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>