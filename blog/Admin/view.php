<?php
include("templates/header.php");
?>

<div class="post w-100 bg-light p-5">
    <?php
    $id = $_GET["id"];
    if ($id) {
        include("../connect.php");
        $sqlSelectPost = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($conn, $sqlSelectPost);
        while ($data = mysqli_fetch_array($result)) {
        ?>
            <h1><?php echo $data['title']; ?></h1>
            <p><?php echo $data['date']; ?></p>
            <p><?php echo $data['content']; ?></p>
        <?php
        }
    } else {
        echo "Post Not Found";
    }
    ?>
</div>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-6">
        <form class="form-horizontal" id="commentForm" action="comment.php" method="post">
            <input type="hidden" name="post_id" value="<?php echo $id; ?> ">
            <div class="form-group">
                <label for="comment" class="col-lg-3 control-label">Add Comment</label>
                <div class="col-lg-9">
                    <textarea class="form-control" name="comment" id="comment" cols="30" rows="5" placeholder="Your comment"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9">
                    <input type="submit" name="postcomment" value="Comment" class="btn btn-primary">
                    <a href="home.php" class="btn btn-default">Go Back</a>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>All comments</h1>
                            <div id="commentBox"> 
                                <?php
                                $com_query = "SELECT comments.comment, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE comments.post_id = '$id'";
                                $coms_result = mysqli_query($conn, $com_query) or die(mysqli_error($conn));
                                if (mysqli_num_rows($coms_result) > 0) {
                                    while ($com = mysqli_fetch_assoc($coms_result)) {
                                        $user_name = $com['username'];
                                        $comment = $com['comment'];
                                ?>
                                        <p><?php echo $comment; ?></p>
                                        <p>posted by: <?php echo  $user_name; ?></p>
                                <?php
                                    }
                                } else {
                                    echo "<p>No comments yet.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include("templates/footer.php");
?>
