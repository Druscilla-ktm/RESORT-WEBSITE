
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$username = "root";
$password = "";
$database = "resort_db";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to DB
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get and sanitize form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $room_type = $_POST['room_type'];
    $rooms = $_POST['rooms'];
    $bed = $_POST['bed'];
    $view = $_POST['view'];
    $smoking = $_POST['smoking'];
    $payment = $_POST['payment'];
    $special = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO reservations (name, email, checkin, checkout, adults, children, room_type, rooms, bed_preference, view_preference, smoking_preference, payment_method, special_request)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiiissssss", $name, $email, $checkin, $checkout, $adults, $children, $room_type, $rooms, $bed, $view, $smoking, $payment, $special);

    if ($stmt->execute()) {
        echo "Reservation successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    die("Invalid request method.");
}
?>
