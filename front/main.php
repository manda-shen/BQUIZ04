<?php
$nav='';
$typeId=$_GET['type']??0;
if($typeId==0){
    $nav="全部商品";
}else{
    $type=$Type->find($typeId);
    if($type['big_id']==0){
        $nav=$type['name'];
    }else{
        $big=$Type->find($type['big_id']);
        $nav=$big['name'] ." > ". $type['name'];
    }
    
}
?>
<h2><?=$nav;?></h2>

<style>
    .item{
        display:flex;
        flex-direction:row;
    }
</style>
<?php
if($typeId==0){
    $rows=$Item->all(['sh'=>1]);
}else if($type['big_id']==0){
    $rows=$Item->all(['big'=>$typeId,'sh'=>1]);
}else{
    $rows=$Item->all(['mid'=>$typeId,'sh'=>1]);
}

foreach($rows as $row):
?>
<div class='item'>
    <div >
        <a href="?do=detail&id=<?=$row['id'];?>">
            <img width="200px" src="./img/<?=$row['img'];?>" alt="">
        </a>
    </div>
    <div>
        <div><?=$row['name'];?></div>
        <div>價錢:<?=$row['price'];?></div>
        <div>規格:<?=$row['spec'];?></div>
        <div>介紹:<?=mb_substr($row['intro'],0,20);?>...</div>   
        <div>
            <a href="?do=buycart&id=<?=$row['id'];?>&qt=1">
            <img src="./icon/0402.jpg"></a>
        </div>     
    </div>
</div>
<?php
endforeach;
?>
