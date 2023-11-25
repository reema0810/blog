<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
     <div class="dashboard">
        <div class="sidebar">
            
        </div>
        <div class="create-form">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Daily blogs</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      
                        <?php if( isset( $_SESSION["id"])){ ?>
                        
                        <li class="nav-item active">
                            <a class="nav-link" href="logout.php">logout<span class="sr-only"></span></a>
                        </li>
                        <?php }else{ ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="login.php">login<span class="sr-only"></span></a>
                        </li>
                        
                        <?php } ?>
                        <?php if( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){
                        ?>
                         <li class="nav-item active">
                            <a class="nav-link" href="create.php">create blog<span class="sr-only"></span></a>
                        </li>
                        
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cgOmIboRF8v3Bn5ZrnxzItwPg/JnTTaUz1L30E8vgFJK2N4nIs/fFXbAVqQ0rxYj" crossorigin="anonymous"></script>
</body>

</html>
