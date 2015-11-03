<? include '/../common/header.php' ?>
<div class="container-fluid">
    <div class="row">
            <form class="form-inline" name="formSearch" action="<?= BASE_URL ?>/user/top" method="get" autocomplete="off">

                <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">Company Name</div>
                  <input type="text" class="form-control" name="companyNm" size="20" value="<?= @$_GET["companyNm"]; ?>"/>
                </div>
                </div>
                <input type="submit" name="btnSubmitSearch" class="btn btn-primary" value="Search"/>
        </form>
    </div>
  <div class="row">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                  <th>Company Code</th>
                  <th>Company Name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Tel</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($companies):
                foreach ($companies as $company):
                    ?>

                    <tr>
                  <td><a href="javascript:callBottom(<?= $company->B010CompanyCd ?>)"><?= $company->B010CompanyCd ?></a></td>
                  <td><?= $company->B010CompanyNm ?></td>
                  <td><?= $company->B010CompanyAddr ?></td>
                  <td><?= $company->B010CompanyEmail ?></td>
                  <td><?= $company->B010CompanyTel ?></td>
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
            top.objBottom.location.href = baseUrl + '/company/bottom?B010CompanyCd=' + B010UserCd;
            top.objButton.location.href = baseUrl + '/company/button?B010CompanyCd=' + B010UserCd;
        }

</script>

<?php include '/../common/footer.php' ?>
