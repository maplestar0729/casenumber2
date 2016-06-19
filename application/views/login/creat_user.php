<style>
.btn-mystyle{
	color: #fff;
    background-color: #5E825E;
    border-color: #4cae4c;
}
</style>
<form method="post" action="<?=base_url('/login/creat_user_chk')?>"  accept-charset="utf-8" >
  帳號：<input class="form-control" style="width:100px" type="text" name="uid"><br>
  密碼：<input class="form-control" style="width:100px" type="password" id="pw" name="pw"><br>
  確認密碼：<input class="form-control" style="width:100px" type="password" id="chk_pw" name="chk_pw">
  等級：<select class="form-control"  name="clas" id="clas"  style="width:150px"/>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
  成員：<select class="form-control"  name="member" id="member"  style="width:150px"/>
  <?php
      if(isset($member))
      {
        foreach ($member as $key => $value) {
          //echo json_encode($value);
          echo '<option value="'.$value["EN"].'">'.$value["EN"].' '.$value["name"].'</option>';
        }

      }
  ?>
  </select>

  <?php
    if(isset($login_error))
    {
        echo $login_error;
    }
   ?>
  <a  id="save" class="btn btn-mystyle" >送出</a>
</form>
<script>
  //$("#member").select2();
  $("#save").click(function(){
    if($("#pw").val() != $("#chk_pw").val())
    {
      alert("兩次密碼不一致");
    }else {
      $("form").submit();
    }
  });
</script>
