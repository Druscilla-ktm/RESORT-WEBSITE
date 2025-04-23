<?php
$conn = new mysqli("localhost", "root", "", "resort_db");
if ($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
if ($conn->query($sql)===TRUE){
    echo "Message sent successfully!";
}
else{
    echo "Error" . $conn->error;
}
$conn->close();
?>

