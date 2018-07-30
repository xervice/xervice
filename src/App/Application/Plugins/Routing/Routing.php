<?php


namespace App\Application\Plugins\Routing;


use App\Application\Communication\Controller\IndexController;
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
                IndexController::class,
                'indexAction',
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