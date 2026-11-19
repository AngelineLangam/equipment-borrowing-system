<?php
require "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = trim($_POST["student_id"]);
    $equipment = trim($_POST["equipment"]);
    $quantity = intval($_POST["quantity"]);
    $borrow_date = $_POST["borrow_date"];

    
    if (empty($student_id) || empty($equipment) || $quantity <= 0 || empty($borrow_date)) {
        die("Error: All fields are required and quantity must be greater than zero. <a href='borrow.php'>Go back</a>");
    }

    $sql = "INSERT INTO borrow_requests (student_id, equipment, quantity, borrow_date) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $student_id, $equipment, $quantity, $borrow_date);

    if ($stmt->execute()) {
        header("Location: borrowing_log.php", true, 303);
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>