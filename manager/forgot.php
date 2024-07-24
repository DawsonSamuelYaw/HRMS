<?php
include "connection.php";
session_start();

$showErr = "";
$show = "";
if (isset($_POST['sub'])) {
    $email = $_POST['email'];
    $sql = "SELECT *FROM manager WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            /*  $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'abigailmills0554@gmail.com';
            $mail->Password = 'uivsqhxqffohgtjy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('abigailmills0554@gmail.com');
            $mail->addAddress($_POST['email']);
            $mail->isHTML(true);
            $mail->Subject = "Change Password";
            $mail->Body = '<div>
            <h1>Reliance Financial Company</h1>
           <p> Please Click <a href="http://localhost/sem/admin/change_pass.php">Here</a> To Change your password </p>
           </div>'; */

            header('location:change_pass.php');
            $show = '<div class="alert alert-success alert-dismissible fade show " role="alert">
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
<strong>Email has been sent to you</strong>
</div>';
            /* if ($mail->send()) {
               
            } */
        } else {
            $showErr = '<div class="alert alert-warning alert-dismissible fade show " role="alert">
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Email Does Not Exist</strong>
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
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <form action="" method="post">
        <div class="main-containers">
            <div class="logins">
                <h1>Forgot Password</h1>
                <?php echo $show ?>
                <?php echo $showErr ?>
                <p class="text-secondary">Enter your registered username to allow you to reset your password</p>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="label-form">Email</label>
                        <input type="email" name="email" class="form-control" id="pass">

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button id="btn" class="btn btn-primary my-3" name="sub">CHANGE PASSWORD</button>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <a id="forget" href="forgot.php">Forget Password?</a>
                    </div>
                </div>

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