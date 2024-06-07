<?php
session_start();
include '../Connection.php';

if(isset($_POST['like_btn']))
{
    $user_id = $_SESSION['user_id'];
    $poster_id = mysqli_escape_string($conn,$_POST['poster_id']);
    $content_id = mysqli_escape_string($conn,$_POST['content_id']);

    $check_like_query = "SELECT * FROM like_tb WHERE content_id='$content_id' AND user_id='$user_id'";
    $check_like_result = mysqli_query($conn, $check_like_query);
    if(mysqli_num_rows($check_like_result) > 0)
    {
        $insert_like = "INSERT INTO like_tb(content_owner_id, content_id, user_id, user_like) VALUES ('$poster_id', '$content_id', '$user_id', 1)";
        $like_conn = mysqli_query($conn, $insert_like);
        if($like_conn)
        {
            echo'inserted';
        }
    }
    else
    {

    }
}
else
{
    echo 'fail';
}


?>