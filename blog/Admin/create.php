<?php
include("templates/header.php");

?>
<div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
    <form action="process.php" method="post">
        <div class="form-field mb-4">
            <input type="text" class="form-control" name="title" id="" placeholder="Enter title:">
        </div>
        <div class="form-field mb-4">
            <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Enter post" :></textarea>
        </div>
        <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">
        <div class="form-field">
        <input type="submit" class="btn btn-primary" value="create" name="cuBtn">
    
        </div>
</div>
</body>

</html>
<?php
include("templates/footer.php")
?>