<? include '/../common/header.php' ?>
<div class="container-fluid">
    <div class="row">
    <div class="col-lg-12">
    <form class="form-horizontal"
          name="bottomForm"
          method="post"
          action="<?= BASE_URL . '/company/bottom' ?>"
          target="iFrameSubmit"
          enctype="multipart/form-data">

        <div class="companyForm">
          <div id="companyFormGroup">
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Company Name:</label>
            <div class="col-sm-10">
                <input type='text'
                       class="form-control"
                       name='B010CompanyNm_0'
                       value='<?= isset($company['B010CompanyNm']) ? $company['B010CompanyNm'] : '' ?>'/>
            </div>
          </div>
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Address:</label>
            <div class="col-sm-10">
                <input type='text'
                       class="form-control"
                       name='B010CompanyAddr_0'
                       value='<?= isset($company['B010CompanyAddr']) ? $company['B010CompanyAddr'] : '' ?>'/>
            </div>
          </div>
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Email:</label>
            <div class="col-sm-4">
                <input type='text'
                       class="form-control"
                       name='B010CompanyEmail_0'
                       value='<?= isset($company['B010CompanyEmail']) ? $company['B010CompanyEmail'] : '' ?>'/>
            </div>
            <label for="focusedinput" class="col-sm-2 control-label">Tel:</label>
            <div class="col-sm-4">
                <input type='text'
                       class="form-control"
                       name='B010CompanyTel_0'
                       value='<?= isset($company['B010CompanyTel']) ? $company['B010CompanyTel'] : '' ?>'/>
            </div>
          </div>
          </div>
        </div>


        <!-- for update-->
        <input type="hidden"
               name="B010CompanyCd_0"
               value="<?= isset($company['B010CompanyCd']) ? $company['B010CompanyCd'] : '' ?>"/>
        <input type="submit" name="Submit" id="bottomSubmit" value="Submit" class="hide"/>
        <input type="submit" name="delData" id="bottomDelete" value="Delete" class="hide"/>
        <input type="hidden" name="isEdit" value="<?= $isEdit ?>"/>
    </form>
            <div class="form-group">
                <button type="button" class="btn btn-default pull-right btnAdd">Add</button>
            </div>
    </div>
</div>
    <?php
    include '/../common/script.php';

    if (isset($B010CompanyCd)):
        ?>

        <script>
        alert('Submission successfully captured.');
        top.objTop.location.reload();
        top.objBottom.location.href = baseUrl + '/company/bottom?B010CompanyCd=<?= $B010CompanyCd; ?>';
        top.objButton.location.href = baseUrl + '/company/button?B010CompanyCd=<?= $B010CompanyCd; ?>';

    </script>
    <?php
    endif;
    ?>

    <script>
    $(function () {

        var areaToAdd = $('.companyForm'), initialGroup = 1;

        if(parseInt($('input[name=B010CompanyCd_0]').val()) > 0){
            $(".btnAdd").remove();
        }

        $(".btnAdd").click(function () {
            var strToAdd = '<hr/><div id="companyFormFields">' +
                '<div class="form-group">' +
                '<label for="focusedinput" class="col-sm-2 control-label">Company Name:</label>' +
                '<div class="col-sm-10">' +
                '<input type="text" class="form-control" name="B010CompanyNm_' + initialGroup + '" />' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="focusedinput" class="col-sm-2 control-label">Address:</label>' +
                '<div class="col-sm-10">' +
                '<input type="text" class="form-control" name="B010CompanyAddr_' + initialGroup + '"/>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="focusedinput" class="col-sm-2 control-label">Email:</label>' +
                '<div class="col-sm-4">' +
                '<input type="text" class="form-control" name="B010CompanyEmail_' + initialGroup + '" />' +
                '</div>' +
                '<label for="focusedinput" class="col-sm-2 control-label">Tel:</label>' +
                '<div class="col-sm-4">' +
                '<input type="text" class="form-control" name="B010CompanyTel_' + initialGroup + '"/>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<button type="button" class="btn btn-danger pull-right btnRemove">X</button>' +
                '</div>' +
                '</div>';

            initialGroup++;

            areaToAdd.append(strToAdd);
        });

        $(document).on('click', '.btnRemove', function () {
            var self = $(this);

            if (confirm("Are you sure want to remove?")) {
                self.closest('#companyFormFields').remove();
            }
        })
    });
    </script>
<?php
include '/../common/footer.php';
?>