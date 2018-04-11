<?php
    session_start();
    require_once './config/config.php';

    $pages = array('home', 'login', 'settings', 'profil', 'article');
    if( isset($_GET['page']) && in_array(strtolower($_GET['page']), $pages) ){
        $_PAGE = strtolower($_GET['page']);
    }else{
        $_PAGE = 'home';
    }

    include_once './header.php';
    include_once './pages/'.$_PAGE.'-page.php';
    include_once './footer.php';