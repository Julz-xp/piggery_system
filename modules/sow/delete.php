<?php
include '../../config/db.php'; // Database connection

// Get the sow ID
$sow_id = $_GET['id'] ?? '';

// Delete query
$sql = "DELETE FROM sows WHERE sow_id = '$sow_id'";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Sow deleted successfully!'); window.location.href='list.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
