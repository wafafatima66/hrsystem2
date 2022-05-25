<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHRIS - NITIBDEV</title>
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4-5.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="loginassets/images/favicon.ico">
    <link rel="stylesheet" href="loginassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="loginassets/css/all.min.css">
    <link rel="stylesheet" href="loginassets/css/animate.css">
    <link rel="stylesheet" href="loginassets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="loginassets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="loginassets/css/style.css" />
</head>

<body class="form-login-body">
    <?php require dirname(__FILE__) . '/includes/conn.php';

    session_start();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // $active = $row['active'];

        $count = mysqli_num_rows($result);
        $userid = $row['id'];
        $_SESSION['login_user'] = $userid;


        if ($count == 1) {
            if ($row['role'] != 'Super Administrator') {
                $emp_id = $row['emp_id'];
                $sql = "SELECT id FROM employee WHERE emp_id = '$emp_id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                header("location:emp_mang/emp_profile.php?id=" . $row["id"]);
            } else {
                header("location:home/index.php");
            }
        } else {
            header("location:index.php?error");
        }
    }

    ?>



    <div class="login-body container-fluid">
        <div class="container">

            <form class="mt-4 login-form" action="" method="post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="login-text">
                            <!--<img src="img/logo-2.png" alt=""> -->
                            <h4>Login</h4>

                            <input type="text" placeholder="Enter Username" name="username" id="username" class="form-control ">

                            <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control">

                            <label class="w-100" for="">Forget Password?</label>

                            <button class="btn " type="submit" name="submit" style="background-color: orange;">Sign In</button>

                            <?php
                            if (isset($_GET['error'])) {
                                echo '<p class="mt-5">Your Login Name or Password is invalid</p>';
                            }
                            ?>

                        </div>
                    </div>
            </form>
          

            <div class="col-md-7">
                <div class="login-img">
                    <img src="loginassets/images/login.png" alt="">
                </div>
            </div>
        </div>
        </form>
        <div class="copy">
            <p>Developed by: <br>
                AJAXCRYPT | ajaxcryptstartup@gmail.com &<br>
                NITIBDEV IT SOLUTIONS | nitibdevitsolutions@gmail.com</p>
        </div>
    </div>
    </div>
    </div>
</body>

<script src="loginassets/js/jquery-3.2.1.min.js"></script>
<script src="loginassets/js/popper.min.js"></script>
<script src="loginassets/js/bootstrap.min.js"></script>
<script src="loginassets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="loginassets/plugins/slider/js/owl.carousel.min.js"></script>
<script src="loginassets/js/script.js"></script>

</html>