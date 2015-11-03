<?php

/**
 * Description of menu
 *
 * @author yusaku
 */
class MenuHelper
{
    var $content;
    var $head;
    var $index = 0;
    var $currentActive;
    var $hidearr;

    //this constructs the current active menu
    public function __construct()
    {
        if (!isset($_COOKIE["currentActive"])) {
            $this->currentActive = 0;
            $_COOKIE["currentActive"] = 0;
        } else {
            $this->currentActive = $_COOKIE["currentActive"];
        }

    }

    /**
     * for active menu control
     * @param type $type
     * @return type
     */
    function menuactive($type)
    {
        if ($type == "header") {
            $return = ($this->index == $this->currentActive) ? "menuBarActive" : "menuBarinActive";
        } elseif ($type == "content") {
            $return = ($this->index == $this->currentActive) ? "" : "hide";
        }
        return $return;
    }

    /**
     * showing header div
     * @param type $name
     */
    function header($name)
    {
        $menu = $this->menuactive("header");

        $this->head = "<h3 " . $this->index . "'>{$name}</h3>";
    }

    /**
     * this will print the content and increment index as well.
     * @param type $array
     * @return type
     */
    function content($array)
    {
        $menu = $this->menuactive("content");
        //$permission = $this->permission($permType);
        if (isset($this->hidearr))
            $array = array_diff($array, $this->hidearr);

        unset($this->hidearr);

        $this->content = "<ul class=\"acc-menu {$menu}\" id=\"sidebar {$this->index}\" style=\"top: 40px;\">";
        foreach ($array as $key => $val) {
            $this->content .= "<li><a href='" . $key . "'><span>" . $val . "</span></a></li>";
        }
        $this->content .= "</ul>";

        $this->index++;

        $return = $this->head;
        $return .= $this->content;

        return $return;
    }

    //when you need to hide something
    function hide($hidearr)
    {
        $this->hidearr = $hidearr;
    }
}