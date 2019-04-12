<?php
declare(strict_types=1);

namespace App\Application\Communication\Controller;


use Symfony\Component\HttpFoundation\Response;
use Xervice\Controller\Communication\Controller\AbstractController;
use Xervice\Kernel\Business\Plugin\ClearServiceInterface;

class AbstractTwigController extends AbstractController
{
    /**
     * @return \Xervice\Kernel\Business\Plugin\ClearServiceInterface
     */
    public function getTwig(): ClearServiceInterface
    {
        return $this->getService('twig');
    }

    /**
     * @param string $template
     * @param array $params
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sendTwig(string $template, array $params = []): Response
    {
        return $this->sendResponse(
            $this->getTwig()->render($template, $params)
        );
    }
}