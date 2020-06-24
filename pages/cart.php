<?php
function indexAction()
{
	session_start();
	if(!isset($_SESSION['good'])){
		$_SESSION['good'] = array(
		1 => 0,
		2 => 0,
		3 => 0,
		);
	}
//var_dump($_SESSION['good']);
addToCart();
deleteFromCart();
    echo render('cart.php', [
        'title' => 'Корзина',
        'text' => '<b>Товар 1</b><br>
        <i>В Корзине: </i>' . $_SESSION['good'][1] . '
        <p><a href="/?p=cart&a=addToCart&id=1">Добавить в корзину</a></p>
        <p><a href="/?p=cart&a=deleteFromCart&id=1">Удалить из корзины</a></p>
        <b>Товар 2</b><br>
        <i>В Корзине: </i>' . $_SESSION['good'][2] . '
        <p><a href="/?p=cart&a=addToCart&id=2">Добавить в корзину</a></p>
        <p><a href="/?p=cart&a=deleteFromCart&id=2">Удалить из корзины</a></p>
        <b>Товар 3</b><br>
        <i>В Корзине: </i>' . $_SESSION['good'][3] . '
        <p><a href="/?p=cart&a=addToCart&id=3">Добавить в корзину</a></p>
        <p><a href="/?p=cart&a=deleteFromCart&id=3">Удалить из корзины</a></p>', 
    ]);
 }

function addToCart(){
    if (!empty($_GET['id']) && ($_GET['a'] == 'addToCart')) {
        $id = $_GET['id'];
        //echo "Calculating";
            $_SESSION['good'][$id]++;
    		//var_dump($_SESSION['good']);
    }

}

function deleteFromCart(){
    if (!empty($_GET['id']) && ($_GET['a'] == 'deleteFromCart')) {
        $id = $_GET['id'];
        //echo "Calculating";
        if($_SESSION['good'][$id] >= 1) {
        $_SESSION['good'][$id]--;
    }
    }

    //var_dump($_SESSION['good']);	
}