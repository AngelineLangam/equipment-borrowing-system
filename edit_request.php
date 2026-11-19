<?php
require "config.php";

if (!isset($_GET['id'])) {
    header("Location: borrowing_log.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM borrow_requests WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Record not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <div class="form-container" style="background-color: #91f5f9; padding: 30px; border-radius: 8px; width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4" style="color: #333;">Edit Request</h3>
        
        <form action="update_request.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="mb-3">
                <label for="student_id" class="form-label" style="font-weight: bold; color: #333;">Student ID:</label>
                <input type="text" class="form-control" name="student_id" id="student_id" value="<?php echo htmlspecialchars($row['student_id']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="equipment" class="form-label" style="font-weight: bold; color: #333;">Equipment Name:</label>
                <input type="text" class="form-control" name="equipment" id="equipment" value="<?php echo htmlspecialchars($row['equipment']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label" style="font-weight: bold; color: #333;">Quantity:</label>
                <input type="number" class="form-control" name="quantity" id="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>" min="1" required>
            </div>

            <div class="mb-3">
                <label for="borrow_date" class="form-label" style="font-weight: bold; color: #333;">Borrow date:</label>
                <input type="date" class="form-control" name="borrow_date" id="borrow_date" value="<?php echo htmlspecialchars($row['borrow_date']); ?>" required>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success w-50">Save Changes</button>
                <a href="borrowing_log.php" class="btn btn-secondary w-50">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>