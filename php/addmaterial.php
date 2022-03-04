<?


require $_SERVER['DOCUMENT_ROOT']."/php/functions.php";

mysqli_query($con,"INSERT INTO `materials` SET `name` = '".$_POST['name']."', `created` = CURRENT_TIMESTAMP, `author` = '".$user['id']."', `content` = '".$_POST['content']."', `public` = '".$_POST['public']."', `shared` = '".$_POST['shared']."', `verification` = 0,`rank` = 0");
//add tags
?>