<?php
include '../../config/db.php'; // Database connection

$sql = "SELECT * FROM sows ORDER BY sow_id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sows List</title>
</head>
<body>
    <h2>Sows List</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tag Number</th>
                <th>Breed</th>
                <th>Birth Date</th>
                <th>Acquisition Date</th>
                <th>Status</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['sow_id']; ?></td>
                    <td><?= $row['tag_number']; ?></td>
                    <td><?= $row['breed']; ?></td>
                    <td><?= $row['birth_date']; ?></td>
                    <td><?= $row['acquisition_date']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['notes']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['sow_id']; ?>">Edit</a> | 
                        <a href="delete.php?id=<?= $row['sow_id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <br>
    <a href="add.php">Add New Sow</a>
</body>
</html>
