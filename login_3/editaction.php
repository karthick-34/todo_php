<?php
       $id=$_POST['id'];
       $title=$_POST['title'];
       $date=$_POST['date'];
       
    include 'database.php';
    $sql="UPDATE todos SET title='$title',date='$date' WHERE id=$id";
    $result=mysqli_query($conn, $sql);

    if($result){
        header("location: ./index.php");

    }

?>