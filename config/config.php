<?php
	$_NAME = "SecuTest";

	try	{
		$_ELIOT = new PDO('mysql:host=localhost;dbname=Eliot;charset=utf8', 'rqvbpighckgw', 'P2sHqcFTxbC8Z7mSk7');
	}catch (Exception $e)	{
		die('Erreur : ' . $e->getMessage());
	}

	// setcookie('HdeTSwkVaeWCWPXt', 1);

	if( isset($_COOKIE['HdeTSwkVaeWCWPXt']) && !empty($_COOKIE['HdeTSwkVaeWCWPXt']) ){
		$_SESSION['sLSLB72Mx3GPeGe9'] = $_COOKIE['HdeTSwkVaeWCWPXt'];
	}

	if( isset($_SESSION['sLSLB72Mx3GPeGe9']) && !empty($_SESSION['sLSLB72Mx3GPeGe9']) ){
		$user_req = $_ELIOT->query('SELECT * FROM users WHERE id='. $_SESSION['sLSLB72Mx3GPeGe9']);
		$user_res = $user_req->fetchObject();
		if(isset($user_res) && !empty($user_res) && is_object($user_res)){
			$_USER = $user_res;
		}else{
			$_USER = false;
		}
    }else{
    	$_USER = false;
    }