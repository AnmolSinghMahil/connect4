<?php
// Include config file
require_once 'config_mysql.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT username FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);       
            // Set parameters
            $param_username = trim($_POST["username"]);          
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);   
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login_mysql.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="../register.css" />
</head>
<body>
    <div id="container">
        <div id="formContainer">
        <div id="titleSignup">Signup </div>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div id="username" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <!-- <label>Username:<sup>*</sup></label> -->
                <input id="inputUsername"type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
            </div>    
            <div id="errors"><?php echo $username_err; ?></div>
            <div id="password"<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <!-- <label>Password:<sup>*</sup></label> -->
                <input id="inputPassword" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
            </div>
            <span id="errors"><?php echo $password_err; ?></span>
            <div id="password" <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <!-- <label>Confirm Password:<sup>*</sup></label> -->
                <input id="inputPassword" type="password" name="confirm_password" placeholder="Confirm password" value="<?php echo $confirm_password; ?>">
            </div>
            <span id="errors"><?php echo $confirm_password_err; ?></span>
            <div id="submit">
                <input id="inputSubmit" type="submit" value="Submit">
                <input id="inputSubmit" type="reset"  value="Reset">
            </div>
            <p>Already have an account? <a href="login_mysql.php">Login here</a>.</p>
        </form>
        </div>
    </div>    
</body>
</html>