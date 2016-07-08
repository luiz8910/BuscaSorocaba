<?php

if($_GET)
{
    //var_dump($_GET);
    //header('HTTP/1.0 404 Not Found');
    //echo "<name>{$_GET['name']}</name>";

    $name = $_GET['name'];
    $email = $_GET['email'];
    $tel = $_GET['tel'];

    if($name == '')
    {
        echo json_encode(['status' => false, 'msg' => 'Fill in a name']);exit;
    }

    if($email == '')
    {
        echo json_encode(['status' => false, 'msg' => 'Fill in a email']);exit;
    }

    if($tel == '')
    {
        echo json_encode(['status' => false, 'msg' => 'Fill in a telephone']);exit;
    }
    

    echo json_encode(['status' => true, 'msg' => 'Success']);exit;

}