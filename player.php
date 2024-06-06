<?php 
include('includes/db.php');

$fetch=getIdenByurl($_GET['url']); 
$page_title=$fetch['title'];
$is_login=checkLogin();
$content_pro=$fetch['is_pro'];
if($fetch['is_pro']==1){
    include('pro-alert.php');
}else{
    include('player-content.php');
}
?>


