<?php
declare(strict_types=1);

namespace App\User\Business\Model;

use DataProvider\UserDataProvider;

interface UserInterface
{
    /**
     * @param int $userId
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getUserById(int $userId): UserDataProvider;

    /**
     * @param string $email
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getUserByEmail(string $email): UserDataProvider;

    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @return \DataProvider\UserDataProvider
     */
    public function saveUser(UserDataProvider $userDataProvider): UserDataProvider;

    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     */
    public function deleteUser(UserDataProvider $userDataProvider): void;

    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getUser(UserDataProvider $userDataProvider): UserDataProvider;
}