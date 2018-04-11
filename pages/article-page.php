<?php
	$actions = array('view', 'edit', 'new', 'delete');
	if( isset($_GET['action']) && in_array(strtolower($_GET['action']), $actions) ){
		$_ACTION = strtolower($_GET['action']);
	}else{
		$_ACTION = 'view';
	}
?>

</head><body>
<?php include './nav.php'; ?>

<?php include_once './pages/article/'. $_ACTION .'-page.php';