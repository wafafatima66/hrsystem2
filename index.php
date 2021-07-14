<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR SYSTEM</title>

    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4-5.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

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


        // If result matched $myusername and $mypassword, table row must be 1 row

        // if ($count == 1 && $row['role'] == 'Super Admin') {

        //     $_SESSION['login_user'] = $userid;
        //     header("location:home/index.php");
        // } else if ($count == 1 && $row['role'] == 'Employee') {

        //     $_SESSION['login_user'] = $userid;
        //     header("location:emp_mang/index.php");
        // } else {
        //     header("location:index.php?error");
        // }

        if ($count == 1){
            if($row['role'] == 'Super Admin'){
                header("location:home/index.php");
            }else if($row['role'] == 'Employee'){

                $emp_id = $row['emp_id'];
                $sql = "SELECT id FROM employee WHERE emp_id = '$emp_id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                header("location:emp_mang/emp_profile.php?id=".$row["id"]);
            }
        }else {
                header("location:index.php?error");
            }

    }

    ?>


    <div class="login-page">



        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 pr-5" style="border-right: solid 4px #505A43;">

                    <div class="mx-auto">

                        <h1 class="h4-heading text-center">Agency name</h1>

                        <h3 class="text-center  mt-5">Vision</h3><br>
                        <p class="p-3 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore
                            repellat, modi harum quae quibusdam magni corporis laboriosam? Dignissimos, vero iste.</p>
                        <h3 class="text-center  mt-5">Vision</h3><br>
                        <p class="p-3 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae quam
                            quisquam quidem nulla adipisci ipsum cupiditate obcaecati inventore voluptate! Animi!</p>
                        <h3 class="text-center  mt-5">Vision</h3><br>
                        <p class="p-3 text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam
                            doloremque fuga quae illum sit nobis laboriosam commodi dolorem accusantium in?.</p>

                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 pl-5">
                    <div class="text-center mt-3 index-logo">
                        <img src="img/logo-2.png" alt="">

                        <form class="mt-4 login-form" action="" method="post">


                            <div class=" form-row mt-3">

                                <div class="col-lg-5 col-sm-6 text-right">
                                    <label for="username" class="mr-4 ">Username:</label><br>

                                </div>

                                <div class="col-lg-5 col-sm-6">
                                    <input type="text" name="username" id="username" class="form-control ">
                                </div>



                            </div>

                            <div class=" form-row mt-3">

                                <div class="col-lg-5 col-sm-6 text-right">
                                    <label for="password" class="mr-4">Password:</label><br>

                                </div>

                                <div class="col-lg-5 col-sm-6">
                                    <input type="password" name="password" id="password" class="form-control ">
                                </div>



                            </div>

                            <div class=" form-row mt-3">

                                <div class="col-lg-5 col-sm-6 text-right mt-2">
                                    <a href="">Forgot password</a>

                                </div>

                                <div class="col-lg-5 col-sm-6 text-left">
                                    <button type="submit" name="submit" class="btn button-2 ml-3">Submit</button>
                                </div>



                            </div>

                        </form>

                        <?php

                        if (isset($_GET['error'])) {

                            echo '<p class="mt-5">Your Login Name or Password is invalid</p>';
                        }
                        ?>
                    </div>


                </div>

            </div>
        </div>

    </div>

    <nav class="navbar main-header ">
        <h4 class="mx-auto">HUMAN RESOURCES MANAGEMENT SYSTEM</h4>
        <div class="text-right">
            <h6 class="">Ajax Version 1.01</h6>
        </div>
    </nav>

    </footer> -->

</body>

</html>