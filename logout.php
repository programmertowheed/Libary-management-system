<?php
	include "lib/Session.php";
	Session::checkSession();
	//unset($_SESSION);
	//unset($_SESSION['librarylogin']);
    //session_regenerate_id(true);
	Session::destroy();
?>