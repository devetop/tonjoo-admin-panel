<?php

if ( 'makanan' === @$_GET['kategori'] ) {
	$data = array(
		array(
			'id' => 'tahu',
			'label' => 'Tahu'
		),
		array(
			'id' => 'tempe',
			'label' => 'Tempe'
		),
		array(
			'id' => 'ayam',
			'label' => 'Ayam'
		)
	);
} else {
	$data = array(
		array(
			'id' => 'susu',
			'label' => 'Susu'
		),
		array(
			'id' => 'kopi',
			'label' => 'Kopi'
		),
		array(
			'id' => 'teh',
			'label' => 'Teh'
		)
	);
}
echo json_encode($data);