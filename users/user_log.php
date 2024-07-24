<?php
include 'connection.php';
session_start();
$showErr = "";

if (isset($_POST['sub'])) {
    $username = $_POST['name'];
    $password = $_POST['pass'];

    $sql = "select * from employee_info where  email = '$username' and employee_paasword = '$password'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['employee_Name'] = $row['employee_Name'];
            $_SESSION['department'] = $row['department'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['employee_mobile'] = $row['employee_mobile'];
            $_SESSION['employee_paasword'] = $row['employee_paasword'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['employee_id'] = $row['employee_id'];


            header("location:index.php");
        } else {
            $showErr = '<div class="alert alert-warning alert-dismissible fade show " role="alert">
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Invalid Details/Account does not exist!</strong>
          </div>';
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
                <?php echo $showErr ?>
                <h1 class="text-center">Welcome 👋</h1>
                <p>Please Login Here as a User</p>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="label-form">Email</label>
                        <input type="email" name="name" class="form-control" id="users">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="label-form">Password</label>
                        <input type="password" name="pass" class="form-control" id="passs">

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button id="btns" class="btn btn-primary my-3" name="sub">LOGIN</button>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <a id="forget" href="forgot.php">Forget Password?</a>
                    </div>
                    <div>
                        <p>Not a Member ? <a id="forget" href="user_sign.php">Sign Up</a></p>
                    </div>
                </div>
            </div>
            <!--   <div class="sec-login bg-primary">
                <h1>Hello world</h1>
            </div> -->
        </div>
    </form>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</html>