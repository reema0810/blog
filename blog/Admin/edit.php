<?php 
include("templates/header.php");
?>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
 
if ($id) {
    include("../connect.php");
    $sqlEdit = "SELECT * FROM posts WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sqlEdit);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
      
        while ($data = mysqli_fetch_array($result)) {
?>
            <div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
                <form action="process.php" method="post">
                    <div class="form-field mb-4">
                        <input type="text" class="form-control" name="title" id="" placeholder="Enter Title:" value="<?php echo $data['title']; ?>">
                    </div>
                    <div class="form-field mb-4">
                        <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Enter content:"><?php echo $data['content']; ?></textarea>
                    </div>
                   
                    <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-field">
                        <input type="submit" class="btn btn-primary" value="update" name="cuBtn">
                    </div>
                </form>
            </div>
            <?php
        }
    } else {
        echo "No post found in the database"; 
    }
} else {
    echo "No 'id' parameter in the URL"; 
}



include("templates/footer.php");
?>
