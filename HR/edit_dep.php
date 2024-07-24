<?php
session_start();

include 'connection.php';

$username = $password = $email = $address = $department = $emp_id =  $mobile = "";
$username_err = $password_err = $email_err = $address_err = $department_err = $emp_idErr =  $mobile_Err = "";
$sorry = "";
$id = $_GET['id'];

$select = "select * from department where id = '$id'";
$re = mysqli_query($conn, $select);

if (isset($_POST['sub'])) {


    $username = $_POST['name'];


    if (empty($_POST['name'])) {
        $username_err = "Field is required";
    } else {
        $username = $_POST['name'];
    }


    if (empty($username_err)) {
        $up = "UPDATE`department`SET`department_name`='$username' WHERE id = '$id'";
        $res = mysqli_query($conn, $up);
        if ($res) {
            header("Location:/sem/admin/department.php");
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
                                <label for="" class="label-form">Department</label>
                                <input type="text" name="name" class=" form-control w-250 <?php echo $username_err ? 'is-invalid' : null ?> " id="nam" value="<?php echo $key['department_name']; ?>">
                                <p><?php echo $username_err ?></p>

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