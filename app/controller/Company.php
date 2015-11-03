<?php


class Company extends Controller
{
    var $companyModel;

    public function __construct()
    {
        // initial user model
        $this->companyModel = $this->loadModel('CompanyModel');
    }

    public function index()
    {
        $menu = $this->loadHelper('MenuHelper');

        $view = $this->loadView('company/index');
        $view->set('menu',$menu);
        $view->render();
    }

    public function top()
    {

        if (isset($_GET["companyNm"]) && !empty($_GET["companyNm"])) {
            // Retrieve related keyword by name
            $companies = $this->companyModel->findCompaniesByName($_GET["companyNm"]);
        } else {
            $companies = $this->companyModel->findAll();
        }

        $view = $this->loadView('company/top');
        $view->set('companies', $companies);
        $view->render();
    }

    public function bottom()
    {
        $isEdit = 0;
        $view = $this->loadView('company/bottom');

        if (!empty($_POST["delData"])) {

            if ($this->companyModel->delete($_POST["B010CompanyCd_0"])) {

                $base = BASE_URL;
                $html = <<< HTML
                <script language='javascript'>top.objTop.location.reload();</script>
                <script language='javascript'>top.objBottom.location.href='{$base}/company/bottom';</script>
                <script language='javascript'>top.objButton.location.href='{$base}/company/button';</script>
                <script language='javascript'>alert('Company No {$_POST["B010CompanyCd_0"]} has been deleted.');</script>
HTML;
                echo $html;
                exit;
            }

        }

        if (!empty($_POST["Submit"])) {

            // Insert new set of data otherwise update
            if (empty($_POST["isEdit"])) {

                $elements = array();
                foreach ($_POST as $key => $val) { //For every posted values
                    $frags = explode("_", $key); //we separate the attribute name from the number
                    $id = $frags[1]; //That is the id
                    $attr = $frags[0]; //And that is the attribute name
                    if (isset($id) && !empty($val)) {
                        //We then store the value of this attribute for this element.
                        $elements[$id][$attr] = htmlentities($val);
                    }
                }

                // Re-indexing
                $elements = array_values($elements);

                foreach($elements as $k => $v){
                    $insertedId = $this->companyModel->insert($v);
                }

            } else {
                $this->companyModel->update($_POST);
            }

            // Update display data
            $B010CompanyCd = (empty($_POST["isEdit"])) ? $insertedId : $_POST["B010CompanyCd_0"];
            $view->set('B010CompanyCd', $B010CompanyCd);
        }

        if (isset($_GET["B010CompanyCd"]) && !empty($_GET["B010CompanyCd"])) {
            $company = $this->companyModel->findCompanyById($_GET["B010CompanyCd"]);
            $view->set('company', $company);

            $isEdit = 1;
        }

        $view->set('isEdit', $isEdit);
        $view->render();
    }

    public function button()
    {
        $hide = (empty($_GET["B010CompanyCd"])) ? "hide" : "";

        $view = $this->loadView('company/button');

        $view->set('hide', $hide);

        $view->render();
    }

}