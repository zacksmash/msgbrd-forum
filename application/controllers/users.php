<?php
/**
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class users extends Controller
{
    public function index()
    {
		header("Location: /");
        exit();
    }
    
    public function view($id)
    {
		$login = $this->loadModel('Login');
		
		$create = $this->loadModel('Create');
		
		if ($login->isUserLoggedIn() == true) {
			$pagetitle = "Home - My Discussions";
		
			$posts = $create->getUserPosts($id);
			
			$profile = $login->getUserSocial($id);
			
			$pages = $create->pages;
			$page = $create->page;
			$total = $create->total;
			$limit = $create->limit;
			
        	require 'application/views/partials/header.php';
			require 'application/views/users.php';
			require 'application/views/partials/footer.php';
			
        } else {
        	header("Location: /");
        	exit();
        }
    }
}