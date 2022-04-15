<?php

$create = false;
$fcreate = false;
$exists = false;
$fpass = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'extra/dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // check user exist
    $existsql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $existsql);
    $numexist = mysqli_num_rows($result);
    if ($numexist > 0) {
        $exists = true;
    } elseif (($password == $cpassword)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $hash = password_hash($cpassword, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, cpassword, date) VALUES ('$username', '$hash','$hash', current_timestamp())";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $create = true;
        } else {
            echo "Query not run due to " . mysqli_error($con);
        }
    } else {
        $fpass = true;

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js"></script>
    <link rel="stylesheet" href="signup4.css">
    <title>Signup</title>
</head>

<body>
    <style>
    <?php require 'extra/alert5.css'
    ?>
    </style>

    <div class="main">
        <section class="navbar">
            <div class="nav">
                <div class="lnav">
                    <a href="home.html" class="navhead">iLogin</a>
                </div>
                <div class="rnav">
                    <a href="">Home</a>
                    <a href="">About</a>
                    <button onclick="window.location.href='login.php'">Login</button>
                </div>
            </div>
        </section>

        <?php
if ($create) {
    // this block use for alert after note inserted successfully
    echo "<div class='alert' id='alert'>
      <diV>
        <P><span class='alertbold'>Success!</span> Your account has been created successfully! <span class='loginc'> <a href='login.php'> Login here</a></span></P>
      </div>
      <div class='cross'>
        <i class='fa-solid fa-xmark' onclick='closealert()'></i>
      </div>
    </div>";
}
if ($fpass) {
    echo "<div class='alertred' id='alertred'>
      <div>
        <P><span class='alertbold'>Failed!</span> Password do not match!</P>
      </div>
      <div class='cross'>
        <i class='fa-solid fa-xmark' onclick='closeredalert()'></i>
      </div>
    </div>";
}
if ($exists) {
    echo "<div class='alertred' id='alertred'>
      <div>
        <P><span class='alertbold'>Failed!</span> Username already exists!</P>
      </div>
      <div class='cross'>
        <i class='fa-solid fa-xmark' onclick='closeredalert()'></i>
      </div>
    </div>";
}

?>
        <div class="content">
            <H2>Create account</H2>
            <form action="signup.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword">
                <div class="show">
                    <span><input type="checkbox" name="showpass" id="showpass"> Show
                        password</span>
                </div>
                <button type="submit" class="submitform">Signup</button>
                <div class="lredirect">
                    <span> If u already have an account <a href="login.php"> Login here</a></span>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.getElementById("showpass").onclick = function() {
        if (this.checked) {
            document.getElementById("password").type = "text";
            document.getElementById("cpassword").type = "text";
        } else {
            document.getElementById("password").type = "password";
            document.getElementById("cpassword").type = "password";
        }
    };
    </script>
    <script>
    function closealert() {
        document.getElementById('alert').style.display = "none";
    }

    function closeredalert() {
        document.getElementById('alertred').style.display = "none";
    }
    </script>

</body>

</html>