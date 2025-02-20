<?php include_once "db.php";

$_POST['acc']  = $_SESSION['Mem'];
$_POST['no']   = date("Ymd") . rand(100000, 999999);
$_POST['cart'] = serialize($_SESSION['cart']);
// dd($_POST);
$Order->save($_POST);

unset($_SESSION['cart']);
