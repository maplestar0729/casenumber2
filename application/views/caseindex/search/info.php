<?php if($isOld == "old"){ ?>
    <h4>舊年份搜尋</h4>
<?php } else { ?>
    <h4>搜尋</h4>
<?php } ?>
<form action="<?=base_url('/search/'.$isOld)?>"  method="GET" accept-charset="utf-8" >
    <input type="text" name="str" value="">
    <button type="submit">搜尋</button>
</form>
