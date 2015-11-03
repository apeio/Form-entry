<nav id="page-leftbar" role="navigation">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="acc-menu" id="sidebar" style="top: 40px;">
            <?php
            /*******************  Maintenance  ******************/
            $menu->header("Maintenance");
            $arr = array(
                BASE_URL . '/company' => "Company Profile",
                BASE_URL . '/user' => "User",
            );

            echo $menu->content($arr);
            /****************************************************/

            ?>
    </ul>
</nav>