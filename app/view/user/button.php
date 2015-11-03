<? include '/../common/header.php' ?>

<div class="container-fluid">
    <div class="row">
        <form name="formButton" method="post" target="iFrameSubmit">
            <img id="Loading" src="<?=BASE_URL?>/img/loading.gif" alt="processing, please wait" height="30" class="hide"/>
            <div class="center" id="Btn">
                <input type="button" id="buttonSubmit" class="btn btn-primary"	value="Submit"  onclick="return cfmSubmit();">&nbsp;&nbsp;&nbsp;
                <input type="button" id="buttonDelete" value="Delete" onclick="return cfmDelele();" class="btn btn-danger <?=$hide;?>">
            </div>
	    </form>
    </div>
    <? include '/../common/script.php' ?>
	<script type="text/javascript">
	  function cfmSubmit()
      {
          BtnLoad("hide");
          var objBottom = top.window.document.getElementById("objBottom");
          objBottom.contentDocument.getElementById("bottomSubmit").click();
      }

      function cfmDelele()
      {
          BtnLoad("hide");
          var cfmDelete = confirm("Are you sure you want to delete this data?");
          if(cfmDelete)
          {
              var objBottom = top.window.document.getElementById("objBottom");
              objBottom.contentDocument.getElementById("bottomDelete").click();
          }
      }
	</script>
<? include '/../common/footer.php' ?>