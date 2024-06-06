<?php 
include('includes/db.php');

$fetch=getIdenByurl($_GET['url']); 
$page_title=$fetch['title'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/header.php') ?>
<link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
</head>
<body>
    <h1><?php echo $page_title ?></h1>
    <!-- <video width="640" height="480" controls>
        <source src="source.php?v_id=<?php echo $fetch['Identifier'] ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video> -->
    <video
    id="my-video" class="video-js"controls preload="auto" width="1000px" height="auto" poster="<?php echo $fetch['thumbnail'] ?>"data-setup="{}">
    <source src="source.php?v_id=<?php echo $fetch['Identifier'] ?>" type="video/mp4" />
    <!-- <source src="MY_VIDEO.webm" type="video/webm" /> -->
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>
  <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
</body>
</html>
