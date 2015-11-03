<?php
$low = "20";
$High = "72";
$BtnH = "8";//Total 100%
$wh100 = "class='w99 h100' frameborder=2";
$objTop = "name='objTop' 		id='objTop'";
$objBtm = "name='objBottom' id='objBottom'";
$objBtn = "name='objButton' id='objButton'";
?>
<? include '/../common/header.php' ?>
<iframe name="iFrameSubmit" width=0 height=0 class='hide'></iframe>
<div id="page-container">
<?php include '/../common/side_nav.php' ?>
    <div id="page-content">
    <div id="wrap">
        <div id="page-heading">
            <h1>User Maintenance</h1>
        </div>
    </div>
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-primary">
                  <div class="panel-body">
            <div id="flameTop"
                 class="w100 mgnT0"
                 style="height:<?= $High ?>%;"
                 onMouseover="HeightSet(<?= $High ?>,<?= $low ?>,<?= $BtnH ?>)">
                <iframe <?= $objTop ?> <?= $wh100 ?> src="<?= BASE_URL ?>/user/top">></iframe>
            </div>
                      <hr/>
                <div id="flameBottom"
                     class="w100 mgnT0 "
                     style="height:<?= $low ?>%;"
                     onMouseover="HeightSet(<?= $low ?>,<?= $High ?>,<?= $BtnH ?>)">
                    <iframe <?= $objBtm ?> <?= $wh100 ?> src="<?= BASE_URL ?>/user/bottom"></iframe>
                </div>
                <div id="flameBotton" class="w100 mgnT0 mgnT5" style="height:<?= $BtnH ?>%;">
                    <iframe <?= $objBtn ?> <?= $wh100 ?>    src="<?= BASE_URL ?>/user/button"></iframe>
                </div>
                      </div>
                  </div>
          </div>
          </div>
    </div>
</div>
</div>
<? include '/../common/script.php' ?>
<script type="text/javascript">
        function callBottom(B010UserCd) {
            top.objBottom.location.href = baseUrl + '/user/bottom?B010UserCd=' + B010UserCd;
            top.objButton.location.href = baseUrl + '/user/bottom?B010UserCd=' + B010UserCd;
        }
    </script>
<? include '/../common/footer.php' ?>
