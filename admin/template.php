    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "INSERT into `users` (username, password, email)
                     VALUES ('$username', '" . md5($password) . "', '$email')";
        $result   = mysqli_query($con, $query);
        //check if ther password length is more that 6 characters
        
        if ($result) {
            echo "<div class='form'>
                  <h3>You have registered an Admin successfully.</h3><br/>
                  <p class='link'>Click here to go <a href='admindash.php'>BACK</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>register Admin</a> again.</p>
                  </div>";
        }
    }