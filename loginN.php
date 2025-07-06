<?php
session_start();
require 'db_connect.php'; // Ensures $pdo is connected

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower(trim(filter_input(INPUT_POST, 'login_user_email', FILTER_SANITIZE_EMAIL)));
    $password = trim($_POST['login_user_pass'] ?? '');

    if (empty($email) || empty($password)) {
        $error_message = "Please fill all fields";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format";
    } else {
        // Check if email exists
        $stmt = $pdo->prepare("SELECT id, full_name, password FROM users WHERE LOWER(email) = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Set session and redirect
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Invalid email or password";
        }
    }
}
?>

<!-- HTML Code Below -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - TrendOrbit</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body.login-page-body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-image: url('assets/LoignBGimg.png');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-box {
      background-color: rgba(0, 0, 0, 0.85);
      padding: 50px 40px;
      border-radius: 12px;
      width: 450px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      text-align: center;
    }
    .login-box h2 {
      color: #fff;
      margin-bottom: 30px;
      font-size: 28px;
    }
    .login-form-user input {
      width: 80%;
      padding: 14px 18px;
      margin: 12px 0;
      border: none;
      border-radius: 6px;
      background-color: #fff;
      color: #111;
      font-size: 16px;
      box-sizing: border-box;
    }
    .login-form-user input::placeholder {
      color: #666;
    }
    .forgot-password {
      text-align: right;
      margin-top: 4px;
      margin-bottom: 15px;
    }
    .forgot-password a {
      color: #bbb;
      font-size: 14px;
      text-decoration: none;
    }
    .forgot-password a:hover {
      text-decoration: underline;
    }
    .login-form-user button {
      width: 40%;
      padding: 14px;
      background-color: #8C6B4F;
      color: #f8f8f8;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      margin-top: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .login-form-user button:hover {
      background-color: #ddd;
      color: #333;
    }
    .login-to-signup {
      color: white;
      font-size: 14px;
      margin-top: 20px;
    }
    .login-to-signup a {
      color: #8c6b4f;
      text-decoration: none;
    }
    .error-message {
      color: #ff3860;
      font-size: 0.9em;
      margin-bottom: 15px;
      text-align: center;
    }
  </style>
</head>
<body class="login-page-body">
  <div class="login-box">
    <h2>User Login</h2>

    <?php if ($error_message): ?>
      <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
    <?php endif; ?>

    <form class="login-form-user" method="POST" action="loginN.php" novalidate>
      <input type="email" name="login_user_email" placeholder="Email Address" required value="<?php echo isset($_POST['login_user_email']) ? htmlspecialchars($_POST['login_user_email']) : '' ?>" />
      <input type="password" name="login_user_pass" placeholder="Password" required />

      <div class="forgot-password">
        <a href="forgot_password.php">Forgot Password?</a>
      </div>

      <button type="submit">Login</button>
      <p class="login-to-signup">Don't have an account? <a href="registerN.php">Register</a></p>
    </form>
  </div>
</body>
</html>
