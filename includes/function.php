<?php
function connect($host,$username,$password,$dbname)
{
    return mysqli_connect($host,$username,$password,$dbname);
}

function getIdenByurl($url){
    global $mysqli;
    $sql="SELECT * FROM `contents` WHERE `url`='$url'";
    $query=$mysqli->query($sql);
    $fetch=$query->fetch_array();
    return $fetch;
}
