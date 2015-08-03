<?php header('Content-type: application/json; charset=utf8');
require_once 'dbhandler.php';

$list = isset($_GET['list']) ? $_GET['list'] : (isset($_POST['list']) ? $_POST['list'] : 'NA');

$db = new DbHandler();
	
$res = $db->getSite('REGION', $list);
if ($res->error) {
	$res = $db->getSite('PROVINCE', $list);
	if ($res->error) {
		$res = $db->getSite('EQUIP', $list);
	}
}

echo json_encode($res);
?>