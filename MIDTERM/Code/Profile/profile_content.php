<?php
session_start();
include '../Connection.php';

if (isset($_POST['load_content'])) {
    $user_id = $_POST['user_id'];

    $query = "SELECT 
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
    WHERE 
        post_table.user_id = $user_id
    ORDER BY 
        post_table.created_at DESC";

    $fetch_post = mysqli_query($conn, $query);

    $array_result = [];
    if (mysqli_num_rows($fetch_post) > 0) {
        foreach ($fetch_post as $row) {
            array_push($array_result, ['content' => $row]);
        }
        header('Content-Type: application/json');
        echo json_encode($array_result);
    } else {
        echo json_encode(['message' => 'No posts found']);
    }
} else {
    echo json_encode(['message' => 'No content request made']);
}
?>
