<?php
declare(strict_types=1);

namespace App\User\Persistence;

use DataProvider\UserDataProvider;
use Xervice\Core\Business\Model\Persistence\Writer\WriterInterface;

interface UserDataWriterInterface extends WriterInterface
{
    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @return \DataProvider\UserDataProvider
     */
    public function writeUser(UserDataProvider $userDataProvider): UserDataProvider;

    /**
     * @param int $userId
     */
    public function deleteUser(int $userId): void;
}