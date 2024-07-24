<?php
$employee_id = $employee_name = $employee_pass = $employee_address = $employee_mobile = $employee_num = "";
$employee_idErr = $employee_nameErr = $employee_passErr = $employee_addressErr = $employee_mobileErr = $employee_numErr = "";
include 'connection.php';



if (isset($_POST['add'])) {
    $employee_id = $_POST['id'];
    $employee_name = $_POST['name'];
    $employee_pass = $_POST['pass'];
    $employee_address = $_POST['address'];
    $employee_mobile = $_POST['num'];

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
    if (empty($_POST['pass'])) {
        $employee_passErr = "This field is required";
    } else {
        $employee_pass = $_POST['pass'];
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

    if (empty($employee_idErr) && empty($employee_nameErr) && empty($employee_passErr) && empty($employee_addressErr) && empty($employee_mobileErr)) {
        /*push the data collected to the database*/
        $collected = "insert into employee_info (employee_id, employee_Name, employee_paasword, address, employee_mobile) values ('$employee_id', '$employee_name','$employee_pass', '$employee_address','$employee_num')";
        if (mysqli_query($conn, $collected)) {
            header("location:/sem/admin/employees.php");
            die;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <form action="" method="post">
        <div class="container">
            <div class="main">
                <div class="row">
                    <div class="col-6">
                        <label for="">Enter ID:</label>
                        <input type="text" name="id" class="form-control <?php echo $employee_idErr ? 'is-invalid' : null ?>">
                        <?php echo $employee_idErr ?>
                    </div>
                    <div class="col-6">
                        <label for="">Enter Name:</label>
                        <input type="text" name="name" class="form-control <?php echo $employee_nameErr ? 'is-invalid' : null ?>" id="">
                        <?php echo $employee_nameErr ?>
                    </div>
                    <div class="col-6">
                        <label for="">Password:</label>
                        <input type="password" name="pass" class="form-control <?php echo $employee_passErr ? 'is-invalid' : null ?>" id="">
                        <?php echo $employee_passErr ?>
                    </div>
                    <div class="col-6">
                        <label for="">Address:</label>
                        <input type="text" name="address" class="form-control <?php echo $employee_addressErr ? 'is-invalid' : null ?>" id="">
                        <?php echo $employee_addressErr ?>
                    </div>
                    <div class="col-6">
                        <label for="">Mobile Phone:</label>
                        <input type="text" name="num" class="form-control <?php echo $employee_numErr ? 'is-invalid' : null ?>" id="">
                        <?php echo $employee_numErr ?>
                    </div>
                    <div class="btn-5">
                        <button class="btn btn-primary my-3" name="add" id="btn-3">SUBMIT</button>

                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>