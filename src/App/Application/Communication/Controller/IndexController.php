<?php


namespace App\Application\Communication\Controller;


use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractTwigController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(): Response
    {
        return $this->sendTwig('@Application/pages/index.twig');
    }
}