<?php

function getPageName() {

    $uri = explode('/', $_SERVER['REQUEST_URI']);
    $page = 'home';
       
    if(!empty($uri[1])) {
       $page = $uri[1];
    }

    return $page;

}
function loadPage() {
   
    
    include DIR_PATH . '/' . getPageName() . '.php';
}
