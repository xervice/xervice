<?php
declare(strict_types=1);

namespace App\User\Business;


use DataProvider\UserDataProvider;
use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \App\User\Business\UserBusinessFactory getFactory()
 */
class UserFacade extends AbstractFacade
{
    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @return \DataProvider\UserDataProvider
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveUser(UserDataProvider $userDataProvider): UserDataProvider
    {
        return $this->getFactory()->createUser()->saveUser($userDataProvider);
    }

    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function deleteUser(UserDataProvider $userDataProvider): void
    {
        $this->getFactory()->createUser()->deleteUser($userDataProvider);
    }

    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getUser(UserDataProvider $userDataProvider): UserDataProvider
    {
        return $this->getFactory()->createUser()->getUser($userDataProvider);
    }
}