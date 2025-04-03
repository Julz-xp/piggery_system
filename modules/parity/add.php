<?php
include '../../config/db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sow_id = $_POST['sow_id'];
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

    $sql = "INSERT INTO parity_details (sow_id, batch_id, parity_no, source, check_date, mating_date, expected_farrowing_date, birth_date, total_born, live_births, stillbirths, weaning_date, mortality, piglets_weaned, male_count, female_count, num_heads, date_of_sell, avg_kg, sale_price_kg, total_revenue) 
            VALUES ('$sow_id', '$batch_id', '$parity_no', '$source', '$check_date', '$mating_date', '$expected_farrowing_date', '$birth_date', '$total_born', '$live_births', '$stillbirths', '$weaning_date', '$mortality', '$piglets_weaned', '$male_count', '$female_count', '$num_heads', '$date_of_sell', '$avg_kg', '$sale_price_kg', '$total_revenue')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Parity record added successfully!'); window.location.href='list.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch all available sows
$sows = mysqli_query($conn, "SELECT sow_id, tag_number FROM sows ORDER BY tag_number ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parity Record</title>
</head>
<body>
    <h2>Add New Parity Record</h2>
    <form method="POST">
        <label>Sow Tag:</label>
        <select name="sow_id" required>
            <option value="">Select Sow</option>
            <?php while ($sow = mysqli_fetch_assoc($sows)) { ?>
                <option value="<?= $sow['sow_id']; ?>"><?= $sow['tag_number']; ?></option>
            <?php } ?>
        </select><br>

        <label>Batch ID:</label>
        <input type="text" name="batch_id" required><br>

        <label>Parity No.:</label>
        <input type="number" name="parity_no" required><br>

        <label>Source:</label>
        <input type="text" name="source"><br>

        <label>Check Date:</label>
        <input type="date" name="check_date" required><br>

        <label>Mating Date:</label>
        <input type="date" name="mating_date" required><br>

        <label>Expected Farrowing Date:</label>
        <input type="date" name="expected_farrowing_date"><br>

        <label>Birth Date:</label>
        <input type="date" name="birth_date"><br>

        <label>Total Born:</label>
        <input type="number" name="total_born"><br>

        <label>Live Births:</label>
        <input type="number" name="live_births"><br>

        <label>Stillbirths:</label>
        <input type="number" name="stillbirths"><br>

        <label>Weaning Date:</label>
        <input type="date" name="weaning_date"><br>

        <label>Mortality:</label>
        <input type="number" name="mortality"><br>

        <label>Piglets Weaned:</label>
        <input type="number" name="piglets_weaned"><br>

        <label>Male Count:</label>
        <input type="number" name="male_count"><br>

        <label>Female Count:</label>
        <input type="number" name="female_count"><br>

        <label>Number of Heads:</label>
        <input type="number" name="num_heads"><br>

        <label>Date of Sell:</label>
        <input type="date" name="date_of_sell"><br>

        <label>Average Weight (kg):</label>
        <input type="number" step="0.01" name="avg_kg"><br>

        <label>Sale Price/kg:</label>
        <input type="number" step="0.01" name="sale_price_kg"><br>

        <label>Total Revenue:</label>
        <input type="number" step="0.01" name="total_revenue"><br>

        <button type="submit">Add Parity</button>
    </form>
</body>
</html>
