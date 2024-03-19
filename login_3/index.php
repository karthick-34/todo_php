<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit(); // Stop further execution
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
    <title>ToDo'S List!</title>
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

<body style="background-image: linear-gradient(174.2deg, rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4%);
    background-size: cover;
    background-attachment: fixed;
    margin: 0;
    padding: 0;">
<a style="font-family: 'Macondo', cursive;font-size:20px" href="todowork.php" class="chro">Chorocheck</a>
<a style="font-family: 'Macondo', cursive;font-size:20px" href="logout.php" class="chro">LogOut</a><br/>

<h1 style="font-family: 'Mochiy Pop One', sans-serif;" class="text-center py-4 my-4">ToDo'S List</h1>

<img style="width:100px; position: absolute;
    top: 8%;right:30%" src="images/to-do-list (1).png" alt="">

<img style="width:100px; position: absolute;
    top: 28%;right:80%" src="./images/checklist.png" alt="">


<div class="main_div" style="margin-top:6%;">
<form action="data.php" method="post" autocomplete="off">
        <div id="titledate">
            <div>
                <input style="width:450px;font-size: 20px;padding:10px;font-family: 'Macondo', cursive;" class="form-control" type="text" name="title" id="title" placeholder="Type Here To Add On ToDo'S" required>
            </div>
            <div>
                <input style="font-size: 20px;padding:10px;font-family: 'Macondo', cursive;" class="form-control" type="date" name="date" id="date" required>
            </div>
            <button style="font-size: 20px;padding:10px;font-family: 'Macondo', cursive;" class="btn btn-success" type="submit">Add To Tasks</button>
        </div>
    </form>
</div>

</div><br>
<hr class="bg-dark w-50 m-auto">
<div class="lists w-50 m-auto my-4">
    <div class="rounded-lg" id="lists">
        <table style="border-radius: 10px;" id="table" class="rounded-lg table table-dark table-hover">
            <thead>
            <tr>
                <!-- <th scope="col" name="id">S.no</th> -->
                <th style="font-family: 'Berkshire Swash', serif;letter-spacing:2px" scope="col">Tasks</th>
                <th style="font-family: 'Berkshire Swash', serif;letter-spacing:2px">Due Date</th>
                <th style="font-family: 'Berkshire Swash', serif;letter-spacing:2px">Status</th>
                <th style="font-family: 'Berkshire Swash', serif;letter-spacing:2px">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'database.php';
            
            // Retrieve the user's ID from the session variable
            $user_id = $_SESSION["user_id"];

            // Select only the todos that belong to the current user
            $sql="SELECT * FROM todos WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['id'];
                    $title=$row['Title'];
                    $date=$row['date'];
                    $status=$row['status'];

                    ?>
                    <tr id="todo_<?php echo $id ?>" style="text-decoration: none;">
                        <!-- <td><?php echo $id ?></td> -->
                        <td style="font-family: 'Macondo', cursive;font-size:20px"><?php echo $title  ?></td>
                        <td style="font-family: 'Macondo', cursive;font-size:20px"><?php echo $date ?></td>
                        <td style="font-family: 'Macondo', cursive;font-size:20px"><?php echo $status ?></td>
                        <td>
                            <a style="font-family: 'Berkshire Swash', serif;letter-spacing:2px" class="btn btn-success btn-sm" href="#" onclick="toggleCompletion(<?php echo $id ?>, '<?php echo $title ?>', '<?php echo $status ?>', '<?php echo $date ?>')" role="button"><?php echo $status  ?></a>
                            <a style="font-family: 'Berkshire Swash', serif;letter-spacing:2px" class="btn btn-warning btn-sm" href="edit.php?id=<?php echo $id ?>" role="button">Edit</a>
                            <a style="font-family: 'Berkshire Swash', serif;letter-spacing:2px" class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $id ?>" role="button">Delete</a>
                        </td>
                    </tr>

                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->

<script>
    function toggleCompletion(id, title, status, date) {
        // Send AJAX request to store_completed.php
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "store_completed.php?id=" + id + "&title=" + title + "&status=" + status + "&date=" + date, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Update UI based on the response
                location.reload(); // Reload the page to reflect the changes
            }
        };
        xhr.send();
    }
</script>
</body>
</html>
