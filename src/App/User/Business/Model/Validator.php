<?php
declare(strict_types=1);

namespace App\User\Business\Model;


use App\User\Business\Exception\UserException;
use DataProvider\UserDataProvider;

class Validator implements ValidatorInterface
{
    /**
     * @var \App\User\Persistence\UserDataReaderInterface
     */
    private $userReader;

    /**
     * Validator constructor.
     *
     * @param \App\User\Persistence\UserDataReaderInterface $userReader
     */
    public function __construct(\App\User\Persistence\UserDataReaderInterface $userReader)
    {
        $this->userReader = $userReader;
    }

    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @throws \App\User\Business\Exception\UserException
     */
    public function validate(UserDataProvider $userDataProvider): void
    {
        if (!$userDataProvider->hasEmail()) {
            throw new UserException('Email is missing');
        }

        $existingUser = $this->userReader->getOneUserByEmail($userDataProvider->getEmail());
        if ($existingUser->hasUserId() && $existingUser->getUserId() !== $userDataProvider->getUserId()) {
            throw new UserException('Email already exists');
        }
    }
}