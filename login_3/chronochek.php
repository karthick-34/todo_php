<?php
session_start();
include 'database.php'; // Include your database connection script

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit(); // Stop further execution
}

// Function to fetch and return data from the database
function fetchData($columnName, $userId, $connection) {
    $sql = "SELECT $columnName FROM chronocheck WHERE user_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result) {
        $row = $result->fetch_assoc();
        return $row[$columnName] ?? "";
    } else {
        // Handle error if the query fails
        echo "Error: " . $connection->error;
        return ""; // Set default value
    }
}

// Fetch data for each section
$user_id = $_SESSION["user_id"];
$workspace = fetchData('workspace', $user_id, $conn);
$personal = fetchData('personal', $user_id, $conn);
$wishlist = fetchData('wishlist', $user_id, $conn);
$orders = fetchData('orders', $user_id, $conn);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_SESSION['user_id'];

    // Check if delete button is clicked for workspace
    if (isset($_POST["delete_workspace"])) {
        // Set workspace column to NULL
        $sql = "UPDATE chronocheck SET workspace=NULL WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        if ($stmt->execute()) {
            echo "Workspace tasks deleted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        // Check if all columns are empty
        if (empty($workspace) && empty($personal) && empty($wishlist) && empty($orders)) {
            // Insert all values
            $sql = "INSERT INTO chronocheck (user_id, workspace, personal, wishlist, orders) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $id, $_POST["workspaceInput"], $_POST["personalInput"], $_POST["wishlistInput"], $_POST["ordersInput"]);
            if ($stmt->execute()) {
                echo "New records inserted successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            // Check and update only the changed column
            if (isset($_POST["workspaceInput"])) {
                $workspaceInput = $_POST["workspaceInput"] ?: null; // Set to null if empty
                $sql = "UPDATE chronocheck SET workspace=? WHERE user_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $workspaceInput, $id);
                if ($stmt->execute()) {
                    echo "Record updated successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }
            } elseif (isset($_POST["personalInput"])) {
                $personalInput = $_POST["personalInput"] ?: null; // Set to null if empty
                $sql = "UPDATE chronocheck SET personal=? WHERE user_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $personalInput, $id);
                if ($stmt->execute()) {
                    echo "Record updated successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }
            } elseif (isset($_POST["wishlistInput"])) {
                $wishlistInput = $_POST["wishlistInput"] ?: null; // Set to null if empty
                $sql = "UPDATE chronocheck SET wishlist=? WHERE user_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $wishlistInput, $id);
                if ($stmt->execute()) {
                    echo "Record updated successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }
            } elseif (isset($_POST["ordersInput"])) {
                $ordersInput = $_POST["ordersInput"] ?: null; // Set to null if empty
                $sql = "UPDATE chronocheck SET orders=? WHERE user_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $ordersInput, $id);
                if ($stmt->execute()) {
                    echo "Record updated successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }
            }
        }
    }

    // Redirect back to todowork.php or any other page
    header("Location: todowork.php");
    exit();
}

// Close connection
$conn->close();
?>
