<?php
include 'connection.php';
$invalid = "";

session_start();
$username = $password = $email = $last = $num = "";
$username_err = $password_err = $email_err = $last_err = $numErr = "";
if (isset($_POST['sub'])) {


    $username = $_POST['name'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $last = $_POST['last'];
    $num = $_POST['num'];

    if (empty($_POST['name'])) {
        $username_err  = "Field is required";
    } else {
        $username = $_POST['name'];
    }
    if (empty($_POST['last'])) {
        $last_err  = "Field is required";
    } else {
        $last = $_POST['last'];
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
    if (empty($_POST['num'])) {
        $numErr  = "Field is required";
    } else {
        $num = $_POST['num'];
    }

    if (empty($username_err) && empty($password_err) && empty($email_err) && empty($last_err) && empty($numErr)) {
        $check = "select * from HR where email = '$email'";
        $result = mysqli_query($conn, $check);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $invalid = '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                <strong>Email already Exist </strong>
              </div>';
            } else {
                $sql = "insert into HR(First,last,email,password,mobile) values ('$username', '$last', '$email','$password','$num')";
                if (mysqli_query($conn, $sql)) {
                    header("location:/sem/HR/hr_log.php");
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
    <title>Sign-In-HR</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <form action="" method="post">
        <div class="main-con">
            <div class="logins">
                <?php echo $invalid; ?>
                <h1>Welcome 👋</h1>
                <p>Please Create Account Here as a Human Resource Manager</p>
                <div class="row ">
                    <div class="col-6">
                        <label for="" class="label-form">First Name</label>
                        <input type="text" name="name" class=" form-control <?php echo $username_err ? 'is-invalid' : null ?> " id="nam">
                        <p><?php echo $username_err ?></p>

                    </div>
                    <div class="col-6">
                        <label for="" class="label-form">Last Name</label>
                        <input type="text" name="last" class="form-control <?php echo $last_err ? 'is-invalid' : null ?> " id="name">
                        <p><?php echo $last_err ?></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="label-form">Password</label>
                        <input type="password" name="pass" class="form-control <?php echo $password_err ? 'is-invalid' : null ?> " id="name">
                        <p><?php echo $password_err ?></p>

                    </div>
                    <div class="col-6">
                        <label for="" class="label-form">Email</label>
                        <input type="email" name="email" class="form-control <?php echo $email_err ? 'is-invalid' : null ?> " id="name">
                        <p><?php echo $email_err ?></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="label-form">Mobile Number</label>
                        <input type="number" name="num" class="form-control <?php echo $email_err ? 'is-invalid' : null ?> " id="name">
                        <p><?php echo $email_err ?></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button id="btns" class=" w-100 btn btn-primary my-3" name="sub">SIGN UP</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Already a Member ? <a id="forget" href="hr_log.php">Sign In</a></p>
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