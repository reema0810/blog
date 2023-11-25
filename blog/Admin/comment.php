<?php
session_start();
include("../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["postcomment"])) {
    $post_id = isset($_POST["post_id"]) ? $_POST["post_id"] : "";
    $user_id = isset($_SESSION["user_id"]) ? mysqli_real_escape_string($conn, $_SESSION["user_id"]) : "";
    $comment = isset($_POST["comment"]) ? mysqli_real_escape_string($conn, $_POST["comment"]) : "";
    $sqlInsertComment = "INSERT INTO comments (post_id, user_id, comment) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sqlInsertComment);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iss", $post_id, $user_id, $comment);

        if (mysqli_stmt_execute($stmt)) {
            echo "Comment added successfully!";
        } else {
            echo "Error adding comment: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        
        echo "Error preparing statement: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
// session_destroy();
?>
