<?php
$show = "";
$showErr =  "";
include 'connection.php';
session_start();
$ids = $_SESSION['id'];
$sh = "SELECT * FROM hr WHERE id = '$ids'";
$sh1 = mysqli_query($conn, $sh);


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
$dataPoints = array(
    array("x" => 10, "y" => 41),
    array("x" => 20, "y" => 35, "indexLabel" => "Lowest"),
    array("x" => 30, "y" => 50),
    array("x" => 40, "y" => 45),
    array("x" => 50, "y" => 52),
    array("x" => 60, "y" => 68),
    array("x" => 70, "y" => 38),
    array("x" => 80, "y" => 71, "indexLabel" => "Highest"),
    array("x" => 90, "y" => 52),
    array("x" => 100, "y" => 60),
    array("x" => 110, "y" => 36),
    array("x" => 120, "y" => 49),
    array("x" => 130, "y" => 41)
);

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

<body class="bg-white">
    <div class="bg-secondary position-sticky ">
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
            <li class="p-3">
                <i class="bi bi-chat-left-dots"></i>
                <a href="send.php">Send Message</a>
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
                <?php foreach ($sh1 as $key) : ?>

                    <h2>Hello <?php echo $key['First']; ?> 👋</h2>
            </div>
            <div class="header-right">
                <input type="search" class="form-control" placeholder="Search">
            </div>
            <div class="profile">
                <a href="" class="btn btn-success m-2">POSITION: HR</a>
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userForm"><?php echo $key['First']; ?> </a>
            </div>
        </div>
        <hr>
        <section class="stats">
            <div class="stat-card bg-primary text-white">
                <p class="text-white">Total Employee</p>
                <h3><?php echo $row; ?></h3>
            </div>
            <div class="stat-card p-2 bg-warning">
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
                <script>
                    window.onload = function() {

                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            exportEnabled: true,
                            theme: "light1", // "light1", "light2", "dark1", "dark2"
                            title: {
                                text: "Employee Chart"
                            },
                            axisY: {
                                includeZero: true
                            },
                            data: [{
                                type: "column", //change type to bar, line, area, pie, etc
                                //indexLabel: "{y}", //Shows y value on all Data Points
                                indexLabelFontColor: "#5A5757",
                                indexLabelPlacement: "outside",
                                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart.render();

                    }
                </script>
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


        <!--Modal Form-->
        <div class="modal fade" id="userForm">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Employee
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="" id="myForm" method="post">

                            <div class="inputField">
                                <div>
                                    <label for="pickupLocation" class="form-label">First:</label>
                                    <input type="text" id="pickupLocation" name="id" class="form-control" value="<?php echo $key['First']; ?>" placeholder="Enter Attendance ID" readonly>
                                </div>
                                <div>
                                    <label for="dropOffLocation" class="form-label">Last Name:</label>
                                    <input type="text" id="dropOffLocation" name="name" class="form-control" value="<?php echo $key['last']; ?>" readonly>
                                </div>
                                <div>
                                    <label for="pickupTime" class="form-label">Email:</label>
                                    <input type="text" id="pickupTime" name="address" class="form-control" value="<?php echo $key['email']; ?>" readonly>
                                </div>
                                <div>
                                    <label for="pickupTime" class="form-label">Number:</label>
                                    <input type="num" id="pickupTime" name="num" class="form-control" value="<?php echo $key['mobile']; ?>" readonly>
                                </div>


                            </div>

                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="myForm" class="btn btn-primary" name="add">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </main>

    <script src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <div id="chartContainer" style="height: 300px; width: 30%; position:absolute; top:50%; left:20%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</body>

</html>