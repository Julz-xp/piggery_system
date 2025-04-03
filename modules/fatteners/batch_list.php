<?php
include_once '../../config/db.php'; // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatteners Batch List</title>
</head>
<body>
    <h2>Fatteners Batch List</h2>
    <a href="batch_add.php">+ Add New Batch</a>
    <table border="1">
        <thead>
            <tr>
                <th>Batch ID</th>
                <th>Sow ID</th>
                <th>Parity ID</th>
                <th>Entry Date</th>
                <th>Total Heads</th>
                <th>Feed Consumed (kg)</th>
                <th>Weight Gain (kg)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM fatteners_batches ORDER BY entry_date DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['batch_id']}</td>";
                    echo "<td>{$row['sow_id']}</td>";
                    echo "<td>{$row['parity_id']}</td>";
                    echo "<td>{$row['entry_date']}</td>";
                    echo "<td>{$row['total_heads']}</td>";
                    echo "<td>{$row['total_feed_consumed']}</td>";
                    echo "<td>{$row['total_weight_gain']}</td>";
                    echo "<td>
                            <a href='batch_edit.php?id={$row['batch_id']}'>Edit</a> | 
                            <a href='batch_delete.php?id={$row['batch_id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
