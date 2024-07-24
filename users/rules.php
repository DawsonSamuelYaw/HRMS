<?php
include 'connection.php';

$sql = "select * from vacation";
$data = mysqli_query($conn, $sql);
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
    <title>Rules Section</title>
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
            <li class="p-3">
                <i class="bi bi-calendar-check"></i>
                <a href="evaluation.php">New Evaluation</a>
            </li>
            <li class="p-3">
                <i class="bi bi-credit-card-2-back"></i>
                <a href="attendance.php">
                    Attendance</a>
            </li>
            <li class="active p-3">
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
                    <h4>Rules Section</h4>
                </div>
                <div class="profile">
                    <p><?php echo $key['department']; ?> | </p> <br>
                    <p><?php echo $key['employee_Name'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>

        <dl class="row">
            <h1 class="text-center">Rules</h1>
            <hr>
            <dt class="col-sm-3">1</dt>
            <dd class="col-sm-9">Aspire Financial Service Limited employees are expected to uphold the highest standards of professional conduct. This includes strict confidentiality regarding customer information, and preventing unauthorized access or disclosure. All employees must avoid conflicts of interest, such as personal transactions with the institution or accepting gifts that could influence their judgment.</dd>
            <dt class="col-sm-3">2</dt>
            <dd class="col-sm-9">To ensure the safety and integrity of our operations, employees are required to comply with all applicable laws, regulations, and internal policies. This includes participation in anti-money laundering and counter-terrorism financing training, as well as reporting any suspicious activities.</dd>
            <dt class="col-sm-3">3</dt>
            <dd class="col-sm-9">Maintaining a positive and productive work environment is essential. Employees are expected to adhere to company policies regarding attendance, dress code, and respectful interactions with colleagues and customers. Discrimination and harassment of any kind will not be tolerated.</dd>
            <dt class="col-sm-3">4</dt>
            <dd class="col-sm-9">Finally, all employees must prioritize the protection of the institution's assets and reputation. This involves responsible handling of financial transactions, adherence to risk management procedures, and safeguarding sensitive information.</dd>

        </dl>
        </main>

        <script src="scripts.js"></script>
</body>

</html>