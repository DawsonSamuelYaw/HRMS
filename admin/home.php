<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body style="background-image:url(/sem/img/top-view-motivation-note-with-clothespins-staples-dark-surface-laundry-photo-school-child-color.jpg); background-size:cover;">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="home.php">Reliance Financial Services Limited</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>


                <li class="nav-item">
                    <div class="btn-group">
                        <a type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/sem/admin/admin_log.php">Administrator</a></li>
                            <li><a class="dropdown-item" href="/sem/HR/admin_log.php">Human Resource Manager</a></li>
                            <li><a class="dropdown-item" href="/sem/manager/manager_log.php">Department Head/Manager</a></li>
                            <li><a class="dropdown-item" href="/sem/users/user_log.php">Employee</a></li>


                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
            </ul>
        </div>
        <!-- Example single danger button -->

    </nav>

    <div class="container mt-5">
        <div class="bg-white m-5 p-3 " style="border-radius: 10px ;">
            <h1 class="display-4">Welcome to the HRMS</h1>
            <p class="lead">Manage all your HR needs efficiently and effectively.</p>
            <hr class="my-4">
            <p>Use the navigation bar to access different sections of the system.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Employee Management</h5>
                        <p class="card-text">Add, edit, and view employee details.</p>
                        <a href="#" class="btn btn-primary">Go to Employees</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Department Management</h5>
                        <p class="card-text">Manage departments within the organization.</p>
                        <a href="#" class="btn btn-primary">Go to Departments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Attendance Tracking</h5>
                        <p class="card-text">Monitor and track employee attendance.</p>
                        <a href="#" class="btn btn-primary">Go to Attendance</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">© 2024 HRMS. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>