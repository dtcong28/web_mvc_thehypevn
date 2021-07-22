<?php
function call ($controller, $action)
{
    require_once("controller/$controller.php");
    require_once("model/$controller.php");

    $controller = new $controller;
    $controller->{$action}();
}

$controllers = [
    'user' => ['login','logout','register'],  
    'product' => ['show', 'add', 'list', 'delete','edit'], 
    'admin'=>['manage']
];

if(array_key_exists($controller, $controllers))
{
    if(in_array($action, $controllers[$controller]))
    {
        call($controller, $action);
    }
    else{
        call('errorController','error');
    }
}
else{
    call('errorController','error');
}
?>