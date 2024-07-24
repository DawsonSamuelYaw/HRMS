<?php

define('db_host', 'localhost');
define('db_user', 'sam');
define('db_pass', 'dawson');
define('db_name', 'semester');

$conn = new mysqli(db_host, db_user, db_pass, db_name);

if ($conn->error) {
    die("Not Connected!!");
}
