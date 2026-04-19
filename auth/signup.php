<?php
    $showAlert = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include __DIR__ . '/../partials/_dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        
        //check whether this username exists
        $existsSql = "SELECT * FROM `users` WHERE `username` = '$username'";
        $result = mysqli_query($connection, $existsSql);
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0){
            $showError = "Username already exists!";
        }
        else{
            if ($password == $cpassword){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
                $result = mysqli_query($connection, $sql);
                if ($result){
                    $showAlert = true;
                }
            }
            else{
                $showError = "Passwords do not match!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Sole Purpose</title>
    <?php include __DIR__ . '/../config.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
<!-- Use PHP include for the header -->
<?php include __DIR__ . '/../header.php'; ?>

    <main class="login-container">
        <div id="login-section" class="form-container active">
            <h2>Create Your Account</h2>

            <!-- PHP code to show alerts -->
            <?php
                if ($showAlert){
                    echo '<p style="color: green; text-align: center;">Success! Your account is created. You can now <a href="login.php">login</a>.</p>';
                }
                if ($showError){
                    echo '<p style="color: red; text-align: center;">' . htmlspecialchars($showError) . '</p>';
                }
            ?>

            <!-- The form now posts to signup.php (this file) -->
            <form id="signup-form" action="signup.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" maxlength="11" required>
                    <p class="error-message" id="username-error"></p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" maxlength="23" required>
                    <p class="error-message" id="password-error"></p>
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" id="cpassword" name="cpassword" required>
                    <small style="font-size: 0.8rem; color: #777;">Make sure to type the same password!</small>
                    <p class="error-message" id="cpassword-error"></p>
                </div>
                <button type="submit" class="btn-primary">SignUp</button>
            </form>
            <p style="text-align: center; margin-top: 1rem;">
                Already have an account? <a href="login.php">Login here</a>
            </p>
        </div>
    </main>

<!-- Use PHP include for the footer -->
<?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
