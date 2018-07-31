<?php

namespace App\User\Business\Reader;

use DataProvider\UserDataProvider;

interface UserReaderInterface
{
    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getUser(UserDataProvider $userDataProvider): UserDataProvider;
}