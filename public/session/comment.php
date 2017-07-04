<?php
	require 'session_ini.php';
	
	echo $_POST["comment"];
	// echo noHTML($_POST["comment"]);

	function noHTML($input, $encoding = 'UTF-8')
	{
	    return htmlentities($input, ENT_QUOTES | ENT_HTML5, $encoding);

	    // ENT_QUOTES - escape quote characters (" and ')
	}

	// Hello World
	// <h1>Hello World</h1>
	// <script>alert(\'Hello World\');</script>
	// <script>alert(document.cookie);</script>
	// Try via URL
?>