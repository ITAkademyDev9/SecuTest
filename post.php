<?php
    session_start();
	$pages = array('article', 'profile', 'comment');
	$actions = array('add', 'delete', 'edit', 'login', 'logout');

	if( isset($_GET['page']) && in_array($_GET['page'], $pages) ){	
		if( isset($_GET['action']) && in_array($_GET['action'], $actions) ){
	    	
	    	require_once './config/config.php';

			$page = strtolower($_GET['page']);
			$action = strtolower($_GET['action']);
			$redirect = "/";

			switch ($page) {
				case 'article':
					if( $action == 'add' && isset($_USER->id) ){
						if( isset($_POST['titre']) && !empty($_POST['titre']) ){
							$titre = strip_tags(htmlspecialchars($_POST['titre']));
						}else{
							$titre = '';
						}

						if( isset($_POST['texte']) && !empty($_POST['texte']) ){
							$texte = strip_tags(htmlspecialchars($_POST['texte']));
						}else{
							$texte = '';
						}

						if(isset( $_FILES['image'] ) && $_FILES['image']['error'] == 0 ){
							$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
							$extension_upload = strtolower(  substr(strrchr($_FILES['image']['name'], '.'),1)  );
							if( in_array($extension_upload, $extensions_valides) ){
								$image_sizes = getimagesize($_FILES['image']['tmp_name']);
								$name = "/uploads/". $_USER->id ."-".$_FILES['image']['name'];
								$resultat = move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ .''. $name);
							}
						}else{
							$name = 'http://lorempicsum.com/futurama/348/225/'.mt_rand(1,9);
						}

						$_ELIOT->exec('INSERT INTO articles (title, thumb, content, created, id_users) VALUES("'. $titre .'", "'. $name .'", "'. $texte .'", "'. date('Y-m-d H:i:s') .'", "'. $_USER->id .'")');

					}elseif ($action == 'edit' && isset($_USER->id)) {
						
					}elseif ( $action == 'delete' )
					break;
				case 'comment':
					if ($action == 'add') {
						if (isset($_POST['id']) && !empty($_POST['id']) && isset($_GET['id']) && $_POST['id'] == $_GET['id']) {
							if( isset($_POST['pseudo']) && strlen($_POST['pseudo']) <= 28 && preg_match('/^[a-z](.*)/', $_POST['pseudo'])){
								$pseudo = $_POST['pseudo'];
							}else{
								$pseudo = htmlspecialchars(strip_tags( $_POST['pseudo'] ));
							}

							if( isset($_POST['comment']) && !empty($_POST['comment']) ){
								$comment = htmlspecialchars(strip_tags( $_POST['comment'] ));
							}else{
								$comment = '';
							}

							$_ELIOT->exec('INSERT INTO comments(name, content, created, id_articles) VALUES("'. $pseudo .'", "'. $comment .'", "'. date('Y-m-d H:i:s') .'", "'. $_GET['id'] .'")');
						}
					}elseif($action == 'delete') {
						if (isset($_POST['id']) && !empty($_POST['id']) && isset($_GET['id']) && intval($_GET['id']) != 0 && $_POST['id'] == $_GET['id']) {
							$_ELIOT->exec('DELETE FROM comments WHERE id="'. $_POST['id'] .'"');
						}						
					}
						$redirect = '/article/view/'. $_GET['id'] .'.html';
					break;
					
				case 'profile':

					if ($action == 'login' && isset($_POST['email'])) {
						if( isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
							$mail = strtolower($_POST['email']);
						}else{
							$mail = '';
						}

						if( isset($_POST['password']) && !empty($_POST['password']) ){
							$password = md5($_POST['password']);
						}else{
							$password = '';
						}

						$user_exist_req = $_ELIOT->query('SELECT id FROM users WHERE email="'.$mail.'" AND password= "'.$password.'"');
						$user_exist_res = $user_exist_req->fetchObject();
						$_SESSION['sLSLB72Mx3GPeGe9'] = $user_exist_res->id;
						
						if( isset($_POST['remember']) && $_POST['remember'] == '1' ){
							setcookie('HdeTSwkVaeWCWPXt', $user_exist_res->id, time()+60*60, '/');
						}

					}elseif ($action == 'logout') {
						$_SESSION['sLSLB72Mx3GPeGe9'] = null;
						unset($_SESSION['sLSLB72Mx3GPeGe9']);
						session_destroy();

						setcookie ("HdeTSwkVaeWCWPXt", "", time() - 3600, '/');
					}
					break;
				
				default:
					$table = '';
					break;
			}

			var_dump('ssqd');

			// header('location: /');
		}else{
			var_dump($_GET);
		}
	}else{
		var_dump($_GET);
	}

	header('location: '.$redirect);