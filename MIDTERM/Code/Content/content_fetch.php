<?php
session_start();
include '../Connection.php';

if(isset($_POST['view_content']))
{
    $user_id = $_SESSION['user_id'];
    $content = "SELECT 
    post_table.id AS post_id,
    post_table.user_id,
    post_table.caption,
    post_table.imagePost,
    post_table.content_like,
    post_table.created_at,
    login_table.firstname,
    login_table.lastname,
    login_table.profile_picture
FROM 
    post_table
JOIN 
    login_table ON post_table.user_id = login_table.id
LEFT JOIN 
    user_following ON post_table.user_id = user_following.followed_id
    AND user_following.follower_id =  '$user_id'
WHERE 
    post_table.user_id =  '$user_id' OR user_following.follower_id =  '$user_id'
ORDER BY 
    post_table.created_at DESC "
;

    $sql_connection = mysqli_query($conn,$content);

    $array_result = [];

    if (mysqli_num_rows($sql_connection) > 0) {
        foreach ($sql_connection as $row) {
            array_push($array_result, ['content' => $row]);
        }
        header('Content-Type: application/json');
        echo json_encode($array_result);
    } else {
        echo $user_id;
    }
}
?>