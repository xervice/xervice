<?php


namespace App\Application\Plugins\Twig;


use Xervice\Twig\Business\Loader\XerviceLoaderInterface;
use Xervice\Twig\Business\Path\PathProviderInterface;

class PathLoader implements PathProviderInterface
{
    /**
     * @param \Xervice\Twig\Business\Loader\XerviceLoaderInterface $loader
     *
     * @throws \Twig_Error_Loader
     */
    public function privideTwigPaths(XerviceLoaderInterface $loader): void
    {
        $sourcePath = \dirname(__DIR__, 4);

        $namespaces = [
            'Application' => [
                $sourcePath . '/App/Application/Presentation'
            ]
        ];

        foreach ($namespaces as $namespace => $paths) {
            foreach ($paths as $path) {
                $loader->addPath($path);
            }
        }
    }
}