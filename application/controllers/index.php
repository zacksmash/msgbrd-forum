<?php

/**
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class home extends Controller
{
	public function index()
	{
		$login = $this->loadModel('Login');

		$create = $this->loadModel('Create');

		if ($login->isUserLoggedIn() == true) {
			$pagetitle = "Home - My Discussions";

			$posts = $create->getUserPosts($_SESSION['user_id']);

			$user = $login->getUserSocial($_SESSION['user_id']);

			$pages = $create->pages;
			$page = $create->page;
			$total = $create->total;
			$limit = $create->limit;

			// TO DO: create a better templating system to load in the page template.
			// $page = $this->render('logged_in');

			require 'application/views/partials/header.php';
			require 'application/views/logged_in.php';
			require 'application/views/partials/footer.php';
		} else {
			$pagetitle = "Welcome - Log In";

			$registration = $this->loadModel('Registration');

			$posts = $create->getAllPosts();

			$pages = $create->pages;
			$page = $create->page;
			$total = $create->total;
			$limit = $create->limit;

			require 'application/views/partials/header.php';
			require 'application/views/not_logged_in.php';
			require 'application/views/partials/footer.php';
		}
	}
}
