<?
require 'php/hud.php';
require_once 'php/functions.php';

mysqli_set_charset($con, 'utf8');
$searchres = mysqli_query($con, "SELECT `id`, `name` FROM `materials` WHERE `name` LIKE '".$_GET['request']."%' AND (`public` = 1 OR `author` = '".$user['id']."' OR `shared` LIKE '%".$user['id']."%')");
?>

<title>Education.ru</title>
<?
	while($serres = mysqli_fetch_assoc($searchres)) {
		echo '<div class="bodyitem"><a href="/view.php?id='.$serres['id'].'"><h3>'.$serres['name'].'</h3></a></div>';
	}
?>
<footer style="position: fixed; bottom: 0px;"></footer>
