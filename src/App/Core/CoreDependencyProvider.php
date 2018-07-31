<?php


namespace App\Core;


use Xervice\Core\CoreDependencyProvider as XerviceCoreDependencyProvider;
use Xervice\Database\LocatorHelper\DatabaseHelper;

class CoreDependencyProvider extends XerviceCoreDependencyProvider
{
    /**
     * @return \Xervice\Core\HelperClass\HelperInterface[]
     */
    protected function getHelper(): array
    {
        return [
            new DatabaseHelper()
        ];
    }
}