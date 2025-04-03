<?php
include_once '../../config/db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $sow_id = $_POST['sow_id'];
    $parity_id = $_POST['parity_id'];
    $entry_date = $_POST['entry_date'];
    $total_heads = $_POST['total_heads'];
    $total_feed_consumed = $_POST['total_feed_consumed'];
    $total_weight_gain = $_POST['total_weight_gain'];
    $manual_batch_number = $_POST['manual_batch_number']; // The manual batch number input (INT)

    // Insert query (batch_id will auto-increment)
    $sql = "INSERT INTO fatteners_batches (sow_id, parity_id, entry_date, total_heads, total_feed_consumed, total_weight_gain, manual_batch_number) 
            VALUES ('$sow_id', '$parity_id', '$entry_date', '$total_heads', '$total_feed_consumed', '$total_weight_gain', '$manual_batch_number')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Batch added successfully!'); window.location.href='batch_list.php';</script>";
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
    <title>Add Fatteners Batch</title>
</head>
<body>
    <h2>Add Fatteners Batch</h2>
    <form action="" method="POST">

        <!-- Fetch and Display Sow ID from 'sows' table -->
        <label for="sow_id">Sow ID:</label>
        <select name="sow_id" required>
            <option value="">Select Sow</option>
            <?php
            $sow_query = "SELECT sow_id, tag_number FROM sows";
            $sow_result = mysqli_query($conn, $sow_query);
            if (mysqli_num_rows($sow_result) > 0) {
                while ($row = mysqli_fetch_assoc($sow_result)) {
                    echo "<option value='" . $row['sow_id'] . "'>" . $row['tag_number'] . "</option>";
                }
            } else {
                echo "<option value=''>No Sows Available</option>";
            }
            ?>
        </select><br>

        <!-- Fetch and Display Parity ID from 'parity_details' table -->
        <label for="parity_id">Parity ID:</label>
        <select name="parity_id" required>
            <option value="">Select Parity ID</option>
            <?php
            $parity_query = "SELECT parity_id FROM parity_details";
            $parity_result = mysqli_query($conn, $parity_query);
            if (mysqli_num_rows($parity_result) > 0) {
                while ($row = mysqli_fetch_assoc($parity_result)) {
                    echo "<option value='" . $row['parity_id'] . "'>" . $row['parity_id'] . "</option>";
                }
            } else {
                echo "<option value=''>No Parity IDs Found</option>";
            }
            ?>
        </select><br>

        <label for="entry_date">Entry Date:</label>
        <input type="date" name="entry_date" required><br>

        <label for="total_heads">Total Heads:</label>
        <input type="number" name="total_heads" required><br>

        <label for="total_feed_consumed">Total Feed Consumed (kg):</label>
        <input type="number" step="0.01" name="total_feed_consumed" required><br>

        <label for="total_weight_gain">Total Weight Gain (kg):</label>
        <input type="number" step="0.01" name="total_weight_gain" required><br>

        <!-- Input field for manual batch number (INT) -->
        <label for="manual_batch_number">Manual Batch Number:</label>
        <input type="number" name="manual_batch_number" placeholder="Optional" /><br>

        <button type="submit">Add Batch</button>
    </form>
</body>
</html>
