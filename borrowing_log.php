<?php
require "config.php";

$sql = "SELECT * FROM borrow_requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowing Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 20px; background-color: #f4f4f9; }
        .table-container { background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="container table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Borrowing Log</h2>
            
            <a href="borrow.php" class="btn btn-primary">Add New Request</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark ">
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Equipment</th>
                    <th>Quantity</th>
                    <th>Borrow Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                ?>
                    <tr>
                        
                        <td><?php echo htmlspecialchars($row["id"]) ?></td>
                        <td><?php echo htmlspecialchars($row["student_id"]) ?></td>
                        <td><?php echo htmlspecialchars($row["equipment"]) ?></td>
                        <td><?php echo htmlspecialchars($row["quantity"]) ?></td>
                        <td><?php echo htmlspecialchars($row["borrow_date"]) ?></td>
                        <td>
                            
                            <a href="edit_request.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-warning">Edit</a>
                            
                            
                            <a href="delete_request.php?id=<?php echo $row["id"]; ?>" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('Are you sure you want to delete this record?');">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php 
                    } 
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>