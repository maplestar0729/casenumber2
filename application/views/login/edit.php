<form method="post" action="<?=base_url('/login/edit')?>"  accept-charset="utf-8" >
  舊密碼：<input type="password" name="old_pw"><br>
  新密碼：<input type="password" id="new_pw" name="new_pw"><br>
  確認密碼：<input type="password" id="chk_pw" name="chk_pw">
  <?php
    if(isset($login_error))
    {
        echo $login_error;
    }
   ?>
  <button type="submit">送出</button>
</form>
<script>

</script>
