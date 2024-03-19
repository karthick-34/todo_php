<?php
// Retrieve data from URL parameters
$id = $_GET['id'];
$status = $_GET['status'];

// Include database connection file
include 'database.php';

// Check if status is 'Pending' before updating
if ($status === 'Pending') { // Use double equals for comparison
    $sql = "UPDATE `todos` SET `status`='Completed' WHERE `id`='$id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Task marked as completed successfully.";
    } else {
        echo "Error: " . mysqli_error($conn); // Print detailed error message
    }
} 
else {
    echo "Task status is not 'Pending'.";
    $sql = "UPDATE `todos` SET `status`='Pending' WHERE `id`='$id';";
    $result = mysqli_query($conn, $sql);

}

echo $status; // Echo the status
?>
