<?php
function indexAction()
{
	session_start();
	$my_name = gethostname();
	$time = file_get_contents('/proc/uptime');
	//var_dump($my_name);
	//var_dump($time);
	$_SESSION​['name']= $my_name;
	$_SESSION​['time']= $time;

    echo render('home.php', [
        'title' => 'Привет, '. $_SESSION​['name'], 
        'text' => '<p>Uptime data is ' . $_SESSION​['time'] . '</p>',

    ]);
}

function index2Action()
{
    echo 'Hello';
}

function test()
{

}

function sessionStart()
{
	session_start​();
	$my_name = gethostname();
	$time = file_get_contents('/proc/uptime');
	$_SESSION​['name'] = $_POST[$my_name];
	$_SESSION​['age'] = $_POST​[$time];
}

function showSession()
{
	var_dump($_SESSION​["name"]);
}

