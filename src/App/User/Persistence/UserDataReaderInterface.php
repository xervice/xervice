<?php
declare(strict_types=1);

namespace App\User\Persistence;

use DataProvider\UserDataProvider;
use Xervice\Core\Business\Model\Persistence\Reader\ReaderInterface;

interface UserDataReaderInterface extends ReaderInterface
{
    /**
     * @param int $userId
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getOneUserById(int $userId): UserDataProvider;

    /**
     * @param string $email
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getOneUserByEmail(string $email): UserDataProvider;
}