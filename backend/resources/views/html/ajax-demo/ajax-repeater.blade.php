<?php
$data = [
	1 => 'lele',
    4 => 'ayam',
    18 => 'bebek'
];
$array = [];
if ( isset( $_GET['q'] ) ) {
	foreach ( $data as $k => $d ) {
		if ( false !== stripos( $d, $_GET['q'] ) ) {
			$array[ $k ] = $d;
		}
	}
}

header('Content-type: application/json');
echo json_encode( $array );