<?

	include( $_SERVER['DOCUMENT_ROOT'].'/app/api/class.php');
	$api = new API();
	$api->connect();

	// $row_array = array(
	// 	array('name' => 'amoName'),
	// 	array('name' => 'amoTags'),
	// 	array('name' => 'amoPrice'),
	// 	array('name' => 'amoview'),
	// 	array('name' => 'grview'),
	// 	array('name' => 'grNew'),
	// 	array('name' => 'grEnd'),
	// 	array('name' => 'URL'),
	// 	array('name' => 'redirect'),
	// 	array('name' => 'smsview'),
	// 	array('name' => 'SmS'),
	// 	array('name' => 'category')
	// );

	// $sql = 'UPDATE `products` SET';

	// $c = 1;
	// $stop = count($row_array)-1;

	// foreach ($row_array as $key => $value) {

	// 	$param = $value['name'];

	// 	if($c<=$stop){
	// 		$sql.= " `".$value['name']."` = '".$_POST[$param]."',";
	// 	}
	// 	else{
	// 		$sql.= " `".$value['name']."` = '".$_POST[$param]."' ";
	// 	}

	// 	$c++;
	// }

	// $sql.=" WHERE `id` = '".$_POST['id']."' ";

	// $api->query($sql);

?>