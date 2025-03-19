<?php
$inputs = json_decode(file_get_contents("php://input"),true);
$data = array(
	'error' 	=> false,
	'errors'	=> array()
);
if ( empty( $inputs['pesanan'] ) ) {
	$data['error'] = true;
	$data['errors']['pesanan'] = 'Pesanan tidak boleh kosong';
}
echo json_encode($data);