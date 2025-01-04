<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginInput = $_POST['username_email'] ?? ''; // Bisa berupa email atau username
    $password = $_POST['password'] ?? '';
    $errors = [];

    // Simpan input lama
    $_SESSION['old_inputs'] = ['username_email' => $loginInput];

    if (empty($loginInput)) {
        $errors[] = "Email or Username is required.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (!empty($errors)) {
        $_SESSION['messages'] = [
            'type' => 'error',
            'messages' => $errors
        ];
        header('Location: signin');
        exit;
    }

    try {
        // Query untuk mencari user berdasarkan email atau username
        $query = "SELECT id, username, email, password FROM users WHERE email = :loginInput OR username = :loginInput";
        $stmt = $koneksi->prepare($query);
        $stmt->bindParam(':loginInput', $loginInput);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifikasi data pengguna
        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['messages'] = [
                'type' => 'error',
                'messages' => ["Invalid email/username or password."]
            ];
            header('Location: signin');
            exit;
        }

        // Hapus input lama saat berhasil login
        unset($_SESSION['old_inputs']);

        // Set session dan redirect ke halaman dashboard
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['messages'] = [
            'type' => 'success',
            'messages' => ["Sign in successful! Welcome back."]
        ];
        header('Location: index'); // Redirect ke dashboard
        exit;
    } catch (PDOException $e) {
        $_SESSION['messages'] = [
            'type' => 'error',
            'messages' => ["Error: " . $e->getMessage()]
        ];
        header('Location: signin');
        exit;
    }
} else {
    $_SESSION['messages'] = [
        'type' => 'error',
        'messages' => ["Invalid request method."]
    ];
    header('Location: signin');
    exit;
}
