<?php
	ini_set( 'session.cookie_httponly', 1 );
	
	session_start();

	if (session_start()) {
	    $sess_name = session_name();
	    setcookie($sess_name, session_id(), null, '/', null, null, true);
	}
?>