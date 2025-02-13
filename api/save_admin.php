<?php include_once "db.php";

$_POST['pr']=serialize($_POST['pr']);

// 比較保險的做法
// if(!empty($_POST['pr'])){
//     $_POST['pr']=serialize($_POST['pr']);
// }else{
//     $_POST['pr']=serialize([]);
// }

$Admin->save($_POST);

to("../back.php?do=admin");

?>