<?php
if(!$_SESSION['cliente']) {
	header('Location: ./login.php');
	exit();
}