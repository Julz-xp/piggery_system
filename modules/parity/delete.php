<?php
include '../../config/db.php';

if (isset($_GET['id'])) {
    $parity_id = $_GET['id'];

    // Delete the record
    $sql = "DELETE FROM parity_details WHERE parity_id = '$parity_id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Parity record deleted successfully!'); window.location.href='list.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='list.php';</script>";
}
?>
