<?php
	$actions = array('view');
	if( isset($_GET['action']) && in_array(strtolower($_GET['action']), $actions) ){
		$_ACTION = strtolower($_GET['action']);
	}else{
		$_ACTION = 'view';
	}
?>

</head><body>
<?php include './nav.php'; ?>

<?php include_once './pages/profil/'. $_ACTION .'-page.php';