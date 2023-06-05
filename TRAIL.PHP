<?php
        // Create connections
        $conn1 = new mysqli("localhost", "root", "", "admission");


        if (isset($_POST['login'])) {
            $query = "SELECT * FROM `admin_login` WHERE `admin_id` = '$_POST[userid]' AND `admin_pass` = '$_POST[pass]'";
            $result = mysqli_query($conn1, $query);
            if (mysqli_num_rows($result) == 1) {
                session_start();
                $_SESSION['AdminLoginId']=$_POST['userid'];
                header("location: dash.php");
            } else {
                echo "<script>alert('incorrect password')</script>";
            }
        }
        ?>
        <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>404</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

</head>

<body>


   <div class="wrapper">
                <form method="POST" id="formvalidate">
                    <div class="input-group">
                        <input class="form-control"autocomplete  placeholder="USERNAME" name="userid" id="userName" type="text" />
                        <span class="lighting"></span>
                    </div>
                    <div class="input-group">
                        <input class="form-control" placeholder="PASSWORD" name="pass" type="password" />
                        <span class="lighting"></span>
                    </div>

                    <button type="submit" name="login" id="login">Login</button>
                    <div class="clearfix supporter">
                        <div class="pull-left remember-me">
                            <input id="rememberMe" type="checkbox">
                            <label for="rememberMe">Remember Me</label>
                        </div>
                        <a class="forgot pull-right" href="#">Forgot Password?</a>
                        
    
                    </div>
                </form>
            </div>
        </div>
</body>
</html>