<?php

/**
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class sign_up extends Controller
{
	public function index()
	{
		$login = $this->loadModel('Login');

		if ($login->isUserLoggedIn() == true) {
			header("Location: /");
			exit();
		} else {
			$pagetitle = "Sign Up";

			$registration = $this->loadModel('Registration');

			require 'application/views/partials/header.php';
			require 'application/views/sign_up.php';
			require 'application/views/partials/footer.php';
		}
	}
}
