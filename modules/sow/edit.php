<?php
include '../../config/db.php'; // Database connection

// Get the sow ID from URL
$sow_id = $_GET['id'] ?? '';

// Fetch sow details
$sql = "SELECT * FROM sows WHERE sow_id = '$sow_id'";
$result = mysqli_query($conn, $sql);
$sow = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tag_number = $_POST['tag_number'];
    $breed = $_POST['breed'];
    $birth_date = $_POST['birth_date'];
    $acquisition_date = $_POST['acquisition_date'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];
    
    $update_sql = "UPDATE sows SET tag_number='$tag_number', breed='$breed', birth_date='$birth_date', acquisition_date='$acquisition_date', status='$status', notes='$notes' WHERE sow_id='$sow_id'";
    
    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Sow updated successfully!'); window.location.href='list.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Sow</title>
</head>
<body>
    <h2>Edit Sow</h2>
    <form method="POST">
        <label>Tag Number:</label>
        <input type="text" name="tag_number" value="<?= $sow['tag_number'] ?>" required><br>
        <label>Breed:</label>
        <input type="text" name="breed" value="<?= $sow['breed'] ?>" required><br>
        <label>Birth Date:</label>
        <input type="date" name="birth_date" value="<?= $sow['birth_date'] ?>" required><br>
        <label>Acquisition Date:</label>
        <input type="date" name="acquisition_date" value="<?= $sow['acquisition_date'] ?>" required><br>
        <label>Status:</label>
        <input type="text" name="status" value="<?= $sow['status'] ?>" required><br>
        <label>Notes:</label>
        <textarea name="notes"><?= $sow['notes'] ?></textarea><br>
        <button type="submit">Update Sow</button>
    </form>
</body>
</html>
```