<?php
declare(strict_types=1);

namespace App\Application\Plugins\Routing;


use App\Example\Communication\Controller\ExampleController;
use DataProvider\RouteCollectionDataProvider;
use Xervice\Controller\Business\Route\AbstractControllerProvider;

class Routing extends AbstractControllerProvider
{
    /**
     * @param \DataProvider\RouteCollectionDataProvider $dataProvider
     *
     * @return \DataProvider\RouteCollectionDataProvider
     */
    public function handleRoutes(RouteCollectionDataProvider $dataProvider): RouteCollectionDataProvider
    {
        $routes = [
            [
                '/',
                ExampleController::class,
                'indexAction',
                ['GET']
            ],
            [
                '/about',
                ExampleController::class,
                'aboutAction',
                ['GET']
            ],
            [
                '/blog-home-1',
                ExampleController::class,
                'blogHome1Action',
                ['GET']
            ],
            [
                '/blog-home-2',
                ExampleController::class,
                'blogHome2Action',
                ['GET']
            ],
            [
                '/blog-post',
                ExampleController::class,
                'blogPostAction',
                ['GET']
            ],
            [
                '/contact',
                ExampleController::class,
                'contactAction',
                ['GET']
            ],
            [
                '/faq',
                ExampleController::class,
                'faqAction',
                ['GET']
            ],
            [
                '/full-width',
                ExampleController::class,
                'fullWidthAction',
                ['GET']
            ],
            [
                '/services',
                ExampleController::class,
                'servicesAction',
                ['GET']
            ],
            [
                '/pricing',
                ExampleController::class,
                'pricingAction',
                ['GET']
            ]
        ];

        return $this->getRoutesFromConfig($dataProvider, $routes);
    }

    /**
     * @param \DataProvider\RouteCollectionDataProvider $dataProvider
     * @param $routes
     *
     * @return \DataProvider\RouteCollectionDataProvider
     */
    private function getRoutesFromConfig(RouteCollectionDataProvider $dataProvider, $routes
    ): \DataProvider\RouteCollectionDataProvider {
        foreach ($routes as $routeData) {
            $route = $this->addController(
                $routeData[0],
                $routeData[1],
                $routeData[2],
                $routeData[3]
            );

            $dataProvider->addRoute($route);
        }

        return $dataProvider;
}
}