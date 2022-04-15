<?php

$login = false;
$flogin = false;
$fsnologin = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'extra/dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    //get all elements which same as typed in the input
    $sql = "SELECT * FROM users WHERE username ='$username'";
    $result = mysqli_query($con, $sql);
    //if username found in the database then it will print 1 bcs it is unique
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        //following function will get all the info of typed username
        while ($row = mysqli_fetch_assoc($result)) {
            //compare typed password with hased password stored in the database using verify()
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header('location:home.php');
            } else {
                $flogin = true;
            }
        }
    } else {
        $fsnologin = true;
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
    <link rel="stylesheet" href="login2.css">
    <title>Login</title>
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
                    <a href="home.php" class="navhead">iLogin</a>
                </div>
                <div class="rnav">
                    <a href="home.php">Home</a>
                    <a href="">About</a>
                    <button onclick="window.location.href='signup.php'">Signup</button>
                </div>
            </div>
        </section>
        <?php
if ($flogin) {
    echo "<div class='alertred' id='alertred'>
      <div>
        <h5><span class='alertbold'>Failed!</span> Wrong password!</h5>
      </div>
      <div class='cross'>
        <i class='fa-solid fa-xmark' onclick='closeredalert()'></i>
      </div>
    </div>";
}
if ($fsnologin) {
    echo "<div class='alertred' id='alertred'>
      <div>
        <h5><span class='alertbold'>Failed!</span> Username not found in the database!</h5>
      </div>
      <div class='cross'>
        <i class='fa-solid fa-xmark' onclick='closeredalert()'></i>
      </div>
    </div>";
}

?>
        <div class="content">
            <H2>Create account</H2>
            <form action="login.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <div class="show">
                    <span><input type="checkbox" name="showpass" id="showpass"> Show
                        password</span>
                </div>
                <button type="submit" class="submitform">Login</button>
                <div class="lredirect">
                    <span> If u don't have an account <a href="signup.php"> Signup here</a></span>
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