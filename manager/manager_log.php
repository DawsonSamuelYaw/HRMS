<?php
include 'connection.php';
session_start();
$showErr = "";

if (isset($_POST['sub'])) {
    $username = $_POST['name'];
    $password = $_POST['pass'];

    $sql = "select * from admin_signup where first = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $_SESSION['name'] = $username;

            header("location:index.php");
        } else {
            $showErr = '<div class="alert alert-warning alert-dismissible fade show " role="alert">
            <strong>Invalid Details!</strong>
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
                <h1>Welcome 👋</h1>
                <p>Please Login Here as a Manager</p>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="label-form">Email</label>
                        <input type="text" name="name" class="form-control" id="users">
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
                        <p>Not a Member ? <a id="forget" href="admin_sign.php">Sign Up</a></p>
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