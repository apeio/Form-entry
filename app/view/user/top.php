<? include '/../common/header.php' ?>
<div class="container-fluid">
    <div class="row">
            <form class="form-inline" name="formSearch" action="<?= BASE_URL ?>/user/top" method="get" autocomplete="off">

                <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">Name</div>
                  <input type="text" class="form-control" name="userNm" size="20" value="<?= @$_GET["userNm"]; ?>"/>
                </div>
                </div>
                <input type="submit" name="btnSubmitSearch" class="btn btn-primary" value="Search"/>
        </form>
    </div>
  <div class="row">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                  <th>User Code</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>User Level</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($users):
                foreach ($users as $user):
                    ?>

                    <tr>
                  <td><a href="javascript:callBottom(<?= $user->B010UserCd ?>)"><?= $user->B010UserCd ?></a></td>
                  <td><?= $user->B010UserNm ?></td>
                  <td><?= $user->B010Email ?></td>
                  <td><?= $user->B010Level ?></td>
                  <td><?= $user->B010Status ?></td>
                </tr>
                <?php
                endforeach;
            endif;
            ?>
            </tbody>
        </table>
      </div>
    </div>

<?php include '/../common/script.php' ?>

<script type="text/javascript">

        function callBottom(B010UserCd) {
            top.objBottom.location.href = baseUrl + '/user/bottom?B010UserCd=' + B010UserCd;
            top.objButton.location.href = baseUrl + '/user/button?B010UserCd=' + B010UserCd;
        }

</script>

<?php include '/../common/footer.php' ?>
