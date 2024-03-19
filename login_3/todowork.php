<!-- <?php
session_start();
include 'database.php'; // Include your database connection script

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit(); // Stop further execution
}

// Function to fetch and return data from the database
function fetchData($columnName, $userId, $connection) {
    $sql = "SELECT $columnName FROM chronocheck WHERE user_id = $userId";
    $result = $connection->query($sql);

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

// Close connection
$conn->close();
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style_3.css">
    <title>Chronocheck</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Angkor&family=Archivo+Black&family=Dosis:wght@200..800&family=Fredoka:wght@300..700&family=Inter:wght@100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Mynerve&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Angkor&family=Archivo+Black&family=Dosis:wght@200..800&family=Fredoka:wght@300..700&family=Hachi+Maru+Pop&family=Handlee&family=Inter:wght@100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Mochiy+Pop+One&family=Mynerve&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Angkor&family=Archivo+Black&family=Berkshire+Swash&family=Dosis:wght@200..800&family=Fredoka:wght@300..700&family=Hachi+Maru+Pop&family=Handlee&family=Inter:wght@100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Macondo&family=Mochiy+Pop+One&family=Mynerve&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Angkor&family=Archivo+Black&family=Dosis:wght@200..800&family=Fredoka:wght@300..700&family=Hachi+Maru+Pop&family=Inter:wght@100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lora:ital,wght@0,400..700;1,400..700&family=Mynerve&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <header >
        <h1 style="font-family: 'Mochiy Pop One', sans-serif;">CHRONOCHECK</h1>
        <h2><a href="index.php" style="text-decoration: none;color: black;">Task List</a></h2>
    </header>

    <hr>




    <div class="content_conatiner">
        <div class="content">
            <h1 style="font-family: 'Berkshire Swash', serif;letter-spacing:2px">Workspace</h1><br>
            <form action="chronochek.php" method="post">
                <textarea name="workspaceInput" id="workspaceInput" style="background-color:#D4DDB4;font-size:18px"
                    placeholder="Type your tasks here"><?php echo $workspace; ?></textarea><br><br>
                <button style="font-family: 'Macondo', cursive;font-size:20px" type="submit">Save Workspace</button>
            </form>
        </div>

        <div class="content">
            <h1 style="font-family: 'Berkshire Swash', serif;letter-spacing:2px">Personal</h1><br>
            <form action="chronochek.php" method="post">
                <textarea name="personalInput" id="personalInput" style="background-color: #B5B8DE;font-size:18px"
                    placeholder="Type your tasks here"><?php echo $personal; ?></textarea><br><br>
                <button style="font-family: 'Macondo', cursive;font-size:20px" type="submit">Save Personal</button>
            </form>
        </div>

        <div class="content">
            <h1 style="font-family: 'Berkshire Swash', serif;letter-spacing:2px">Wishlist</h1><br>
            <form action="chronochek.php" method="post">
                <textarea name="wishlistInput" id="wishlistInput" style="background-color: #DEB5C8;font-size:18px"
                    placeholder="Type your tasks here"><?php echo $wishlist; ?></textarea><br><br>
                <button style="font-family: 'Macondo', cursive;font-size:20px" type="submit">Save Wishlist</button>
            </form>
        </div>

        <div class="content">
            <h1 style="font-family: 'Berkshire Swash', serif;letter-spacing:2px">Orders</h1><br>
            <form action="chronochek.php" method="post">
                <textarea name="ordersInput" id="ordersInput" style="background-color: #B6CBDD;font-size:18px;"
                    placeholder="Type your tasks here"><?php echo $orders; ?></textarea><br><br>
                <button style="font-family: 'Macondo', cursive;font-size:20px" type="submit">Save Orders</button>
            </form>
        </div>

    </div>

</body>

</html>