<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'trendorbit_db';

$con = mysqli_connect($host, $username, $password, $dbname);

if (!$con) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>

<?php
$host = 'localhost';
$db   = 'trendorbit_db';      // <-- Change this
$user = 'root';
$pass = '';                        // <-- Keep empty for XAMPP
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
