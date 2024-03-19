<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $title = $_POST['title'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Assuming you have a session or some way to retrieve the user's ID
    session_start();
    $user_id = $_SESSION['user_id']; // Assuming you store the user's ID in session
    
    include 'database.php';
    
    // Inserting the todo with the user's ID
    $sql = "INSERT INTO todos (user_id, title, date, status) VALUES ('$user_id', '$title', '$date', 'Pending')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ./index.php");
        exit(); // Exit to prevent further execution
    } else {
        echo "Sorry, we couldn't add the to-do.";
    }
}
?>
