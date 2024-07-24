<?php
include 'connection.php';

$sql = "select * from traning";
$data = mysqli_query($conn, $sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Dashboard</title>
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
            <li class="p-3">
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
            <li class="active p-3">
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
                <h4>All Training</h4>
                <p>All training information</p>
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
                    <a type="button" class="btn btn-primary" href="/sem/admin/train_add.php"> <i class="bi bi-plus" name="add"></i>Add Training</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Training ID</th>
                        <th>Training Title</th>
                        <th>Training Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($data as $item) : ?>
                    <tbody>
                        <tr>
                            <td><?php echo $item['traning_id'] ?></td>
                            <td><?php echo $item['Training_title'] ?></td>
                            <td><?php echo $item['Training_description'] ?></td>
                            <td>
                                <a href="/sem/admin/del_tran.php?traning_id=<?php echo $item['traning_id'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="/sem/admin/edit_dep.php?traning_id=<?php echo $item['traning_id'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>

                    </tbody>
                <?php endforeach ?>
            </table>

        </section>
    </main>

    <script src="scripts.js"></script>
</body>

</html>