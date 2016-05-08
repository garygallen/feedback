<?php
include_once('functions.php');

$retdata = '';
switch ( $_POST["fn"] ) {

	case 'getFeedback':
//            print_r($_POST['courseInfo']);
		$retdata = getFeedback($_POST);
		break;
	default:
		$ret_array = array('ret_id' => -1, 'ret_msg' => 'error occurred (no function specified)');
		$retdata = json_encode($ret_array);
		break;
}
echo $retdata;

function getFeedback($postParms){

	$post = '';
	foreach($postParms['parms'] as $key => $value) {
		 $post = $post . $key . "=" . $value . '&';
	}

	return get_api_call(null, API_KEY, $post);

}