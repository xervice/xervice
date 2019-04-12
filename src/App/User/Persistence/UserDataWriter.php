<?php
declare(strict_types=1);

namespace App\User\Persistence;


use DataProvider\UserDataProvider;
use Orm\App\User\Persistence\User;
use Orm\App\User\Persistence\UserQuery;
use Xervice\Core\Business\Model\Persistence\Writer\AbstractWriter;

class UserDataWriter extends AbstractWriter implements UserDataWriterInterface
{
    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @return \DataProvider\UserDataProvider
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function writeUser(UserDataProvider $userDataProvider): UserDataProvider
    {
        $user = new User();

        $user->fromArray($userDataProvider->toArray());
        $user->save();

        $userDataProvider->fromArray($user->toArray());

        return $userDataProvider;
    }

    /**
     * @param int $userId
     *
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function deleteUser(int $userId): void
    {
        $user = UserQuery::create()->findOneByUserId($userId);
        if ($user) {
            $user->delete();
        }
    }
}