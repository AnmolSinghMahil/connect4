<?php
// Include config file
require_once 'config_mysql.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT userID, username, password FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = $username;
			// echo $param_username;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);  
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
					mysqli_stmt_bind_result($stmt,$userID, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
						//echo $password ."<br>";
						//echo $hashed_password ."<br>";
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['userID'] = $userID;
                            $_SESSION['username'] = $username;      
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../login.css" />
</head>
<body>
    <div id="container">
        <div id="formContainer">
        <div id="titleLogin"> Login</div>
        <!-- <p>Please fill in your credentials to login.</p> -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div id="centerInputs">
            <div  id="username" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
                <input id="inputUsername" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
                <span><?php echo $username_err; ?></span>
            </div>    
            <div id="password" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input id="inputPassword" type="password" name="password" placeholder="Password" >
                <span><?php echo $password_err; ?></span>
            </div>
            <div id="submit">
                <input id="inputSubmit" type="submit" value="Login">
            </div>
            </div>
            <p>Don't have an account? <a href="register_mysql.php">Sign up now</a>.</p>
        </form>
        </div>
    </div>    
</body>
</html>