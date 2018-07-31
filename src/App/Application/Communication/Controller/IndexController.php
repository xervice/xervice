<?php
declare(strict_types=1);
namespace App\Application\Communication\Controller;


use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractTwigController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function indexAction(): Response
    {
        return $this->sendTwig('index.twig');
    }
}