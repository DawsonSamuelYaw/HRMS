<?php
$show = "";
$showErr =  "";
include 'connection.php';
session_start();
$id = $_SESSION['employee_id'];
$sel = " SELECT * FROM employee_info where employee_id = '$id'";
$result = mysqli_query($conn, $sel);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-white">
    <div class="bg-secondary ">
        <div class="sidebar-header">
            <h2>Reliance Financial <br>Services Limited</h2>
        </div>
        <ul class="sidebar-menu my-1">
            <li class="active p-3">
                <i class="bi bi-sliders"></i>
                <a href="">Dashboard</a>
            </li>
            <li class="p-3"><i class="bi bi-people-fill"></i><a href="user_profile.php">User Profile</a>
            </li>
            <li class="p-3">
                <i class="bi bi-microsoft-teams"></i>
                <a href="vacation.php">New Vacation</a>
            </li>
            <li class="p-3">
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
                <a href="rules.php">
                    Rules Section</a>
            </li>
            <li class="my-4 p-3">
                <i class="bi bi-box-arrow-left"></i>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <?php foreach ($result as $key) : ?>
        <main class="main-content">
            <div class="header">
                <div class="header-text">
                    <h2>Hello <?php echo $key['employee_Name']; ?></h2>
                </div>
                <div class="header-right">
                    <input type="search" class="form-control" placeholder="Search">
                </div>
                <div class="profile">
                    <p><?php echo $key['department']; ?> | </p> <br>
                    <p><?php echo $key['employee_Name'] ?></p>
                </div>
            </div>
            <section class="stats">

                <div class="stat-card bg-success">
                    <p class="text-white">Attendance</p>

                </div>
                <div class="stat-card bg-primary">
                    <p>Total Projects</p>
                    <h3>250</h3>
                </div>
                <div class="stat-card bg-primary">
                    <p>Projects Completed</p>
                    <h3>250</h3>
                </div>
                <div class="stat-card bg-warning">
                    <p>Projects Not Completed</p>
                    <h3>250</h3>
                </div>

            <?php endforeach ?>
            </section>
            <!--         <section class="attendance">
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
        </section> -->
        </main>

        <script src="scripts.js"></script>
</body>

</html>