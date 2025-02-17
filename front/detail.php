<?php
$row=$Item->find($_GET['id']);
?>

<style>
    .item{
        display:flex;
        flex-direction:row;
    }
</style>

<h2 ><?=$row['name'];?></h2>

<div class='item'>
    
    <div>
    <div width="500px">
        <img width="400px" src="./img/<?=$row['img'];?>" alt="">
    </div>
        <div>分類:<?=$Type->find($row['big'])['name'] . ">" . $Type->find($row['mid'])['name'];?></div>
        <div>編號<?=$row['no'];?></div>
        <div>價錢:<?=$row['price'];?></div>
        <div>規格:<?=$row['spec'];?></div>
        <div>庫存量:<?=$row['stock'];?></div>
        <div>介紹:<?=nl2br($row['intro']);?></div>
            
    </div>
</div>
<div>
    <input type="number" name="qt" id="qt" value='1'>
    <img src="./icon/0402.jpg" alt="" onclick="buy()">
</div>

<script>
    function buy(){
        let qt=$("#qt").val();
        location.href=`?do=buycart&id=<?=$_GET['id'];?>&qt=${qt}`;
    }
</script>