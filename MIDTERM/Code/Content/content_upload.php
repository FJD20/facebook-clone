<?php
session_start();
include '../Connection.php';

if (!isset($_SESSION['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

// echo '<script>console.log('.$user_id.')</script>';

if (isset($_POST["submit"])) {


    $name =  $_POST['post_text'];
    $user_id = $_SESSION['user_id'];

    $filesArray = [];

    foreach ($_FILES['fileImg']['tmp_name'] as $key => $tmpName) {
        $imageName = $_FILES["fileImg"]["name"][$key];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $newImageName = uniqid() . '.' . $imageExtension;

        move_uploaded_file($tmpName, 'uploads/' . $newImageName);
        $filesArray[] = $newImageName;
    }

    $filesJson = json_encode($filesArray);

    $query = "INSERT INTO post_table (user_id, caption, imagePost, content_like) VALUES ('$user_id', '$name', '$filesJson', 0)";

    if (mysqli_query($conn, $query)) {
        header('location:mainpage.php');
        
    } else {
        echo "<script>alert('Error inserting data');</script>";
    }
}

?>