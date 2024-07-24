<?php
session_start();

include 'connection.php';

$username = $password = $email = $address = $department = $emp_id =  $mobile = "";
$username_err = $password_err = $email_err = $address_err = $department_err = $emp_idErr =  $mobile_Err = "";
$sorry = "";
$id = $_SESSION['employee_id'];

$select = "select * from employee_info where employee_id = '$id'";
$re = mysqli_query($conn, $select);

if (isset($_POST['sub'])) {


    $username = $_POST['name'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $address = $_POST['add'];
    $department = $_POST['select'];
    $emp_id = $_POST['id'];
    $mobile = $_POST['num'];

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
    if (empty($_POST['select'])) {
        $department_err = "Field is required";
    } else {
        $department = $_POST['select'];
    }
    if (empty($_POST['id'])) {
        $emp_idErr = "Field is required";
    } else {
        $emp_id = $_POST['id'];
    }
    if (empty($_POST['num'])) {
        $mobile_Err = "Field is required";
    } else {
        $mobile = $_POST['num'];
    }

    if (empty($username_err) && empty($password_err) && empty($email_err) && empty($address_err) && empty($department_err) && empty($emp_idErr)) {
        $up = "UPDATE`employee_info`SET`employee_Name`='$username',`employee_paasword`='$password',`address`='$address',`employee_mobile`='$mobile',`department`='$department',`email`='$email' WHERE employee_id = '$id'";
        $res = mysqli_query($conn, $up);
        if ($res) {
            header("Location:user_profile.php");
        } else {
            echo "Hello world";
        }
    }
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
                        <h4 class="display-4  fs-1">Edit Profile</h4><br>

                        <div class="row ">
                            <div class="col-6">
                                <label for="" class="label-form">Full Name</label>
                                <input type="text" name="name" class=" form-control <?php echo $username_err ? 'is-invalid' : null ?> " id="nam" value="<?php echo $key['employee_Name']; ?>">
                                <p><?php echo $username_err ?></p>

                            </div>
                            <div class="col-6">
                                <label for="" class="label-form">Email</label>
                                <input type="email" name="email" class="form-control <?php echo $email_err ? 'is-invalid' : null ?> " id="name" value="<?php echo $key['email']; ?>">
                                <p><?php echo $email_err ?></p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="label-form">Password</label>
                                <input type="password" name="pass" class="form-control <?php echo $password_err ? 'is-invalid' : null ?> " id="name" value="<?php echo $key['employee_paasword'] ?>">
                                <p><?php echo $password_err ?></p>

                            </div>
                            <div class="col-6">
                                <label for="" class="label-form">Address</label>
                                <input type="text" name="add" class="form-control <?php echo $address_err ? 'is-invalid' : null ?> " id="name" value="<?php echo $key['address'] ?>">
                                <p><?php echo $address_err ?></p>

                            </div>


                        </div>
                        <div class="row">

                            <div class="col-6">
                                <label for="" class="form-label">Enter Department</label>
                                <select name="select" class="form-control" required>
                                    <option><?php echo $key['department']; ?></option>
                                    <?php
                                    $dep = "SELECT * FROM department";
                                    $result = mysqli_query($conn, $dep);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $shw; ?>"><?php echo $row['department_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="col-6">
                                <label for="" class="label-form">Phone Number</label>
                                <input type="num" name="num" class="form-control <?php echo $mobile_Err ? 'is-invalid' : null ?> " id="name" value="<?php echo $key['employee_mobile'] ?>">
                                <p><?php echo $mobile_Err ?></p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="label-form">Employee ID</label>
                                <input type="text" name="id" class="form-control <?php echo $emp_idErr ? 'is-invalid' : null ?> " id="name" value="<?php echo $key['employee_id']; ?>">
                                <p><?php echo $emp_idErr ?></p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><!-- 
                        <a id="forget" name="sub" class="btn btn-primary" href="user_log.php">Sign Up</a> -->
                                <button class="btn btn-primary" name="sub">UPDATE</button>

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