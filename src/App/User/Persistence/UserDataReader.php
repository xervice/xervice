<?php
declare(strict_types=1);

namespace App\User\Persistence;


use DataProvider\UserDataProvider;
use Orm\App\User\Persistence\User;
use Orm\App\User\Persistence\UserQuery;
use Xervice\Core\Business\Model\Persistence\Reader\AbstractReader;

class UserDataReader extends AbstractReader implements UserDataReaderInterface
{
    /**
     * @param int $userId
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getOneUserById(int $userId): UserDataProvider
    {
        $userDataProvider = (new UserDataProvider())
            ->setUserId($userId);

        $user = $this->findOneById($userDataProvider->getUserId());
        if ($user) {
            $userDataProvider->fromArray(
                $user->toArray()
            );
        }

        return $userDataProvider;
    }

    /**
     * @param string $email
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getOneUserByEmail(string $email): UserDataProvider
    {
        $userDataProvider = (new UserDataProvider())
            ->setEmail($email);

        $user = $this->findOneByEmail($email);
        if ($user) {
            $userDataProvider->fromArray(
                $user->toArray()
            );
        }

        return $userDataProvider;
    }

    /**
     * @param string $email
     *
     * @return \Orm\App\User\Persistence\User
     */
    protected function findOneByEmail(string $email): ?User
    {
        return $this->getUserQuery()->findOneByEmail($email);
    }

    /**
     * @param int $userId
     *
     * @return \Orm\App\User\Persistence\User
     */
    protected function findOneById(int $userId): ?User
    {
        return $this->getUserQuery()->findOneByUserId($userId);
    }

    /**
     * @return \Orm\App\User\Persistence\UserQuery
     */
    protected function getUserQuery(): UserQuery
    {
        return UserQuery::create();
    }
}