<?php
$username = '';
$email = '';
$ps1 = '';
$ps2 = '';
$error = array("username"=>'',
                "ps1"=>'',
                "ps2"=>'',
                "email"=>'',
                "total"=>'');
// clicked submit
if (isset($_POST['submit'])){
    // input username
    if (empty($_POST['username'])){
        $error['username'] = "you have to enter your name <br>";
    }
    else {
        $username = $_POST['username'];
        if (!preg_match('/^[a-z]+$/', $username)){
            $error['username'] = "your name must writin by lower case (JUST lower case) <br>";
        }
    }
    //input password for first time
    if (empty($_POST['ps1'])){
        $error['ps1'] = "Password required <br>";
    }
    else {
        $ps1 = $_POST['ps1'];
        if (!preg_match('/^[a-zA-Z\w\S]+$/', $ps1)){
            $error['ps1'] = "Password must be include just lettes, numbers or underscore <br>";
        }
    }
    //input password for second time
    if (empty($_POST['ps2'])){
        $error['ps2'] = "Confirming password required <br>";
    }
    else {
        $ps2 = $_POST['ps2'];
        if (!preg_match('/^[a-zA-Z\w\S]+$/', $ps2)){
            $error['ps2'] = "Password must be include just lettes, numbers or underscore <br>";
        }
        else{
            if ($ps1 != $ps2){
                $error['total'] = "Password must be matched";
            }
        }
    }
    // input email
    if (empty($_POST['email'])){
        $error['email'] = "Email required <br>";
    }
    else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email'] = "Email is invalid <br>";
        }
    }

    if (array_filter($error)){
        $error['total'] = "There are some errors in your sign-up form";
    }
    else {
        header("Location: log-in.php");
    }
}

?>
