<?php
$show = "";
$showErr =  "";
include 'connection.php';
session_start();
if (isset($_SESSION['name'])) {
    $show = $_SESSION['name'];
} else {
    $showErr = "Welcome Guest";
}


$check = 'select * from employee_info';
$result = mysqli_query($conn, $check);
if ($result) {
    $row = mysqli_num_rows($result);
}
/*total attendance*/
$atten = 'select * from attendance';
$res = mysqli_query($conn, $atten);
if ($res) {
    $num = mysqli_num_rows($res);
    $num_percent = ($num) * 100;
} else {
    $num_percent = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="bg-primary position-sticky ">
        <div class="sidebar-header">
            <h2>Reliance Financial <br>Services Limited</h2>
        </div>
        <ul class="sidebar-menu my-1">
            <li class="active p-3">
                <i class="bi bi-sliders"></i>
                <a href="">Dashboard</a>
            </li>
            <li class="p-3"><i class="bi bi-people-fill"></i><a href="employees.php">All Employees</a>
            </li>
            <li class="p-3">
                <i class="bi bi-microsoft-teams"></i>
                <a href="department.php">All Department</a>
            </li>
            <li class="p-3">
                <i class="bi bi-calendar-check"></i>
                <a href="attendance.php">Attendance</a>
            </li>
            <li class="p-3">
                <i class="bi bi-credit-card-2-back"></i>
                <a href="payroll.php">
                    Payroll</a>
            </li>
            <li class="p-3">
                <i class="bi bi-tree"></i>
                <a href="vacation.php">
                    Vacations</a>
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
                <h2>Hello <?php echo $show; ?> 👋</h2>
            </div>
            <div class="header-right">
                <input type="search" class="form-control" placeholder="Search">
            </div>
            <div class="profile">
                <img src="https://via.placeholder.com/40" alt="Profile Picture">
                <span><?php echo $show ?></span>
            </div>
        </div>
        <section class="stats">
            <div class="stat-card bg-primary text-white">
                <p class="text-white">Total Employee</p>
                <h3><?php echo $row; ?></h3>
            </div>
            <div class="stat-card">
                <p>Total Applicant</p>
                <h3>1050</h3>
                <span class="percentage up">5%</span>
            </div>
            <div class="stat-card bg-success text-white">
                <p class="text-white">On Time</p>
                <h3>0</h3>
            </div>
            <div class="stat-card bg-danger text-white">
                <p class="text-white">Late</p>
                <h3>0</h3>
            </div>
        </section>
        <section class="attendance">
            <div class="attendance-chart">
                <h3>Attendance Overview</h3>
                <img src="https://via.placeholder.com/400x200" alt="Attendance Chart">
            </div>
            <div class="attendance-list">
                <h3>Attendance Overview</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Type</th>
                            <th>Check In Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Leslie Watson</td>
                            <td>Team Lead - Design</td>
                            <td>Office</td>
                            <td>09:27 AM</td>
                            <td class="status on-time">On Time</td>
                        </tr>
                        <tr>
                            <td>Darlene Robertson</td>
                            <td>Web Designer</td>
                            <td>Office</td>
                            <td>10:15 AM</td>
                            <td class="status late">Late</td>
                        </tr>
                        <tr>
                            <td>Jacob Jones</td>
                            <td>Medical Assistant</td>
                            <td>Remote</td>
                            <td>10:24 AM</td>
                            <td class="status late">Late</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script src="scripts.js"></script>
</body>

</html>