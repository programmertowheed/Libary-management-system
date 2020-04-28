<?php
	include "lib/Session.php";
	Session::checkSession();
	unset($_SESSION);
    session_regenerate_id(true);
	Session::destroy();
?>