<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
   
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        // $usertype    = stripslashes($_REQUEST['']);
        // $usertype    = mysqli_real_escape_string($con, $usertype);
      
        $query    = "INSERT into `login` (username, password, email)
                     VALUES ('$username', '" . md5($password) . "', '$email')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>

        <center>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required /> <br>
        <br>
        <input type="text" class="login-input" name="email" placeholder="Email Adress"> 
        <br>
        <br>
        <input type="password" class="login-input" name="password" placeholder="Password"> 
        <br>
        <br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
    </center>
<?php
    }
?>
</body>
</html>