<?php
namespace Jh_Ajax_Search\Classes;

class JhAjaxSearchFrontend
{
    public function __construct()
    {
        $this->init_frontend();
    }

    public function init_frontend(){
        new JhAjaxSearchFrontendAssets();
    }
}