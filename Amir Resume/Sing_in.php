<?php
$username = '';
$email = '';
$pass = '';
$error = array("username"=>'',
                "pass"=>'',
                "total"=>'');
// submit clicked
if (isset($_POST['submit'])){
    // username input
    if (empty($_POST['username'])){
        $error['username'] = "you must enter your name<br>";
    }
    else {
        $username = $_POST['username'];
        if (!preg_match('/^[a-z]+$/', $username)){
            $error['username'] = "your name must writin by lower case (JUST lower case) <br>";
        }
    }
    // password input
    if (empty($_POST['pass'])){
        $error['pass'] = " you have to entere your password <br>";
    }
    else {
        $pass = $_POST['pass'];
        if (!preg_match('/^[a-zA-Z\w\S]+$/', $pass)){
            $error['pass'] = " you must use a-z , A-Z , numbers and no space between your writings <br>";
        }
    }

    if (array_filter($error)){
        $error['total'] = "your answers arent true";
    }
    else {
        header("Location: main.php");
    }
}