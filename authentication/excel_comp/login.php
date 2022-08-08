<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "excel_comp";

session_start();

$dbcon = mysqli_connect($host, $user, $password, $db);
if($dbcon === false)
{
    die("connection_error");
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "select * from login where username = '".$username."' AND '".$password."'";

    $result = mysqli_query($dbcon,$sql);

    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="user")
    {   $_SESSION['username']=$username;
        header("Location:userhome.php");
    }
    elseif($row["usertype"]=="admin")
    {     $_SESSION['username']=$username;
        header("Location:adminhome.php");
    }
    else
    {
        echo "Username or password incorrect";
    }
}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Login Form</h1>
        <div>
        <br><br>

        <form action="#" method="POST">
    <div>
        <label for="">Username</label>
        <input type="text" name="username" required>
    </div>
    <br><br>
    <div>
        <label for="">Password</label>
        <input type="password" name="password" required>
    </div>
    <br><br>
    <div>
        <input type="submit" value="Login">
    </div>
    </form>
    <br><br>
    </div>
    <p class="link"><a href="register.php">Click to Register</a></p>
</center>
</body>
</html>