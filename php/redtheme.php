<?
require $_SERVER['DOCUMENT_ROOT']."/php/functions.php";

mysqli_query($con,"INSERT INTO `comments` SET `text` = '".$_POST['content']."', `author` = '".$user['id']."', `posted` = CURRENT_TIMESTAMP, `theme` = '".$_POST['themeid']."'");

?>