<?php

/**
 * Created by PhpStorm.
 * User: julia
 * Date: 06.01.16
 * Time: 10:40
 */
class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->model = new Portfolio();
        $this->view = new View();
    }

    public function indexAction()
    {
        $data = $this->model->getData();
        $this->view->generate('portfolio_view.php', 'template_view.php', $data);
    }
}