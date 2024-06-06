<?php 
include('includes/db.php');
$page_title="Home";
$id=getIdenByurl($_GET['url']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/header.php') ?>
</head>
<body>
    <h1>My Video</h1>
    <video width="640" height="480" controls>
        <source src="source.php?v_id=<?php echo $id ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</body>
</html>
