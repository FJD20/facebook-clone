<?php
session_start();
include '../Connection.php';

if(isset($_POST['notify']))
{
    $user_id = $_SESSION['user_id'];
    $count = "SELECT COUNT(*) AS total_notifications
              FROM notification_tb
              WHERE user_id = $user_id";
    
    $result = mysqli_query($conn, $count);

    if($result)
    {
        $row = mysqli_fetch_assoc($result);
        echo $row['total_notifications'];
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
