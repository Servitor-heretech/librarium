<?
require $_SERVER['DOCUMENT_ROOT']."/php/functions.php";

mysqli_query($con,"UPDATE `materials` SET `name` = '".$_POST['name']."', `shared` = '".$_POST['shared']."', `public` = '".$_POST['public']."', `content` = '".$_POST['content']."' WHERE `id` = ".$_POST['materid']); 
header('location: /homepage.php');

?>