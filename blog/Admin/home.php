<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

?>
<?php
include("templates/header.php");
?>
 
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:15%;">Publication Date</th>
            <th style="width:15%;">Title</th>
            <th style="width:25%;">Content</th>
            <th style="width:15%;">Author_id</th>
            <th style="width:30%;">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        include('../connect.php');
        $sqlSelect = "SELECT * FROM posts";
        $result = mysqli_query($conn, $sqlSelect);
        while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?php echo $data["date"] ?></td>
                <td><?php echo $data["title"] ?></td>
                <td><?php echo $data["content"] ?></td>
                <td><?php echo $data["author_id"] ?></td>
                <td>
                    <a class="btn btn-info" href="view.php?id=<?php echo $data["id"] ?>">View</a>
                    <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"] ?>">Edit</a>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $data["id"] ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>
</div>

<?php
include("templates/footer.php");
?>

<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['username']?> </h3>
<hr>

</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
