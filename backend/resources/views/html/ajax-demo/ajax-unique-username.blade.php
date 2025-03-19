<?php

if ( isset( $_GET['username'] ) ) {
	if ( 'aminah' === $_GET['username'] ) {
		echo json_encode(false);
	} else {
		echo json_encode(true);
	}
} else {
	echo json_encode(false);
}