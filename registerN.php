<?php
session_start();
require 'db_connect.php'; // make sure $pdo is defined

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = trim($_POST['signup_user_name'] ?? '');
    $email = filter_var($_POST['signup_user_email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST['signup_user_phone'] ?? '');
    $password = $_POST['signup_user_pass'] ?? '';
    $confirm_password = $_POST['signup_user_confirm'] ?? '';

    if (!$full_name || !$email || !$phone || !$password || !$confirm_password) {
        $error_message = "Please fill all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        $error_message = "Phone number must be 10 to 15 digits.";
    } elseif (strlen($password) < 6) {
        $error_message = "Password must be at least 6 characters.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        // Check existing user
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            $error_message = "Email is already registered.";
        } else {
            // Register new user
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (full_name, email, phone, password, created_at) VALUES (?, ?, ?, ?, NOW())");

            if ($stmt->execute([$full_name, $email, $phone, $password_hash])) {
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['user_name'] = $full_name;
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Something went wrong during registration.";
            }
        }
    }
}
?>

<!-- HTML Part Below -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - TrendOrbit</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body.signup-page-body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-image: url('assets/LoignBGimg.png');
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .signup-box {
      background-color: rgba(0, 0, 0, 0.85);
      padding: 50px 40px;
      border-radius: 12px;
      width: 420px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .signup-box h2 {
      color: #fff;
      margin-bottom: 30px;
      font-size: 28px;
    }

    .signup-form-user input {
      width: 85%;
      padding: 12px 16px;
      margin: 10px 0;
      border: none;
      border-radius: 6px;
      background-color: #fff;
      color: #111;
      font-size: 15px;
      box-sizing: border-box;
    }

    .signup-btn {
      width: 50%;
      padding: 12px;
      background-color: #8C6B4F;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 15px;
      font-weight: 600;
      margin-top: 14px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .signup-btn:hover {
      background-color: #7a5d45;
    }

    .signup-to-login {
      color: white;
      font-size: 14px;
      margin-top: 20px;
    }

    .signup-to-login a {
      color: #8C6B4F;
      text-decoration: none;
    }

    .error-message {
      background-color: #ff3860;
      color: white;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 6px;
      font-size: 14px;
    }
  </style>
</head>
<body class="signup-page-body">
  <div class="signup-box">
    <h2>Create Account</h2>

    <?php if ($error_message): ?>
      <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
    <?php endif; ?>

    <form class="signup-form-user" method="POST" action="registerN.php" novalidate>
      <input type="text" name="signup_user_name" placeholder="Full Name" required value="<?php echo htmlspecialchars($_POST['signup_user_name'] ?? '') ?>" />
      <input type="email" name="signup_user_email" placeholder="Email Address" required value="<?php echo htmlspecialchars($_POST['signup_user_email'] ?? '') ?>" />
      <input type="tel" name="signup_user_phone" placeholder="Phone Number" pattern="[0-9]{10,15}" required value="<?php echo htmlspecialchars($_POST['signup_user_phone'] ?? '') ?>" />
      <input type="password" name="signup_user_pass" placeholder="Password (6+ characters)" required />
      <input type="password" name="signup_user_confirm" placeholder="Confirm Password" required />
      <button type="submit" class="signup-btn">Register</button>
      <p class="signup-to-login">Already have an account? <a href="login.php">Login</a></p>
    </form>
  </div>
</body>
</html>
