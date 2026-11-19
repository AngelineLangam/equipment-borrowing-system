<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST["id"];
    $student_id = $_POST["student_id"];
    $equipment = $_POST["equipment"];
    $quantity = $_POST["quantity"];
    $borrow_date = $_POST["borrow_date"];

    
    $sql = "UPDATE borrow_requests SET student_id = ?, equipment = ?, quantity = ?, borrow_date = ? WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    
    
    $stmt->bind_param("ssisi", $student_id, $equipment, $quantity, $borrow_date, $id);

    if ($stmt->execute()) {
        
        header("Location: borrowing_log.php", true, 303);
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>