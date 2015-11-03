<?php


class User extends Controller
{
    var $userModel;

    public function __construct()
    {
        // initial user model
        $this->userModel = $this->loadModel('UserModel');
    }

    public function index()
    {
        $menu = $this->loadHelper('MenuHelper');

        $view = $this->loadView('user/index');
        $view->set('menu',$menu);
        $view->render();
    }

    public function top()
    {

        if (isset($_GET["userNm"]) && !empty($_GET["userNm"])) {
            // Retrieve related keyword by name
            $users = $this->userModel->findUsersByName($_GET["userNm"]);
        } else {
            $users = $this->userModel->findAll();
        }

        $view = $this->loadView('user/top');
        $view->set('users', $users);
        $view->render();
    }

    public function bottom()
    {
        $isEdit = 0;
        $view = $this->loadView('user/bottom');

        if (!empty($_POST["delData"])) {

            if ($this->userModel->delete($_POST["B010UserCd"])) {

                $base = BASE_URL;
                $html = <<< HTML
                <script language='javascript'>top.objTop.location.reload();</script>
                <script language='javascript'>top.objBottom.location.href='{$base}/user/bottom';</script>
                <script language='javascript'>top.objButton.location.href='{$base}/user/button';</script>
                <script language='javascript'>alert('User No {$_POST["B010UserCd"]} has been deleted.');</script>
HTML;
                echo $html;
                exit;
            }

        }

        if (!empty($_POST["Submit"])) {

            // Insert new set of data otherwise update
            if (empty($_POST["isEdit"])) {
                $insertedId = $this->userModel->insert($_POST);
            } else {
                $this->userModel->update($_POST);
            }

            // Update display data
            $B010UserCd = (empty($_POST["isEdit"])) ? $insertedId : $_POST["B010UserCd"];
            $view->set('B010UserCd', $B010UserCd);
        }

        if (isset($_GET["B010UserCd"]) && !empty($_GET["B010UserCd"])) {
            $user = $this->userModel->findUserById($_GET["B010UserCd"]);
            $view->set('user', $user);

            $isEdit = 1;
        }

        $view->set('isEdit', $isEdit);
        $view->render();
    }

    public function button()
    {
        $hide = (empty($_GET["B010UserCd"])) ? "hide" : "";

        $view = $this->loadView('user/button');

        $view->set('hide', $hide);

        $view->render();
    }

}