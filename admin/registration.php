<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Create Admin</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
 function RegisterUsser(){
    require('db.php');
    $error = "";
    if(isset($_REQUEST['submit'])){
        if(strlen($_POST['username']) >3 && strlen($_POST['email'])>4){
            //check if the password is greeter the=an six characters
            if(strlen($_REQUEST['password']) < 6){
                $error = "<h3 class='form-error'>password should be greeter or equal to 6 characters</h3>";
                echo $error;
            }else{
                //put values inside the database
                $username = stripslashes($_REQUEST['username']);
                //escapes special characters in a string
                $username = mysqli_real_escape_string($con, $username);
                $email    = stripslashes($_REQUEST['email']);
                $email    = mysqli_real_escape_string($con, $email);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);

                //check if email exits to avoid duplicates
                $query = "SELECT * FROM `users` WHERE email='$email'";
                    $result = mysqli_query($con, $query) or die(mysql_error());
                    $rows = mysqli_num_rows($result);
                if($rows > 1){
                    $error = "<h3 class='form-error'>User already exists  <a href='login.php'>Login</a></h3<br/> ";
                    echo $error;
                }else{
                           
                $query    = "INSERT into `users` (username, password, email)
                            VALUES ('$username', '" . md5($password) . "', '$email')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form-sucess'>
                        <h3>You have registered an Admin successfully.</h3>
                        <p> Redirecting to Dashboard</p>
                        </div>";
           ?>
           <script>
               setTimeout(() => {
                   window.location.replace("admindash.php");
               }, 2000);
           </script>
           <?php
   }
                }
             
            }
            
        }else{
            $error = "<h3 class='form-error'>Required fields are missing.</h3>";
            echo $error;
        }
    }
 }
?>
    <form class="form" action="" method="post">
      <?php RegisterUsser(); ?>
        <h1 class="login-title">Register Admin</h1>
        <input type="text" class="login-input" name="username" placeholder="Username"  />
        <input type="email" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Go back to Dashboard <a href="admindash.php">BACK</a></p>
    </form>

</body>
</html>
