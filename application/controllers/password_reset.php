<?php

/**
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class password_reset extends Controller
{
	public function index()
	{
		$login = $this->loadModel('Login');

		$pagetitle = "Reset your password";

		require 'application/views/partials/header.php';
		require 'application/views/password_reset.php';
		require 'application/views/partials/footer.php';
	}
}
