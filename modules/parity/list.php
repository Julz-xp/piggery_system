<?php
include '../../config/db.php';

// Fetch parity records with sow tag
$sql = "SELECT p.*, s.tag_number 
        FROM parity_details  p
        JOIN sows s ON p.sow_id = s.sow_id
        ORDER BY p.parity_no ASC, p.birth_date DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parity Records</title>
</head>
<body>
    <h2>Parity Records</h2>
    <a href="add.php">➕ Add New Parity</a>
    <table border="1">
        <tr>
            <th>Sow Tag</th>
            <th>Batch ID</th>
            <th>Parity No.</th>
            <th>Source</th>
            <th>Check Date</th>
            <th>Mating Date</th>
            <th>Expected Farrowing</th>
            <th>Birth Date</th>
            <th>Total Born</th>
            <th>Live Births</th>
            <th>Stillbirths</th>
            <th>Weaning Date</th>
            <th>Mortality</th>
            <th>Piglets Weaned</th>
            <th>Male Count</th>
            <th>Female Count</th>
            <th>Num. Heads</th>
            <th>Date of Sell</th>
            <th>Avg. Weight (kg)</th>
            <th>Sale Price/kg</th>
            <th>Total Revenue</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= htmlspecialchars($row['tag_number']); ?></td>
            <td><?= htmlspecialchars($row['batch_id']); ?></td>
            <td><?= htmlspecialchars($row['parity_no']); ?></td>
            <td><?= htmlspecialchars($row['source']); ?></td>
            <td><?= htmlspecialchars($row['check_date']); ?></td>
            <td><?= htmlspecialchars($row['mating_date']); ?></td>
            <td><?= htmlspecialchars($row['expected_farrowing_date']); ?></td>
            <td><?= htmlspecialchars($row['birth_date']); ?></td>
            <td><?= htmlspecialchars($row['total_born']); ?></td>
            <td><?= htmlspecialchars($row['live_births']); ?></td>
            <td><?= htmlspecialchars($row['stillbirths']); ?></td>
            <td><?= htmlspecialchars($row['weaning_date']); ?></td>
            <td><?= htmlspecialchars($row['mortality']); ?></td>
            <td><?= htmlspecialchars($row['piglets_weaned']); ?></td>
            <td><?= htmlspecialchars($row['male_count']); ?></td>
            <td><?= htmlspecialchars($row['female_count']); ?></td>
            <td><?= htmlspecialchars($row['num_heads']); ?></td>
            <td><?= htmlspecialchars($row['date_of_sell']); ?></td>
            <td><?= htmlspecialchars($row['avg_kg']); ?></td>
            <td><?= htmlspecialchars($row['sale_price_kg']); ?></td>
            <td><?= htmlspecialchars($row['total_revenue']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['parity_id']; ?>">✏ Edit</a> | 
                <a href="delete.php?id=<?= $row['parity_id']; ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
