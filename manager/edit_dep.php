`
<?php
$employee_id = $employee_name = $employee_dep =  "";
$employee_idErr = $employee_nameErr = $employee_depErr = "";
include 'connection.php';



if (isset($_POST['add'])) {
    $employee_id = $_POST['id'];
    $employee_name = $_POST['name'];
    $employee_dep = $_POST['dep'];

    if (empty($_POST['id'])) {
        $employee_idErr = "This field is required";
    } else {
        $employee_id = $_POST['id'];
    }
    if (empty($_POST['name'])) {
        $employee_nameErr = "This field is required";
    } else {
        $employee_name = $_POST['name'];
    }
    if (empty($_POST['dep'])) {
        $employee_depErr = "This field is required";
    } else {
        $employee_dep = $_POST['dep'];
    }

    if (empty($employee_idErr) && empty($employee_nameErr) && empty($employee_depErr)) {
        /*push the data collected to the database*/
        $collected = "insert into employee_info (employee_id, employee_Name, department) values ('$employee_id', '$employee_name','$employee_dep')";
        if (mysqli_query($conn, $collected)) {
            header("location:/sem/admin/department.php");
            die;
        }
    }
}

$id = $_GET['employee_id'];
$sql = "select * from employee_info where employee_id = $id";
$result = mysqli_query($conn, $sql);
$item = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <form action="" method="post">
        <div class="container">
            <div class="main">
                <div class="row">
                    <div class="col-6">
                        <label for="">Enter ID:</label>
                        <input type="text" name="id" class="form-control <?php echo $employee_idErr ? 'is-invalid' : null ?>" value="<?php echo $item['employee_id'] ?>">
                        <?php echo $employee_idErr ?>
                    </div>
                    <div class=" col-6">
                        <label for="">Enter Name:</label>
                        <input type="text" name="name" class="form-control <?php echo $employee_nameErr ? 'is-invalid' : null ?>" id="" value="<?php echo $item['employee_Name'] ?>">
                        <?php echo $employee_nameErr ?>
                    </div>
                    <div class="col-6">
                        <label for="">Department:</label>
                        <input type="text" name="dep" class="form-control <?php echo $employee_addressErr ? 'is-invalid' : null ?>" id="" value="<?php echo $item['department'] ?>">
                        <?php echo $employee_depErr ?>
                    </div>
                    <div class="btn-5">
                        <button class="btn btn-primary my-3" name="add" id="btn-3">SUBMIT</button>

                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>