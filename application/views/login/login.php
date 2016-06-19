<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <form method="post" action="<?=base_url('/login/login_check')?>"  accept-charset="utf-8" >
    帳號：<input type="text" name="uid"><br>
    密碼：<input type="password" name="pw">
    <?php
      if(isset($login_error))
      {
          echo $login_error;
      }
     ?>
    <button type="submit" >送出</button>
  </form>
</body>
</html>
