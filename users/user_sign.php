<?php
include 'connection.php';

session_start();
$username = $password = $email = $address = $department = $emp_id =  $mobile = "";
$username_err = $password_err = $email_err = $address_err = $department_err = $emp_idErr =  $mobile_Err = "";
$sorry = "";
if (isset($_POST['sub'])) {


    $username = $_POST['name'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $address = $_POST['add'];
    $department = $_POST['select'];
    $emp_id = $_POST['id'];
    $mobile = $_POST['num'];

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
    if (empty($_POST['id'])) {
        $emp_idErr  = "Field is required";
    } else {
        $emp_id = $_POST['id'];
    }
    if (empty($_POST['num'])) {
        $mobile_Err  = "Field is required";
    } else {
        $mobile = $_POST['num'];
    }

    if (empty($username_err) && empty($password_err) && empty($email_err) && empty($address_err) && empty($department_err) && empty($emp_idErr)) {
        $check = "select * from employee_info where email = '$email' OR  employee_id = '$emp_id'";
        $result = mysqli_query($conn, $check);
        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                $sorry = '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Email/Employee ID already Exist </strong>
              </div>';
            } else {
                $sql = "insert into employee_info(employee_Name,employee_paasword,address,employee_mobile, employee_id, department,email) values ('$username', '$password', '$address','$mobile', '$emp_id' , '$department','$email')";
                if (mysqli_query($conn, $sql)) {
                    header("location:/sem/users/user_log.php");
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
        <div class="main-con p-4">
            <div class="logins">
                <?php echo $sorry ?>
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
                        <input type="text" name="add" class="form-control <?php echo $address_err ? 'is-invalid' : null ?> " id="name">
                        <p><?php echo $address_err ?></p>

                    </div>


                </div>
                <div class="row">

                    <div class="col-6">
                        <label for="" class="form-label">Enter Department</label>
                        <select name="select" class="form-control" required>
                            <option hidden> - Select -</option>
                            <?php
                            $dep = "SELECT * FROM department";
                            $result = mysqli_query($conn, $dep);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $row['department_name']; ?>"><?php echo $row['department_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col-6">
                        <label for="" class="label-form">Phone Number</label>
                        <input type="num" name="num" class="form-control <?php echo $mobile_Err ? 'is-invalid' : null ?> " id="name">
                        <p><?php echo $mobile_Err ?></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="label-form">Employee ID</label>
                        <input type="text" name="id" class="form-control <?php echo $emp_idErr ? 'is-invalid' : null ?> " id="name">
                        <p><?php echo $emp_idErr ?></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6"><!-- 
                        <a id="forget" name="sub" class="btn btn-primary" href="user_log.php">Sign Up</a> -->
                        <button class="btn btn-primary" name="sub">SIGN UP</button>

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