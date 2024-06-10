<?php
session_start();
include '../Connection.php';

if(isset($_POST['load_notif']))
{
    $user_id = $_SESSION['user_id'];
    $query = "SELECT *FROM notification_tb WHERE user_id = '$user_id'";

    $result = mysqli_query($conn,$query);

    $array_result = [];

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            array_push($array_result, ['notif' => $row]);
        }
        header('Content-Type: application/json');
        echo json_encode($array_result);
    } else {
        echo $user_id;
    }
}
?>