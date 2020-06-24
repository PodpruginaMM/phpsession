<?php

function run()
{
    $page = 'index';
    if (!empty($_GET['p'])) {
        $page = $_GET['p'];
    }
    $fileName = getFileName($page);

    if (!is_file($fileName)) {
        $fileName = getFileName('index');
    }

    include $fileName;

    $action = 'index';
    if (!empty($_GET['a'])) {
        $action = $_GET['a'];
    }

    $action .= 'Action';

    if (!function_exists($action)) {
        $action = 'indexAction';
    }

    return $action();
}

function getFileName($file)
{
    return dirname(__DIR__) . '/pages/' . $file . '.php';
}

function getLink()
{
    static $link;

    if (empty($link)) {
        $link = mysqli_connect('localhost', 'root', '','gbphp');
    }

    return $link;
}

function render($template, $params = [], $layout = 'main.php')
{
    $content = renderTmpl($template, $params);
    $layout = 'layouts/' . $layout;
    $title = 'Test';
    if (!empty($params['title'])) {
        $title = $params['title'];
    }
    return renderTmpl($layout, [
        'content' => $content,
        'title' => $title,
    ]);
}

function renderTmpl($template, $params = [])
{
    ob_start();
    extract($params);
    include dirname(__DIR__) . '/views/' . $template;
    return ob_get_clean();
}