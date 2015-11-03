<? include '/../common/header.php' ?>
<div class="container-fluid">
    <div class="row">
    <div class="col-lg-12">
    <p class="left bold font16 mgnB5">User Maintenance</p>
    <form class="form-horizontal"
          name="bottomForm"
          method="post"
          action="<?= BASE_URL . '/user/bottom' ?>"
          target="iFrameSubmit"
          enctype="multipart/form-data">

          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">User Name:</label>
            <div class="col-sm-10">
                <input type='text'
                       class="form-control"
                       name='B010UserNm'
                       value='<?= isset($user['B010UserNm']) ? $user['B010UserNm'] : '' ?>'
                       size="70"/>
            </div>
          </div>

          <div class="form-group">
            <label for="mediuminput" class="col-sm-2 control-label">Email:</label>
            <div class="col-sm-3">
                <input type='text'
                       class="form-control"
                       name='B010Email'
                       value='<?= isset($user['B010Email']) ? $user['B010Email'] : '' ?>'/>
            </div>
              <label for="mediuminput" class="col-sm-2 control-label">User Level:</label>
            <div class="col-sm-2">
                <select name='B010Level' class="form-control">
                    <option value='User' <? if (isset($user['B010Level']) && $user["B010Level"] == "User") echo "selected"; ?>>User</option>
                    <option value='Admin' <? if (isset($user['B010Level']) && $user["B010Level"] == "Admin") echo "selected"; ?>>Admin</option>
                </select>
            </div>
              <label for="mediuminput" class="col-sm-1 control-label">Status:</label>
            <div class="col-sm-2">
                <select name='B010Status' class="form-control">
                    <option value='Active' <? if (isset($user['B010Status']) && $user["B010Status"] == "Active") echo "selected"; ?>>Active</option>
                    <option value='Disabled' <? if (isset($user['B010Status']) && $user["B010Status"] == "Disabled") echo "selected"; ?>>Disabled</option>
                </select>
            </div>
          </div>

        <!-- for update-->
        <input type="hidden" name="B010UserCd" value="<?= isset($user['B010UserCd']) ? $user['B010UserCd'] : '' ?>"/>
        <input type="submit" name="Submit" id="bottomSubmit" value="Submit" class="hide"/>
        <input type="submit" name="delData" id="bottomDelete" value="Delete" class="hide"/>
        <input type="hidden" name="isEdit" value="<?= $isEdit ?>"/>
    </form>
    </div>
</div>
<?php
include '/../common/script.php';

if (isset($B010UserCd)):
    ?>

    <script>
        alert('Submission successfully captured.');
        top.objTop.location.reload();
        top.objBottom.location.href = baseUrl + '/user/bottom?B010UserCd=<?= $B010UserCd; ?>';
        top.objButton.location.href = baseUrl + '/user/button?B010UserCd=<?= $B010UserCd; ?>';

    </script>
<?php
endif;

include '/../common/footer.php';
?>