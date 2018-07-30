<?php


namespace App\Twig;


use App\Application\Plugins\Twig\PathLoader;
use Xervice\Twig\TwigDependencyProvider as XerviceTwigDependencyProvider;

class TwigDependencyProvider extends XerviceTwigDependencyProvider
{
    /**
     * @return \Xervice\Twig\Business\Path\PathProviderInterface[]
     */
    protected function getPathProviderList(): array
    {
        return [
            new PathLoader()
        ];
    }
}