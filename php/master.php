<?

	require_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";

	$response = Array();

	extract($_POST, EXTR_SKIP);

	$response['type'] = 'ok';

	switch ($command) {

		case 'groupupdate':
			
			$response['type'] = 'warn';
			$r = mysqli_fetch_assoc(mysqli_query($con, "SELECT `id` FROM `groups` WHERE `name` = '$oldname' AND `creator` = ".$user['id']));
			$response['message'] = 'Группа изменена';
			mysqli_query($con, "UPDATE `groups` SET `name` = '$name', `members` = '$members', `materials` = '$materials' WHERE `id` = '".$r['id']."' AND `creator` = '".$user['id']."'");

			break;

		default:
			$response['type'] = 'error';
			$response['message'] = 'Несуществующая команда';
			break;

	}

	echo json_encode($response);

?>