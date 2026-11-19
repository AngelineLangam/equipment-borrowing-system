<?php
require "config.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "DELETE FROM borrow_requests WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        
        header("Location: borrowing_log.php", true, 303);
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: borrowing_log.php");
    exit();
}
?>