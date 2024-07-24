<?php
include 'connection.php';

$sql = "select * from department";
$data = mysqli_query($conn, $sql);

if (isset($_POST['sub'])) {
    $dep = $_POST['dep'];

    $sql = "insert into department (department_name) value ('$dep')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:department.php');
    } else {
        echo "Enter the department again";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="bg-primary">
        <div class="sidebar-header">
            <h2>Reliance Financial <br>Services Limited</h2>
        </div>
        <ul class="sidebar-menu">
            <li class="p-3">
                <i class="bi bi-sliders"></i>
                <a href="index.php">Dashboard</a>
            </li>
            <li class="p-3"><i class="bi bi-people-fill"></i><a href="employees.php">All Employees</a>
            </li>
            <li class="active p3">
                <i class="bi bi-microsoft-teams"></i>
                <a href="department.php">All Department</a>
            </li>
            <li class="p-3">
                <i class="bi bi-calendar-check"></i>
                <a href="attendance.php">
                    Attendance</a>
            </li>
            <li class="p-3">
                <i class="bi bi-credit-card-2-back"></i>
                <a href="payroll.php">
                    Payroll</a>
            </li>
            <li class="p-3">
                <i class="bi bi-tree"></i>
                <a href="vacation.php">Vacations</a>
            </li>
            <li class="p-3">
                <i class="bi bi-person-raised-hand"></i>
                <a href="training.php">Training</a>
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
                <h4>All Department</h4>
                <p>All department information</p>
            </div>

            <div class="profile">
                <img src="https://via.placeholder.com/40" alt="Profile Picture">
                <span>Robert Allen</span>
            </div>
        </div>

        <section class="container">
            <div id="section-main">
                <div class="header-right">
                    <input type="search" placeholder="Search" class="form-control ">
                </div>
                <div class="section-right">
                    <button class="btn btn-primary newUser" data-bs-toggle="modal" data-bs-target="#userForm">ADD DEPARTMENT <i class="bi bi-people"></i></button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($data as $item) : ?>
                    <tbody>
                        <tr>
                            <td><?php echo $item['department_name'] ?></td>
                            <td>
                                <a href="/sem/admin/del.php?id=<?php echo $item['id'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="/sem/admin/edit_dep.php?id=<?php echo $item['id'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
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
                        <h4 class="modal-title">Department
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="" id="myForm" method="post">

                            <div class="inputField">
                                <div>
                                    <label for="pickupLocation" class="form-label">Department:</label>
                                    <input type="text" id="pickupLocation" name="dep" class="form-control" placeholder="Enter Department">
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