<?php
session_start();
unset( $_SESSION['cliente'] );
header('Location: ../login.php');
exit();