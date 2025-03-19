<?php
$inputs = json_decode(file_get_contents("php://input"),true);
$data = array(
	'error' 	=> false,
	'errors'	=> array()
);
if ( empty( $inputs['barang'] ) ) {
	$data['error'] = true;
	$data['errors']['barang'] = 'Barang tidak boleh kosong';
}
$total = 0;
if ( is_array($inputs['barang']) && ! empty( $inputs['barang'] ) ) {
	foreach ($inputs['barang'] as $value ) {
		$total += intval( $value['jumlah']);
	}
}
if ( 10 < $total ) {
	$data['error'] = true;
	$data['errors']['barang'] = 'Total barang tidak boleh lebih dari 10';
}
echo json_encode($data);