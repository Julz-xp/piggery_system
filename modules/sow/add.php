<?php
include '../../config/db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tag_number = $_POST['tag_number'];
    $breed = $_POST['breed'];
    $birth_date = $_POST['birth_date'];
    $acquisition_date = $_POST['acquisition_date'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO sows (tag_number, breed, birth_date, acquisition_date, status, notes) 
            VALUES ('$tag_number', '$breed', '$birth_date', '$acquisition_date', '$status', '$notes')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Sow added successfully!'); window.location.href='list.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sow</title>
</head>
<body>
    <h2>Add New Sow</h2>
    <form method="POST" action="">
        <label>Tag Number:</label>
        <input type="text" name="tag_number" required><br>

        <label>Breed:</label>
        <input type="text" name="breed" required><br>

        <label>Birth Date:</label>
        <input type="date" name="birth_date" required><br>

        <label>Acquisition Date:</label>
        <input type="date" name="acquisition_date" required><br>

        <label>Status:</label>
        <select name="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select><br>

        <label>Notes:</label>
        <textarea name="notes"></textarea><br>

        <button type="submit">Add Sow</button>
    </form>
</body>
</html>
