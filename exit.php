<?php
	session_start();
	session_unset();
	session_destroy();
	echo "<script type='text/javascript'> alert('Cerrando Sesion'); window.location='index.html';</script>";
?>