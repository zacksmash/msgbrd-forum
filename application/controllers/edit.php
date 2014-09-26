<?php
/**
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class edit extends Controller
{
    public function index()
    {
		$login = $this->loadModel('Login');
		
		if ($login->isUserLoggedIn() == true) {
		
			$create = $this->loadModel('Create');
			
			$user = $login->getUserSocial($_SESSION['user_id']);
			
			$pagetitle = "Edit Your Profile";
			
        	require 'application/views/partials/header.php';
			require 'application/views/edit.php';
			require 'application/views/partials/footer.php';
        } else {
        	header("Location: /");
        	exit();
        }
    }
}