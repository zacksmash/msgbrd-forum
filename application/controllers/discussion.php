<?php

/**
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class discussion extends Controller
{
	public function index()
	{
		header("Location: /");
		exit();
	}

	public function view($id)
	{
		$pagetitle = "View Discussion";

		$login = $this->loadModel('Login');

		$create = $this->loadModel('Create');

		$post = $create->getPost($id);

		$replies = $create->getPostReplies($id);

		$pages = $create->pages;
		$page = $create->page;
		$total = $create->total;
		$limit = $create->limit;

		require 'application/views/partials/header.php';
		require 'application/views/discussion.php';
		require 'application/views/partials/footer.php';
	}
}
