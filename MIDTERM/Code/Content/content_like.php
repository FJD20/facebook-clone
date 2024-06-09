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
            echo 'You have already liked this content';
        }
    else
    {
        $insert_like = "INSERT INTO like_tb(content_owner_id, content_id, user_id, user_like) VALUES ('$poster_id', '$content_id', '$user_id', 1)";
        $like_conn = mysqli_query($conn, $insert_like);
        
        if($like_conn)
        {
            $update_content_like_query = "UPDATE post_table SET content_like = content_like + 1 WHERE id ='$content_id'";
            $result = mysqli_query($conn, $update_content_like_query);

            if($result)
            {   
                $name = $_SESSION['firstname'].$_SESSION['lastname'];
                $notif = "$name Like your Post";
                $notify = "INSERT INTO notification_tb (user_id,notif) VALUES ('$poster_id', '$notif')";
                mysqli_query($conn,$notify);
            }
        }

    }
}
else
{
    echo 'fail';
}


?>