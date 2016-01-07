<?php

/**
 * Created by PhpStorm.
 * User: julia
 * Date: 05.01.16
 * Time: 10:18
 */
class MainController extends Controller
{
    public function indexAction()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }
}