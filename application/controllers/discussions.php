<?php
/**
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class discussions extends Controller
{	
    public function index()
    {	
    	$login = $this->loadModel('Login');
    
		if ($login->isUserLoggedIn() == true) {
			$pagetitle = "View All Discussions";
			
			$create = $this->loadModel('Create');
        	
        	$posts = $create->getAllPosts();
        	
        	$pages = $create->pages;
			$page = $create->page;
			$total = $create->total;
			$limit = $create->limit;
			
        	require 'application/views/partials/header.php';
			require 'application/views/discussions.php';
			require 'application/views/partials/footer.php';
        } else {
        	header("Location: /");
        	exit();
        }
    }
    
    public function bugs()
    {	
    	$login = $this->loadModel('Login');
    
		if ($login->isUserLoggedIn() == true) {
			$pagetitle = "View All Bugs";
			
			$create = $this->loadModel('Create');
        	
        	$posts = $create->getPostByType('Bugs');
        	
        	$pages = $create->pages;
			$page = $create->page;
			$total = $create->total;
			$limit = $create->limit;
			
        	require 'application/views/partials/header.php';
			require 'application/views/discussions.php';
			require 'application/views/partials/footer.php';
        } else {
        	header("Location: /");
        	exit();
        }
    }
    
    public function features()
    {	
    	$login = $this->loadModel('Login');
    
		if ($login->isUserLoggedIn() == true) {
			$pagetitle = "View All Features";
			
			$create = $this->loadModel('Create');
        	
        	$posts = $create->getPostByType('Features');
        	
        	$pages = $create->pages;
			$page = $create->page;
			$total = $create->total;
			$limit = $create->limit;
			
        	require 'application/views/partials/header.php';
			require 'application/views/discussions.php';
			require 'application/views/partials/footer.php';
        } else {
        	header("Location: /");
        	exit();
        }
    }
    
    public function questions()
    {	
    	$login = $this->loadModel('Login');
    
		if ($login->isUserLoggedIn() == true) {
			$pagetitle = "View All Questions";
			
			$create = $this->loadModel('Create');
        	
        	$posts = $create->getPostByType('Questions');
        	
        	$pages = $create->pages;
			$page = $create->page;
			$total = $create->total;
			$limit = $create->limit;
			
        	require 'application/views/partials/header.php';
			require 'application/views/discussions.php';
			require 'application/views/partials/footer.php';
        } else {
        	header("Location: /");
        	exit();
        }
    }
    
    public function announcements()
    {	
    	$login = $this->loadModel('Login');
    
		if ($login->isUserLoggedIn() == true) {
			$pagetitle = "View All Announcements";
			
			$create = $this->loadModel('Create');
        	
        	$posts = $create->getPostByType('Announcements');
        	
        	$pages = $create->pages;
			$page = $create->page;
			$total = $create->total;
			$limit = $create->limit;
			
        	require 'application/views/partials/header.php';
			require 'application/views/discussions.php';
			require 'application/views/partials/footer.php';
        } else {
        	header("Location: /");
        	exit();
        }
    }
}