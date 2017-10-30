<?php

class Controller_Admin extends Controller{
	public function action_index(){
		session_start();
		if($_SESSION['admin'] == "12345"){
			$this->view->generate('admin_view.php', 'template_view.php');
		}else{
			session_destroy();
			Route::ErrorPage404();
		}
	}

	public static function action_logout(){
		session_start();
		session_destroy();
		header('Location: "/"');
	}
}
