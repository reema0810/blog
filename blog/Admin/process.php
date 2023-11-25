<?php
include("../connect.php");

if (isset($_POST["cuBtn"])) {
    $title = isset($_POST["title"]) ? mysqli_real_escape_string($conn, $_POST["title"]) : "";
    $content = isset($_POST["content"]) ? mysqli_real_escape_string($conn, $_POST["content"]) : "";
    $author_id = isset($_SESSION["username"]) ? mysqli_real_escape_string($conn, $_SESSION["username"]) : null;
    $date = isset($_POST["date"]) ? mysqli_real_escape_string($conn, $_POST["date"]) : "";
    $action = isset($_POST["cuBtn"]) ? mysqli_real_escape_string($conn, $_POST["cuBtn"]) : "";

    if ($action === "create") {
        $sqlInsertPost = "INSERT INTO posts (date, title, content, author_id) VALUES ('$date', '$title', '$content', '$author_id') ";
         
    } elseif ($action === "update") {
        $id = isset($_POST["id"]) ? mysqli_real_escape_string($conn, $_POST["id"]) : "";

        $sqlUpdatePost = "UPDATE posts SET date='$date', title='$title', content='$content', author_id=";
        $sqlUpdatePost .= $author_id ? "'$author_id'" : "NULL";
        $sqlUpdatePost .= " WHERE id='$id'";
    }

    if (isset($sqlInsertPost) && mysqli_query($conn, $sqlInsertPost)) {
        echo "Data inserted successfully!<br>";
    } elseif (isset($sqlUpdatePost) && mysqli_query($conn, $sqlUpdatePost)) {
        echo "Data updated successfully!<br>";
    } else {
        echo "Error: " . mysqli_error($conn) . "<br>";
    }

    // echo $title . "<br>";
    // echo $content . "<br>";
    // echo $author_id . "<br>";
    // echo $date . "<br>";
}

mysqli_close($conn);

include("home.php");


?>
