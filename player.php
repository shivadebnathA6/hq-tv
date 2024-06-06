<?php 
include('includes/db.php');

$fetch=getIdenByurl($_GET['url']); 
$page_title=$fetch['title'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/header.php') ?>
</head>
<body>
    <h1><?php echo $page_title ?></h1>
    <video width="640" height="480" controls>
        <source src="source.php?v_id=<?php echo $fetch['Identifier'] ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</body>
</html>
