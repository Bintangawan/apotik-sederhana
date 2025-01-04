<?php
session_start();
$messages = $_SESSION['messages'] ?? null;

// Ambil data sebelumnya jika ada
$username = $_SESSION['form_data']['username'] ?? '';
$email = $_SESSION['form_data']['email'] ?? '';
$createpassword = $_SESSION['form_data']['createpassword'] ?? '';
$confirmpassword = $_SESSION['form_data']['confirmpassword'] ?? '';
$terms_checked = isset($_SESSION['form_data']['terms']) ? 'checked' : ''; // Untuk checkbox

unset($_SESSION['messages']);
unset($_SESSION['form_data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/sign.css">
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .alert.success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <svg class="logo" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
        </svg>
        <h1>Create Account</h1>
        <p class="subtitle">Please enter your details to create an account.</p>

        <!-- Tampilkan pesan sukses atau error -->
        <?php if ($messages): ?>
            <div class="alert <?php echo htmlspecialchars($messages['type']); ?>">
                <?php foreach ($messages['messages'] as $message): ?>
                    <p><?php echo htmlspecialchars($message); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk signup -->
        <form action="signupLogic.php" method="POST">
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" id="username" name="username" 
                       value="<?php echo htmlspecialchars($username); ?>" 
                       placeholder="Masukkan Username Anda" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" 
                       value="<?php echo htmlspecialchars($email); ?>" 
                       placeholder="bintangawan0418@gmail.com" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-field">
                    <input type="password" id="password" name="createpassword" 
                           value="<?php echo htmlspecialchars($createpassword); ?>" 
                           placeholder="Enter your password" required>
                </div>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <div class="password-field">
                    <input type="password" id="confirm-password" name="confirmpassword" 
                           value="<?php echo htmlspecialchars($confirmpassword); ?>" 
                           placeholder="Confirm your password" required>
                </div>
            </div>

            <div class="terms">
                <input type="checkbox" id="terms" name="terms" <?php echo $terms_checked; ?> required>
                <label for="terms">I accept <a href="#">Terms and Condition</a></label>
            </div>

            <button type="submit" name="submit" class="create-account">Create an account</button>

            <p class="register-link">
                Already have an account? <a href="signin">Login</a>
            </p>
        </form>
    </div>
</body>
</html>
