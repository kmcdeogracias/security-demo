<?php
	// Prevents javascript XSS attacks aimed to steal the session ID
	// ini_set('session.cookie_httponly', 1);
	
	// Session ID cannot be passed through URLs
	// ini_set('session.use_only_cookies', 1);

	// Uses a secure connection (HTTPS) if possible
	// ini_set('session.cookie_secure', 1);
	
	session_start();

	if (session_start()) {
	    $sess_name = session_name();
	    setcookie($sess_name, session_id(), null, '/', null, null, true);
	}
?>