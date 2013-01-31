<?php
include 'shielded/login.php';
if (isset( $_POST['username'] ) && isset( $_POST['password'] ) )
{
	echo loginFromPost();
}
?>