<?php
declare(strict_types=1);

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
            'Example' => [
                $sourcePath . '/App/Example/Presentation'
            ]
        ];

        foreach ($namespaces as $namespace => $paths) {
            foreach ($paths as $path) {
                $loader->addPath($path);
            }
        }
    }
}