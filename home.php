<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['username'] != true) {
    header('location:login.php');}
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
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
</head>

<body>
    <div class="popup-bg" id="popup-bg">
        <div class="box">
            <!-- below line for closing modal using fun -->
            <i class="fas fa-times crossclose" onclick="closemodal()"></i>
            <h3>Welcome - <?php echo $_SESSION['username'] ?></h3>
            <p class='modalpara'>You have been succssfully loggedin as <?php echo $_SESSION['username'] ?></p>
            <a class='modallogout' href="logout.php">Logout Here</a>
        </div>
    </div>
    <div class="main">
        <section class="navbar">
            <div class="nav">
                <div class="lnav">
                    <a href="home.html" class="navhead">iLogin</a>
                </div>
                <div class="rnav">
                    <a href="home.php">Home</a>
                    <a href="">About</a>
                    <button onclick="window.location.href='logout.php'">Logout</button>
                </div>
            </div>
        </section>
    </div>
    <script>
    function closemodal() {
        document.getElementById('popup-bg').style.visibility = 'hidden';
        docuemnt.getElementById('popup-bg').style.opacity = '0';
    }
    </script>
</body>

</html>