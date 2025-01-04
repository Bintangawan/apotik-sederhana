<?php
session_start();
$messages = $_SESSION['messages'] ?? null;
$old_inputs = $_SESSION['old_inputs'] ?? ['username_email' => ''];
unset($_SESSION['messages'], $_SESSION['old_inputs']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
        <h1>Sign In</h1>
        <p class="subtitle">Please enter your credentials to sign in.</p>

        <!-- Tampilkan pesan sukses atau error -->
        <?php if ($messages): ?>
            <div class="alert <?php echo $messages['type']; ?>">
                <?php foreach ($messages['messages'] as $message): ?>
                    <p><?php echo htmlspecialchars($message); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk sign in -->
        <form action="signinLogic.php" method="POST">
            <div class="form-group">
                <label for="username_email">Email or Username</label>
                <input 
                    type="text" 
                    id="username_email" 
                    name="username_email" 
                    value="<?php echo htmlspecialchars($old_inputs['username_email']); ?>" 
                    placeholder="Masukkan Email atau Username Anda" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-field">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan Password Anda" 
                        required
                    >
                </div>
            </div>

            <button type="submit" name="submit" class="create-account">Sign In</button>

            <p class="register-link">
                Don't have an account? <a href="signup">Sign Up</a>
            </p>
        </form>
    </div>
</body>
</html>
