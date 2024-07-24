<?php
include 'connection.php';

session_start();
$username = $password = $email = $address = $department = "";
$username_err = $password_err = $email_err = $address_err = $departmentErr = "";
if (isset($_POST['sub'])) {


    $username = $_POST['name'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $address = $_POST['add'];
    $department = $_POST['select'];

    if (empty($_POST['name'])) {
        $username_err  = "Field is required";
    } else {
        $username = $_POST['name'];
    }
    if (empty($_POST['add'])) {
        $address_err  = "Field is required";
    } else {
        $address = $_POST['add'];
    }
    if (empty($_POST['email'])) {
        $email_err  = "Field is required";
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['pass'])) {
        $password_err  = "Field is required";
    } else {
        $password = $_POST['pass'];
    }
    if (empty($_POST['select'])) {
        $department_err  = "Field is required";
    } else {
        $department = $_POST['select'];
    }

    if (empty($username_err) && empty($password_err) && empty($email_err) && empty($address_err) && empty($department_err)) {
        $check = "select * from employee_info where email = '$email' ";
        $result = mysqli_query($conn, $check);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                echo "Email already exits in the system";
            } else {
                $sql = "insert into admin_signup(First,last,email,password) values ('$username', '$last', '$email','$password')";
                if (mysqli_query($conn, $sql)) {
                    header("location:/sem/admin/admin_log.php");
                    die;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-In-Admin</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <form action="" method="post">
        <div class="main-con">
            <div class="logins">
                <?php
                if (isset($_SESSION['stat'])) {
                ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['stat'] ?></h5>
                    </div>
                <?php
                    unset($_SESSION['stats']);
                }
                ?>
                <h1>Welcome 👋</h1>
                <p>Please Create Account Here as a User</p>
                <div class="row ">
                    <div class="col-6">
                        <label for="" class="label-form">Full Name</label>
                        <input type="text" name="name" class=" form-control <?php echo $username_err ? 'is-invalid' : null ?> " id="nam">
                        <p><?php echo $username_err ?></p>

                    </div>
                    <div class="col-6">
                        <label for="" class="label-form">Email</label>
                        <input type="email" name="email" class="form-control <?php echo $email_err ? 'is-invalid' : null ?> " id="name">
                        <p><?php echo $email_err ?></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="label-form">Password</label>
                        <input type="password" name="pass" class="form-control <?php echo $password_err ? 'is-invalid' : null ?> " id="name">
                        <p><?php echo $password_err ?></p>

                    </div>
                    <div class="col-6">
                        <label for="" class="label-form">Address</label>
                        <input type="password" name="add" class="form-control <?php echo $password_err ? 'is-invalid' : null ?> " id="name">
                        <p><?php echo $password_err ?></p>

                    </div>


                </div>
                <div class="row">

                    <div class="col-6">
                        <label for="" class="form-label">Select Department</label>
                        <select name="select" id="" class="form-select">
                            <option value="">---Select Department</option>
                            <option value="">Backend Developer</option>
                            <option value="">Frontend Developer</option>
                            <option value="">Full Stack Developer</option>
                            <option value="">UI/UX Designer</option>
                            <option value="">Software Testing</option>
                            <option value="">Quality Assuraence</option>
                        </select>
                        <p><?php echo $password_err ?></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button id="btns" class=" w-100 btn btn-primary my-3" name="sub">SIGN UP</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Already a Member ? <a id="forget" href="user_log.php">Sign In</a></p>
                    </div>
                </div>
            </div>
            <!--   <div class="sec-login bg-primary">
                <h1>Hello world</h1>
            </div> -->
        </div>
    </form>



</body>

</html>