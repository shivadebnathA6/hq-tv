<?php
$page_title='Home';
include('includes/db.php');

$sql = "SELECT * FROM `contents` WHERE is_deleted=0";
$query = $mysqli->query($sql);

?>
<!doctype html>
<html lang="en">

<head>
    <?php include('includes/header.php') ?>


</head>

<body>
    <!-- nav bar start  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $site_url ?>">HQ-TV</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- nav bar end -->
    
        <div class="row g-4">
            <?php  while ($row = $query->fetch_array()) {
            
            ?>
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $row['thumbnail'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title'] ?></h5>
                    
                        <a href="player.php?url=<?php echo $row['url']?>" class="btn btn-primary">Watch now</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    

    <?php include('includes/footer.php') ?>
</body>

</html>