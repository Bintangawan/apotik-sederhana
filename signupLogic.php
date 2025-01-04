<?php
session_start(); // Tambahkan session
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['createpassword'] ?? '';
    $confirm_password = $_POST['confirmpassword'] ?? '';
    $terms = isset($_POST['terms']) ? 1 : 0;

    $errors = [];

    // Simpan data form ke dalam session
    $_SESSION['form_data'] = [
        'username' => $username,
        'email' => $email,
        'createpassword' => $password,
        'confirmpassword' => $confirm_password
    ];

    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (!$terms) {
        $errors[] = "You must accept the Terms and Conditions.";
    }

    if (!empty($errors)) {
        // Simpan pesan error dalam session
        $_SESSION['messages'] = [
            'type' => 'error',
            'messages' => $errors
        ];
        header('Location: signup');
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    try {
        $query = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $koneksi->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $emailExists = $stmt->fetchColumn();

        if ($emailExists) {
            $_SESSION['messages'] = [
                'type' => 'error',
                'messages' => ["Email is already registered."]
            ];
            header('Location: signup');
            exit;
        }

        $query = "INSERT INTO users (username, email, password, terms_accepted) VALUES (:username, :email, :password, :terms)";
        $stmt = $koneksi->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':terms', $terms, PDO::PARAM_BOOL);
        $stmt->execute();

        unset($_SESSION['form_data']); // Hapus data form jika berhasil

        $_SESSION['messages'] = [
            'type' => 'success',
            'messages' => ["Registration successful! You can now login."]
        ];
        header('Location: signin');
        exit;
    } catch (PDOException $e) {
        $_SESSION['messages'] = [
            'type' => 'error',
            'messages' => ["Error: " . $e->getMessage()]
        ];
        header('Location: signup');
        exit;
    }
} else {
    $_SESSION['messages'] = [
        'type' => 'error',
        'messages' => ["Invalid request method."]
    ];
    header('Location: signup');
    exit;
}
