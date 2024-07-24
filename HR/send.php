<?php
include 'connection.php';

$sql = "select * from message";
$data = mysqli_query($conn, $sql);
session_start();

$ids = $_SESSION['id'];
$sh = "SELECT * FROM hr WHERE id = '$ids'";
$sh1 = mysqli_query($conn, $sh);

if (isset($_POST['send'])) {
    $name = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    $info = "INSERT INTO message (Employee_Name,mess,subject) VALUES ('$name', '$body', '$subject')";
    $res = mysqli_query($conn, $info);
    if ($res) {
        header('location:send.php');
    } else {
        echo "Error";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="bg-secondary">
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
            <li class="p-3">
                <i class="bi bi-person-raised-hand"></i>
                <a href="training.php">Training</a>
            </li>
            <li class="active p-3">
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
                <h4>Send A Message</h4>

            </div>

            <?php foreach ($sh1 as $key) : ?>

                <div class="profile">
                    <a href="" class="btn btn-success m-2">POSITION: HR</a>
                    <a href="" class="btn btn-primary"><?php echo $key['First']; ?> </a>
                </div>
            <?php endforeach ?>
        </div>
        <hr>
        <section class="container">
            <div id="section-main">
                <div class="header-right">
                    <input type="search" placeholder="Search" class="form-control ">
                </div>
                <div class="section-right">
                    <button class="btn btn-primary newUser" data-bs-toggle="modal" data-bs-target="#userForm">SEND MESSAGE <i class="bi bi-chat-left-dots"></i></button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Subject</th>
                        <th>Body</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($data as $item) : ?>
                    <tbody>
                        <tr>
                            <td><?php echo $item['Employee_Name'] ?></td>
                            <td><?php echo $item['subject'] ?></td>
                            <td><?php echo $item['mess'] ?></td>
                            <td>
                                <a href="/sem/hr/del.php?id=<?php echo $item['id'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                <a href="/sem/hr/edit_dep.php?id=<?php echo $item['id'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
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
                        <h4 class="modal-title">SEND MESSAGE
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="mess.php" id="myForm" method="post">

                            <div class="inputField">
                                <div>
                                    <label for="pickupLocation" class="form-label">Email:</label>
                                    <select name="email" class="form-control" required>
                                        <option hidden> - Select -</option>
                                        <?php
                                        $dep = "SELECT * FROM employee_info";
                                        $result = mysqli_query($conn, $dep);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?php echo $row['email']; ?>"><?php echo $row['email']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="pickupLocation" class="form-label">Subject:</label>
                                    <textarea name="subject" id="" class="form-control"></textarea>
                                </div>
                                <div>
                                    <label for="pickupLocation" class="form-label">Message:</label>
                                    <textarea name="body" id="" class="form-control"></textarea>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" form="myForm" class="btn btn-primary" name="send">Submit</button>
                            </div>
                        </form>
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