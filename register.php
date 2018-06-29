<?php
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
$error = false;
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $nrtel = mysqli_real_escape_string($con, $_POST['nrtel']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']); 
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $uname_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
     if(strlen($nrtel) != 10) {
        $error = true;
        $telefon_error = "Numarul de telefon trebuie sa aiba 10 caractere";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO users(user, email, nrtel, pass) VALUES('" . $name . "', '" . $email . "', '" . $nrtel . "' , '" . md5($password) . "')")) {
            $success_message = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $error_message = "Error in registering...Please try again later!";
        }
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carpool Iasi </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="style/slider.css">
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <link rel="stylesheet" type="text/css" href="ceva1.css">
</head>
<body>
<!-- Header -->
<div class="allcontain">
    <div class="header">
            <ul class="socialicon">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
            <ul class="givusacall">
                <li>Give us a call: +0232 --- --- </li>
            </ul>
            <ul class="logreg">
                <li><a href="login.php">Login </a> </li>
                <li><a href="register.php"><span class="register">Register</span></a></li>
            </ul>
    </div>
    <!-- Navbar Up -->
    <nav class="topnavbar navbar-default topnav">
        <div class="collapse navbar-collapse" id="upmenu">
            <ul class="nav navbar-nav" id="navbarontop">
                <li class="active"><a href="index.php">HOME</a> </li>
                <li>
                    <a href="contact.php">CONTACT</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!--_______________________________________ Carousel__________________________________ -->
<div class="allcontain">
    <div id="carousel-up" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner " role="listbox">
<div class="container"> 
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                    <legend>Sign Up</legend>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($uname_error)) echo $uname_error; ?></span>
                    </div>                  
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Numar de telefon</label>
                        <input type="text" name="nrtel" placeholder="Numar de telefon" required value="<?php if($error) echo $nrtel; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($telefon_error)) echo $telefon_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-success"><?php if (isset($success_message)) { echo $success_message; } ?></span>
            <span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">  
        Already Registered? <a href="login.php">Login Here</a>
        </div>
    </div>  
</div>
    </div>
</div>

                    
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
    <!-- ______________________________________________________Bottom Menu ______________________________-->
    <div class="bottommenu">
            <div class="footer">
                <div class="atisda">

                     Owner: <a>Dominte Stefan </a> 
                </div>
            </div>
    </div>
</div>


</body>
</html>