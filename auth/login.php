<?php
    $login = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include __DIR__ . '/../partials/_dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $sql = "SELECT * FROM `users` WHERE `username`='$username'";
        $result = mysqli_query($connection, $sql);
        $num  = mysqli_num_rows($result);

        if ($num == 1){
            while($row = mysqli_fetch_assoc($result)){
                if (password_verify($password, $row['password'])){
                    $login = true;
                    session_start();
                    $_SESSION['Loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("location: profile.php"); // Redirect to profile page
                    exit;
                }
                else{
                    $showError = "Invalid Password!";
                }
            }
        }
        else{
            $showError = "Invalid Username!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sole Purpose</title>
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
            <h2>Welcome Back</h2>
            
            <!-- PHP code to show alerts -->
            <?php
                if ($login){
                    echo '<p style="color: green; text-align: center;">You are logged in.</p>';
                }
                if ($showError){
                    echo '<p style="color: red; text-align: center;">' . htmlspecialchars($showError) . '</p>';
                }
            ?>

            <!-- The form now posts to login.php (this file) -->
            <form id="login-form" action="login.php" method="post">
                <div class="form-group">
                    <!-- Changed label to 'Username' to match backend -->
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                    <p class="error-message" id="username-error"></p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <p class="error-message" id="password-error"></p>
                </div>
                <button type="submit" class="btn-primary">Login</button>
            </form>
             <p style="text-align: center; margin-top: 1rem;">
                Don't have an account? <a href="signup.php">Signup here</a>
            </p>
        </div>
    </main>

<!-- Use PHP include for the footer -->
<?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
