<?php
include 'connection.php';

$sql = "select * from employee_info";
$data = mysqli_query($conn, $sql);

$departments = "select * from department";
$department = mysqli_query($conn, $departments);

$employee_id = $employee_name = $employee_pass = $employee_address = $employee_emp = $employee_num = "";
$employee_idErr = $employee_nameErr = $employee_passErr = $employee_addressErr = $employee_emErr = $employee_numErr = "";



if (isset($_POST['add'])) {
    $employee_id = $_POST['id'];
    $employee_name = $_POST['name'];
    $employee_em = $_POST['emp_position'];
    $employee_address = $_POST['address'];
    $employee_num = $_POST['num'];

    if (empty($_POST['id'])) {
        $employee_idErr = "This field is required";
    } else {
        $employee_id = $_POST['id'];
    }
    if (empty($_POST['name'])) {
        $employee_nameErr = "This field is required";
    } else {
        $employee_name = $_POST['name'];
    }
    if (empty($_POST['emp_position'])) {
        $employee_emErr = "This field is required";
    } else {
        $employee_em = $_POST['emp_position'];
    }
    if (empty($_POST['address'])) {
        $employee_addressErr = "This field is required";
    } else {
        $employee_address = $_POST['address'];
    }
    if (empty($_POST['num'])) {
        $employee_numErr = "This field is required";
    } else {
        $employee_num = $_POST['num'];
    }

    if (empty($employee_idErr) && empty($employee_nameErr) && empty($employee_emErr) && empty($employee_addressErr) && empty($employee_numErr)) {
        /*push the data collected to the database*/
        $collected = "insert into employee_info (employee_id, employee_Name, department, address, employee_mobile) values ('$employee_id', '$employee_name','$employee_em', '$employee_address','$employee_num')";
        if (mysqli_query($conn, $collected)) {
            header("location:/sem/admin/employees.php");
            die;
        }
    }
}


/*Edit */

if (isset($_POST['update'])) {
    $employee_id = $_GET['employee_id'];

    $employee_id = $_POST['id'];
    $employee_name = $_POST['name'];
    $employee_em = $_POST['emp_position'];
    $employee_address = $_POST['address'];
    $employee_num = $_POST['num'];

    $new = "update employee_info set employee_Name = '$employee_name', department = '$employee_em', address = '$employee_address', employee_mobile = '$employee_num' where employee_id = '$employee_id'";

    $result = mysqli_query($conn, $new);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
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
            <li class="active p-3"><i class="bi bi-people-fill"></i><a href="employees.php">All Employees</a>
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
                <h4>All Employee</h4>
                <p>All employee information</p>
            </div>
            <div class="profile">
                <img src="https://via.placeholder.com/40" alt="Profile Picture">
                <span>Robert Allen</span>
            </div>
        </div>

        <section class="container">
            <div id="section-main">
                <div class="header-right row">
                    <div class="col-6">
                        <input type="search" placeholder="Search" class="form-control w-125 ">
                    </div>
                    <div class="col-6">
                        <a href="" class="btn btn-primary"><i class="bi bi-search"></i></a>
                    </div>
                </div>
                <div class="section-right">
                    <button class="btn btn-primary newUser" data-bs-toggle="modal" data-bs-target="#userForm">ADD EMPLOYEE<i class="bi bi-people"></i></button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Mobile Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($data as $item) : ?>
                    <tbody>
                        <tr>
                            <td><?php echo $item['employee_id'] ?></td>
                            <td><?php echo $item['employee_Name'] ?></td>
                            <td><?php echo $item['address'] ?></td>
                            <td><?php echo $item['department'] ?></td>
                            <td><?php echo $item['employee_mobile'] ?></td>
                            <td>
                                <a href="employee_id=<?php echo $item['employee_id'] ?> " class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="/sem/admin?employee_id=<?php echo $item['employee_id'] ?> " class="btn btn-danger"><i class="bi bi-pencil-square"></i></a>

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
                        <h4 class="modal-title">Employee
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="" id="myForm" method="post">

                            <div class="inputField">
                                <div>
                                    <label for="pickupLocation" class="form-label">Employee ID:</label>
                                    <input type="text" id="pickupLocation" name="id" class="form-control" placeholder="Enter Attendance ID">
                                </div>
                                <div>
                                    <label for="dropOffLocation" class="form-label">Employee Name:</label>
                                    <input type="text" id="dropOffLocation" name="name" class="form-control">
                                </div>
                                <div>
                                    <label for="pickupTime" class="form-label">Address:</label>
                                    <input type="text" id="pickupTime" name="address" class="form-control">
                                </div>
                                <div>
                                    <label for="pickupTime" class="form-label">Number:</label>
                                    <input type="num" id="pickupTime" name="num" class="form-control">
                                </div>
                                <div>

                                    <label for="pickupTime" class="form-label">Department:</label>
                                    <select name="emp_position" class="form-control" required>
                                        <option hidden> - Select -</option>
                                        <?php
                                        $dep = "SELECT * FROM department";
                                        $result = mysqli_query($conn, $dep);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?php echo $row['department_name']; ?>"><?php echo $row['department_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>


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