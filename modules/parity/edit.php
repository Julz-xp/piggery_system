<?php
include '../../config/db.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid Request!'); window.location.href='list.php';</script>";
    exit();
}

$parity_id = $_GET['id'];

// Fetch the record
$sql = "SELECT * FROM parity_details WHERE parity_id = '$parity_id'";
$result = mysqli_query($conn, $sql);
$parity = mysqli_fetch_assoc($result);

if (!$parity) {
    echo "<script>alert('Record not found!'); window.location.href='list.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $batch_id = $_POST['batch_id'];
    $parity_no = $_POST['parity_no'];
    $source = $_POST['source'];
    $check_date = $_POST['check_date'];
    $mating_date = $_POST['mating_date'];
    $expected_farrowing_date = $_POST['expected_farrowing_date'];
    $birth_date = $_POST['birth_date'];
    $total_born = $_POST['total_born'];
    $live_births = $_POST['live_births'];
    $stillbirths = $_POST['stillbirths'];
    $weaning_date = $_POST['weaning_date'];
    $mortality = $_POST['mortality'];
    $piglets_weaned = $_POST['piglets_weaned'];
    $male_count = $_POST['male_count'];
    $female_count = $_POST['female_count'];
    $num_heads = $_POST['num_heads'];
    $date_of_sell = $_POST['date_of_sell'];
    $avg_kg = $_POST['avg_kg'];
    $sale_price_kg = $_POST['sale_price_kg'];
    $total_revenue = $_POST['total_revenue'];

    // Update query
    $update_sql = "UPDATE parity_details SET 
                    batch_id='$batch_id', parity_no='$parity_no', source='$source', check_date='$check_date',
                    mating_date='$mating_date', expected_farrowing_date='$expected_farrowing_date', birth_date='$birth_date',
                    total_born='$total_born', live_births='$live_births', stillbirths='$stillbirths', weaning_date='$weaning_date',
                    mortality='$mortality', piglets_weaned='$piglets_weaned', male_count='$male_count', female_count='$female_count',
                    num_heads='$num_heads', date_of_sell='$date_of_sell', avg_kg='$avg_kg', sale_price_kg='$sale_price_kg',
                    total_revenue='$total_revenue' WHERE parity_id='$parity_id'";

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Parity record updated successfully!'); window.location.href='list.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Parity Record</title>
</head>
<body>
    <h2>Edit Parity Record</h2>
    <form method="POST">
        <label>Batch ID:</label>
        <input type="text" name="batch_id" value="<?= htmlspecialchars($parity['batch_id']) ?>" required><br>

        <label>Parity No.:</label>
        <input type="number" name="parity_no" value="<?= htmlspecialchars($parity['parity_no']) ?>" required><br>

        <label>Source:</label>
        <input type="text" name="source" value="<?= htmlspecialchars($parity['source']) ?>"><br>

        <label>Check Date:</label>
        <input type="date" name="check_date" value="<?= $parity['check_date'] ?>" required><br>

        <label>Mating Date:</label>
        <input type="date" name="mating_date" value="<?= $parity['mating_date'] ?>" required><br>

        <label>Expected Farrowing Date:</label>
        <input type="date" name="expected_farrowing_date" value="<?= $parity['expected_farrowing_date'] ?>"><br>

        <label>Birth Date:</label>
        <input type="date" name="birth_date" value="<?= $parity['birth_date'] ?>"><br>

        <label>Total Born:</label>
        <input type="number" name="total_born" value="<?= $parity['total_born'] ?>"><br>

        <label>Live Births:</label>
        <input type="number" name="live_births" value="<?= $parity['live_births'] ?>"><br>

        <label>Stillbirths:</label>
        <input type="number" name="stillbirths" value="<?= $parity['stillbirths'] ?>"><br>

        <label>Weaning Date:</label>
        <input type="date" name="weaning_date" value="<?= $parity['weaning_date'] ?>"><br>

        <label>Mortality:</label>
        <input type="number" name="mortality" value="<?= $parity['mortality'] ?>"><br>

        <label>Piglets Weaned:</label>
        <input type="number" name="piglets_weaned" value="<?= $parity['piglets_weaned'] ?>"><br>

        <label>Male Count:</label>
        <input type="number" name="male_count" value="<?= $parity['male_count'] ?>"><br>

        <label>Female Count:</label>
        <input type="number" name="female_count" value="<?= $parity['female_count'] ?>"><br>

        <label>Number of Heads:</label>
        <input type="number" name="num_heads" value="<?= $parity['num_heads'] ?>"><br>

        <label>Date of Sell:</label>
        <input type="date" name="date_of_sell" value="<?= $parity['date_of_sell'] ?>"><br>

        <label>Average Weight (kg):</label>
        <input type="number" step="0.01" name="avg_kg" value="<?= $parity['avg_kg'] ?>"><br>

        <label>Sale Price/kg:</label>
        <input type="number" step="0.01" name="sale_price_kg" value="<?= $parity['sale_price_kg'] ?>"><br>

        <label>Total Revenue:</label>
        <input type="number" step="0.01" name="total_revenue" value="<?= $parity['total_revenue'] ?>"><br>

        <button type="submit">Update Parity</button>
    </form>
</body>
</html>
