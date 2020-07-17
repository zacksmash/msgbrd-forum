<?php

/**
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class search_posts extends Controller
{
	public function index()
	{
		$pagetitle = "Search Results";

		$login = $this->loadModel('Login');

		$create = $this->loadModel('Create');

		$posts = $create->searchPosts($_GET['search']);

		$pages = $create->pages;
		$page = $create->page;
		$total = $create->total;
		$limit = $create->limit;

		require 'application/views/partials/header.php';
		require 'application/views/search_posts.php';
		require 'application/views/partials/footer.php';
	}
}
