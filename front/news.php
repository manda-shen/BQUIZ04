<marquee behavior="" direction="">年終特賣會開跑了  年終特賣會開跑了</marquee>
<h2 class="ct">最新消息</h2>

<div class="ct" style="color:red">*點擊標題觀看詳細訊息</div>

<!-- table.all>(tr.tt>td.ct)+(tr.pp*2>td) --> 
<table class="all news">
    <tr class="tt">
        <td class="ct">標題</td>
    </tr>
    <tr class="pp">
        <td><a href="#" class='title' data-table="news1">年終特賣會開跑了</a></td>
    </tr>
    <tr class="pp">
        <td><a href="#" class='title' data-table="news2">情人節特惠活動</a></td>
    </tr>
</table>

<table class="all news" id="news1" style="display:none">
    <tr>
        <td class="tt ct">標題</td>
        <td class="pp">年終特賣會開跑了</td>
    </tr>
    <tr>
        <td class="tt ct">內容</td>
        <td class="pp">即日期至年底，凡會員購物滿仟送佰，買越多送越多~</td>
    </tr>
</table>

<table class="all news" id="news2" style="display:none">
    <tr>
        <td class="tt ct">標題</td>
        <td class="pp">情人節特惠活動</td>
    </tr>
    <tr>
        <td class="tt ct">內容</td>
        <td class="pp">為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</td>
    </tr>
</table>


<script>
    $(".title").on("click",function(){
        let table=$(this).data("table");
        $(".news").hide();
        $(`#${table}`).show();
    })
</script>