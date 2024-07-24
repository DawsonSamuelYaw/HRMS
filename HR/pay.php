<?php
session_start();

include 'connection.php';

$username = $password = $email = $address = $department = $emp_id =  $mobile = "";
$username_err = $password_err = $email_err = $address_err = $department_err = $emp_idErr =  $mobile_Err = "";
$sorry = "";
$id = $_GET['id'];

$select = "select * from salary where id = '$id'";
$re = mysqli_query($conn, $select);

if (isset($_POST['sub'])) {
    $username = $_POST['select'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $address = $_POST['add'];


    if (empty($_POST['name'])) {
        $username_err = "Field is required";
    } else {
        $username = $_POST['name'];
    }
    if (empty($_POST['add'])) {
        $address_err = "Field is required";
    } else {
        $address = $_POST['add'];
    }
    if (empty($_POST['email'])) {
        $email_err = "Field is required";
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['pass'])) {
        $password_err = "Field is required";
    } else {
        $password = $_POST['pass'];
    }


    if (empty($username_err) && empty($password_err) && empty($email_err) && empty($address_err)) {
        $up = "UPDATE `salary` SET `pay`='$email',`bouns`='$password',`last_update`='$address',`employee_name`='$username' WHERE id = '$id'";
        $res = mysqli_query($conn, $up);
        if ($res) {
            header("Location:payroll.php");
        } else {
            echo "Hello world";
        }
    }
}
if (isset($_POST['close'])) {
    header("Location:payroll.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <?php foreach ($re as $key) : ?>

            <form class="shadow w-450 p-3" action="" method="post" enctype="">

                <div class="main-con p-4">
                    <div class="logins">
                        <?php echo $sorry ?>
                        <h4 class="display-4  fs-1">Edit Salary</h4><br>

                        <div class="row ">
                            <div class="col-6">
                                <label for="" class="label-form">Employee Name</label>
                                <select name="select" class="form-control <?php echo $username_err ? 'is-invalid' : null ?>" required>
                                    <option><?php echo $key['employee_name']; ?></option>
                                    <?php
                                    $dep = "SELECT * FROM employee_info";
                                    $result = mysqli_query($conn, $dep);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $row['employee_Name']; ?>"><?php echo $row['employee_Name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <p><?php echo $username_err ?></p>

                            </div>
                            <div class="col-6">
                                <label for="" class="label-form">Pay</label>
                                <input type="number" name="email" class="form-control <?php echo $email_err ? 'is-invalid' : null ?> " id="name" value="<?php echo $key['pay']; ?>">
                                <p><?php echo $email_err ?></p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="label-form">Bonus</label>
                                <input type="number" name="pass" class="form-control <?php echo $password_err ? 'is-invalid' : null ?> " id="name" value="<?php echo $key['bouns'] ?>">
                                <p><?php echo $password_err ?></p>

                            </div>
                            <div class="col-6">
                                <label for="" class="label-form">Last Update</label>
                                <input type="date" name="add" class="form-control <?php echo $address_err ? 'is-invalid' : null ?> " id="name" value="<?php echo $key['last_update'] ?>">
                                <p><?php echo $address_err ?></p>

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-6"><!-- 
                        <a id="forget" name="sub" class="btn btn-primary" href="user_log.php">Sign Up</a> -->
                                <button class="btn btn-primary" name="sub">UPDATE</button>
                                <button class="btn btn-danger" name="close">CLOSE</button>

                            </div>
                        </div>

                    </div>
                    <!--   <div class="sec-login bg-primary">
                <h1>Hello world</h1>
            </div> -->
                </div>
            </form>

        <?php endforeach ?>
    </div>

</body>

</html>