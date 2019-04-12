<?php
declare(strict_types=1);

namespace App\User\Business\Model;

use DataProvider\UserDataProvider;

interface ValidatorInterface
{
    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @throws \App\User\Business\Exception\UserException
     */
    public function validate(UserDataProvider $userDataProvider): void;
}