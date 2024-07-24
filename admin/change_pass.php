<?php
include "connection.php";
session_start();
$id = $_SESSION['id'];
$mess = "";
if (isset($_POST['sub'])) {
    $pass = $_POST['pass'];
    $passs = $_POST['passs'];

    if ($pass ==  $passs) {
        $sql = "UPDATE admin_signup SET  password = '$pass' WHERE  id = '$id' ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location:admin_log.php');
        }
    } else {
        $mess = '<div class="alert alert-warning alert-dismissible fade show " role="alert">
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Password Does Not Match</strong>
          </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <form action="" method="post">
        <div class="main-containers">
            <div class="logins">
                <h1>Change Password</h1>
                <?php echo $mess ?>
                <p class="text-secondary">Enter your new password</p>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="label-form">New Password</label>
                        <input type="password" name="passs" class="form-control" id="pass">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="label-form">Confirm Password</label>
                        <input type="password" name="pass" class="form-control" id="pass">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button id="btn" class="btn btn-primary my-3" name="sub">CHANGE PASSWORD</button>
                    </div>
                </div>
                <!--  <div class="row">
                    <div>
                        <a id="forget" href="forgot.php">Forget Password?</a>
                    </div>
                </div> -->

                <div class="arrow">
                    <a href="admin_log.php"><i class="bi bi-arrow-left"></i> Back</a>
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