<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: white; display: flex; justify-content: center; align-items: center; height: 100vh;">

    <div class="form-container" style="background-color: #91f5f9; padding: 30px; border-radius: 8px; width: 100%; max-width: 400px;">
 
        <form action="save_request.php" method="POST">

            <div class="mb-3">
                <label for="student_id" class="form-label" style="font-weight: bold; color: #333;">Student ID:</label>
                <input type="text" class="form-control" name="student_id" id="student_id" placeholder="Enter student ID">
            </div>

            <div class="mb-3">
                <label for="equipment" class="form-label" style="font-weight: bold; color: #333;">Equipment Name:</label>
                <input type="text" class="form-control" name="equipment" id="equipment" placeholder="Enter equipment">
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label" style="font-weight: bold; color: #333;">Quantity:</label>
                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity">
            </div>

            <div class="mb-3">
                <label for="borrow_date" class="form-label" style="font-weight: bold; color: #333;">Borrow date:</label>
                <input type="date" class="form-control" name="borrow_date" id="borrow_date" placeholder="Enter borrow date">
            </div>

            <div class="mt-4">
 
                <button type="submit" class="btn btn-success w-100" style="padding: 10px; font-size: 16px;">Submit</button>
            </div>

        </form>
    </div>
</body>

</html>